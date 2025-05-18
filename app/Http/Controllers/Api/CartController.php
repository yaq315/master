<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * عرض محتويات السلة للمستخدم المصادق عليه
     */
    public function index()
    {
        try {
            $user = Auth::guard('sanctum')->user();
            
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthenticated.'
                ], 401);
            }

            $cartItems = $user->cartItems()->with('product')->get();

            return response()->json([
                'success' => true,
                'data' => [
                    'items' => $cartItems,
                    'summary' => $this->calculateCartTotals($cartItems)
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve cart items.'
            ], 500);
        }
    }

    /**
     * إضافة منتج إلى السلة
     */
    public function store(Request $request)
    {
        try {
            $user = Auth::guard('sanctum')->user();
            
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthenticated.'
                ], 401);
            }

            $request->validate([
                'product_id' => 'required|exists:products,id',
                'quantity' => 'required|integer|min:1',
                'size' => 'nullable|string'
            ]);

            $product = Product::findOrFail($request->product_id);

            if ($request->quantity > $product->stock) {
                return response()->json([
                    'success' => false,
                    'message' => 'الكمية المطلوبة غير متوفرة في المخزن'
                ], 400);
            }

            $finalPrice = $this->calculatePriceBySize($product->price, $request->size);

            $cartItem = Cart::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'product_id' => $request->product_id,
                    'size' => $request->size ?? 'medium'
                ],
                [
                    'quantity' => \DB::raw('quantity + ' . $request->quantity),
                    'price' => $finalPrice
                ]
            );

            return response()->json([
                'success' => true,
                'message' => 'تمت إضافة المنتج إلى السلة',
                'cart_count' => $user->cartItems()->sum('quantity')
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add item to cart.'
            ], 500);
        }
    }

    /**
     * تحديث كمية المنتج في السلة
     */
    public function update(Request $request, $id)
    {
        try {
            $user = Auth::guard('sanctum')->user();
            
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthenticated.'
                ], 401);
            }

            $request->validate([
                'quantity' => 'required|integer|min:1'
            ]);

            $cartItem = $user->cartItems()->with('product')->findOrFail($id);

            if ($request->quantity > $cartItem->product->stock) {
                return response()->json([
                    'success' => false,
                    'message' => 'الكمية المطلوبة غير متوفرة في المخزن'
                ], 400);
            }

            $cartItem->update(['quantity' => $request->quantity]);

            return response()->json([
                'success' => true,
                'message' => 'تم تحديث الكمية بنجاح',
                'data' => [
                    'item_total' => $cartItem->price * $request->quantity,
                    'summary' => $this->calculateCartTotals($user->cartItems)
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update cart item.'
            ], 500);
        }
    }

    /**
     * حذف منتج من السلة
     */
    public function destroy($id)
    {
        try {
            $user = Auth::guard('sanctum')->user();
            
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthenticated.'
                ], 401);
            }

            $cartItem = $user->cartItems()->findOrFail($id);
            $cartItem->delete();

            return response()->json([
                'success' => true,
                'message' => 'تم حذف المنتج من السلة',
                'cart_count' => $user->cartItems()->sum('quantity')
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to remove item from cart.'
            ], 500);
        }
    }

    /**
     * دوال مساعدة
     */
    private function calculatePriceBySize($basePrice, $size)
    {
        return match ($size) {
            'large' => $basePrice + 10,
            'small' => $basePrice - 5,
            default => $basePrice,
        };
    }

    private function calculateCartTotals($cartItems)
    {
        $subtotal = $cartItems->sum(function($item) {
            return $item->price * $item->quantity;
        });

        $shipping = $subtotal > 100 ? 0 : 10;
        $total = $subtotal + $shipping;

        return [
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'total' => $total,
            'items_count' => $cartItems->count(),
            'products_count' => $cartItems->sum('quantity')
        ];
    }
}