<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    // استرجاع كل الطلبات
    public function index()
    {
        return response()->json(Order::with('items', 'user')->get());
    }

    // استرجاع طلب معين
    public function show($id)
    {
        $order = Order::with('items', 'user')->findOrFail($id);
        return response()->json($order);
    }

    // إنشاء طلب جديد
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'order_number' => 'required|unique:orders',
            'subtotal' => 'required|numeric',
            'shipping' => 'nullable|numeric',
            'discount' => 'nullable|numeric',
            'total' => 'required|numeric',
            'payment_method' => 'required|string',
            'shipping_address' => 'required|string',
            'billing_address' => 'nullable|string',
            'phone' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $order = Order::create($validated);

        return response()->json($order, 201);
    }

    // حذف طلب
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return response()->json(['message' => 'Order deleted successfully']);
    }
}
