<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Show the checkout page
     */
    public function checkout()
    {
        $user = Auth::user();
        $cartItems = $user->cartItems()->with('product')->get();
    
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your shopping cart is empty!');
        }
    
        // Calculate totals, considering any applied coupon
        $couponCode = session('applied_coupon');
        $totals = $this->calculateOrderTotals($cartItems, $couponCode);
    
        return view('checkout', array_merge(compact('cartItems'), $totals, [
            'discount' => $totals['discount'],
            'applied_coupon' => $couponCode ? Coupon::where('code', $couponCode)->first() : null
        ]));
    }
    
    public function placeOrder(Request $request)
    {
        $request->validate([
            'city' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string|min:10',
            'notes' => 'nullable|string'
        ]);
    
        $user = Auth::user();
        $cartItems = $user->cartItems()->with('product')->get();
    
        if ($cartItems->isEmpty()) {
            return $request->wantsJson() 
                ? response()->json(['success' => false, 'message' => 'Your shopping cart is empty!'])
                : redirect()->route('cart')->with('error', 'Your shopping cart is empty!');
        }
    
        try {
            DB::beginTransaction();
    
            // Calculate totals with coupon if available
            $couponCode = session('applied_coupon');
            $totals = $this->calculateOrderTotals($cartItems, $couponCode);
    
            // Create the order
            $order = Order::create([
                'user_id' => $user->id,
                'order_number' => 'ORD-' . strtoupper(uniqid()),
                'subtotal' => $totals['subtotal'],
                'shipping' => $totals['shipping'],
                'discount' => $totals['discount'],
                'total' => $totals['total'],
                'payment_method' => $request->payment_method ?? 'cash_on_delivery',
                'shipping_address' => $this->formatJordanianAddress($request),
                'phone' => $request->phone,
                'notes' => $request->notes,
                'status' => 'pending'
            ]);
    
            // Add order items
            $this->createOrderItems($order, $cartItems);
    
            // Clear the cart
            $this->clearCart($user);
    
            // Increment coupon usage if applicable
            if ($couponCode) {
                $this->incrementCouponUsage($couponCode);
                session()->forget('applied_coupon');
            }
    
            DB::commit();
    
            return response()->json([
                'success' => true,
                'order_number' => $order->order_number,
                'order_id' => $order->id,
                'redirect' => route('order.success', $order->id)
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return $request->wantsJson()
                ? response()->json([
                    'success' => false,
                    'message' => 'Order creation failed: ' . $e->getMessage()
                ])
                : redirect()->back()
                    ->with('error', 'Order creation failed: ' . $e->getMessage())
                    ->withInput();
        }
    }
    
    private function formatJordanianAddress($request)
    {
        return "City: {$request->city}, Address: {$request->address}";
    }
    

    /**
     * Place a new order
     */
  

    /**
     * Order success page
     */
    public function orderSuccess(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403, 'You are not authorized to view this order.');
        }

        return view('order-success', compact('order'));
    }

    /**************************
     * Helper Methods *
     **************************/

    private function calculateOrderTotals($cartItems, $couponCode = null)
    {
        $subtotal = $this->calculateSubtotal($cartItems);
        $discount = $this->applyCoupon($couponCode, $subtotal);
        $shipping = $this->calculateShipping($subtotal - $discount);
        $total = $subtotal + $shipping - $discount;

        return [
            'subtotal' => $subtotal,
            'discount' => $discount,
            'shipping' => $shipping,
            'total' => $total
        ];
    }

    private function calculateSubtotal($cartItems)
    {
        return $cartItems->sum(function($item) {
            return $item->price * $item->quantity;
        });
    }

    private function applyCoupon($couponCode, $subtotal)
    {
        if (!$couponCode) return 0;

        $coupon = Coupon::where('code', $couponCode)
            ->where('valid_from', '<=', now())
            ->where('valid_to', '>=', now())
            ->where('is_active', true)
            ->first();

        if (!$coupon) return 0;

        return $coupon->type == 'fixed' 
            ? min($coupon->value, $subtotal)
            : ($subtotal * ($coupon->value / 100));
    }

    private function calculateShipping($subtotalAfterDiscount)
    {
        return $subtotalAfterDiscount > 100 ? 0 : 10;
    }

    private function createOrderItems($order, $cartItems)
    {
        $orderItems = $cartItems->map(function($item) {
            return new OrderItem([
                'product_id' => $item->product_id,
                'size' => $item->size,
                'quantity' => $item->quantity,
                'price' => $item->price,
                'original_price' => $item->product->price
            ]);
        });

        $order->items()->saveMany($orderItems);
    }

    private function clearCart($user)
    {
        $user->cartItems()->delete();
    }

    private function incrementCouponUsage($couponCode)
    {
        Coupon::where('code', $couponCode)->increment('used_count');
    }

    private function formatAddress($request)
    {
        return "City: {$request->city}, Address: {$request->address}, Zip: {$request->zip}";
    }
}
