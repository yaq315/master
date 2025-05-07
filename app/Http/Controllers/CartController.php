<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * إضافة منتج إلى السلة (لطلبات AJAX)
     */
    public function addToCart(Request $request)
    {
        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'message' => 'You must be logged in to add items to the cart.',
                'redirect' => route('login')
            ], 401);
        }

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'size' => 'nullable|string',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($request->quantity > $product->stock) {
            return response()->json([
                'success' => false,
                'message' => 'Requested quantity exceeds available stock'
            ], 400);
        }

        $finalPrice = $this->calculatePriceBySize($product->price, $request->size);

        $cartItem = Cart::firstOrNew([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
            'size' => $request->size
        ]);

        $newQuantity = $cartItem->exists ? $cartItem->quantity + $request->quantity : $request->quantity;

        if ($newQuantity > $product->stock) {
            return response()->json([
                'success' => false,
                'message' => 'Total quantity exceeds available stock'
            ], 400);
        }

        $cartItem->fill([
            'quantity' => $newQuantity,
            'price' => $finalPrice
        ])->save();

        return response()->json([
            'success' => true,
            'cart_count' => $this->getCartCount()
        ]);
    }

    /**
     * عرض صفحة السلة
     */
    public function index()
    {
        // جلب عناصر السلة للمستخدم الحالي مع معلومات المنتجات
        $cartItems = auth()->user()->cartItems()->with('product')->get();
        
        // حساب الإجماليات
        $subtotal = $cartItems->sum(function($item) {
            return $item->price * $item->quantity;
        });
        
        $shipping = $this->calculateShipping($subtotal);
        $total = $subtotal + $shipping;
        $cart_count = $cartItems->sum('quantity');

        return view('cart', [
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'total' => $total,
            'cart_count' => $cart_count,
            'cartItems' => $cartItems
        ]);
    }

    /**
     * إضافة منتج إلى السلة (لطلبات الفورم العادية)
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'size' => 'nullable|string'
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($request->quantity > $product->stock) {
            return redirect()->back()->with('error', 'Requested quantity exceeds available stock');
        }

        $finalPrice = $this->calculatePriceBySize($product->price, $request->size);

        $existingItem = auth()->user()->cartItems()
                            ->where('product_id', $request->product_id)
                            ->where('size', $request->size)
                            ->first();

        if ($existingItem) {
            $newQuantity = $existingItem->quantity + $request->quantity;
            
            if ($newQuantity > $product->stock) {
                return redirect()->back()->with('error', 'Total quantity exceeds available stock');
            }

            $existingItem->update([
                'quantity' => $newQuantity,
                'price' => $finalPrice
            ]);
        } else {
            auth()->user()->cartItems()->create([
                'product_id' => $request->product_id,
                'size' => $request->size,
                'quantity' => $request->quantity,
                'price' => $finalPrice
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * الحصول على محتويات السلة (لطلبات AJAX)
     */
    public function getCartItems()
    {
        $cartItems = auth()->user()->cartItems()->with('product')->get();
        $totals = $this->calculateCartTotals($cartItems);

        return response()->json([
            'items' => $cartItems,
            'totals' => $totals
        ]);
    }

    /**
     * تحديث كمية المنتج في السلة
     */
   /**
 * تحديث كمية المنتج في السلة
 */
public function updateQuantity(Request $request)
{
    $request->validate([
        'cart_id' => 'required|exists:carts,id',
        'quantity' => 'required|integer|min:1'
    ]);

    $cartItem = Cart::with('product')->findOrFail($request->cart_id);

    // التحقق من أن العنصر يخص المستخدم الحالي
    if ($cartItem->user_id != auth()->id()) {
        return response()->json([
            'success' => false,
            'message' => 'Unauthorized action.'
        ], 403);
    }

    if ($request->quantity > $cartItem->product->stock) {
        return response()->json([
            'success' => false,
            'message' => 'The requested quantity exceeds available stock.'
        ], 400);
    }

    $cartItem->update(['quantity' => $request->quantity]);

    // حساب الإجماليات الجديدة
    $cartItems = auth()->user()->cartItems()->with('product')->get();
    $totals = $this->calculateCartTotals($cartItems);

    return response()->json([
        'success' => true,
        'item_total' => number_format($cartItem->price * $request->quantity, 2),
        'totals' => $totals
    ]);
}

    /**
     * حذف منتج من السلة (لطلبات AJAX)
     */
    public function deleteItem($id)
    {
        $cartItem = auth()->user()->cartItems()->findOrFail($id);
        $cartItem->delete();

        $totals = $this->calculateCartTotals(auth()->user()->cartItems()->get());

        return response()->json([
            'success' => true,
            'totals' => $totals,
            'cart_count' => $this->getCartCount()
        ]);
    }

    /**
     * حذف منتج من السلة (لطلبات الفورم العادية)
     */
    public function destroy(Cart $cartItem)
    {
        $cartItem->delete();
        return redirect()->back()->with('success', 'Item removed from cart successfully!');
    }

    /**
     * دوال مساعدة
     */
    private function calculatePriceBySize($basePrice, $size)
    {
        return match ($size) {
            'medium' => $basePrice + 5,
            'large' => $basePrice + 10,
            default => $basePrice,
        };
    }

    private function calculateCartTotals($cartItems)
    {
        $subtotal = $cartItems->sum(function($item) {
            return $item->price * $item->quantity;
        });

        $shipping = $this->calculateShipping($subtotal);
        $total = $subtotal + $shipping;

        return [
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'total' => $total,
            'cart_count' => $cartItems->sum('quantity')
        ];
    }

    private function calculateShipping($subtotal)
    {
        return $subtotal > 100 ? 0 : 10;
    }

    private function getCartCount()
    {
        return auth()->check() 
            ? auth()->user()->cartItems()->sum('quantity') 
            : 0;
    }

    public function viewCart()
{
    $cartItems = auth()->user()->cartItems()->with('product')->get();
    $totals = $this->calculateCartTotals($cartItems);
    
    return view('cart', array_merge(compact('cartItems'), $totals));
}
}