<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function generateOrderPdf($orderId)
    {
        $order = Order::with(['user', 'items.product'])->findOrFail($orderId);
        
        $pdf = Pdf::loadView('pdf.order', compact('order'));
        
        return $pdf->download('order-'.$order->order_number.'.pdf');
    }
}