<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
  public function apply(Request $request)
{
    $request->validate(['coupon_code' => 'required|string']);
    
    $coupon = Coupon::where('code', $request->coupon_code)
        ->valid() // استخدم scope valid الذي أنشأته
        ->first();

    if (!$coupon) {
        return response()->json([
            'success' => false,
            'message' => 'Invalid or expired coupon code.'
        ]);
    }

    $discount = $coupon->type == 'fixed' 
        ? min($coupon->value, $request->subtotal)
        : ($request->subtotal * ($coupon->value / 100));

    session([
        'applied_coupon' => $coupon->code,
        'coupon_discount' => $discount
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Coupon applied successfully!',
        'coupon' => [
            'code' => $coupon->code,
            'discount' => $discount,
            'type' => $coupon->type
        ]
    ]);
}

    private function calculateDiscount($coupon, $subtotal)
    {
        if ($coupon->type === 'fixed') {
            return min($coupon->value, $subtotal);
        }
        
        return $subtotal * ($coupon->value / 100);
    }
}