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
            ->where('is_active', true)
            ->where(function($query) {
                $query->whereNull('valid_from')
                      ->orWhere('valid_from', '<=', now());
            })
            ->where(function($query) {
                $query->whereNull('valid_to')
                      ->orWhere('valid_to', '>=', now());
            })
            ->first();

        if (!$coupon) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or expired coupon code.'
            ]);
        }

        if ($coupon->usage_limit && $coupon->used_count >= $coupon->usage_limit) {
            return response()->json([
                'success' => false,
                'message' => 'This coupon has reached its usage limit.'
            ]);
        }

        // Store coupon in session
        session([
            'applied_coupon' => $coupon->code,
            'coupon_discount' => $this->calculateDiscount($coupon, $request->subtotal ?? 0)
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Coupon applied successfully!',
            'coupon' => [
                'code' => $coupon->code,
                'discount' => $this->calculateDiscount($coupon, $request->subtotal ?? 0),
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