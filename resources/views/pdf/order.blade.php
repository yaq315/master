<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Order Confirmation - LeafyLand</title>

    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .logo { max-width: 150px; }
        .order-info { margin-bottom: 30px; }
        .table { width: 100%; border-collapse: collapse; }
        .table th, .table td { border: 1px solid #ddd; padding: 8px; }
        .table th { background-color: #f2f2f2; text-align: left; }
        .text-right { text-align: right; }
        .footer { margin-top: 50px; font-size: 12px; text-align: center; }
    </style>
</head>
<body>
    <div class="header">
        {{-- <img src="{{ public_path('img/core-img/logo2.png') }}" class="logo"> --}}
      
        <h1>LeafyLand</h1>
        <p>Plant Nursery & Gardening Supplies</p>
    </div>
    
    <div class="order-info">
        <h2>Order Confirmation</h2>
        <p><strong>Order Number:</strong> {{ $order->order_number }}</p>
        <p><strong>Date:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
    </div>
    
    <div class="customer-info">
        <h3>Customer Information</h3>
        <p><strong>Name:</strong> {{ $order->user->name }}</p>
        <p><strong>Phone:</strong> {{ $order->phone }}</p>
        <p><strong>Address:</strong> {{ $order->shipping_address }}</p>
    </div>
    
    <h3>Order Details</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->price, 2) }} JD</td>
                <td>{{ number_format($item->price * $item->quantity, 2) }} JD</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="text-right">Subtotal:</td>
                <td>{{ number_format($order->subtotal, 2) }} JD</td>
            </tr>
            @if($order->discount > 0)
            <tr>
                <td colspan="3" class="text-right">Discount:</td>
                <td>-{{ number_format($order->discount, 2) }} JD</td>
            </tr>
            @endif
            <tr>
                <td colspan="3" class="text-right">Shipping:</td>
                <td>{{ number_format($order->shipping, 2) }} JD</td>
            </tr>
            <tr>
                <td colspan="3" class="text-right">Total:</td>
                <td><strong>{{ number_format($order->total, 2) }} JD</strong></td>
            </tr>
        </tfoot>
    </table>
    
    <div class="payment-info">
        <h3>Payment Method</h3>
        <p>{{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</p>
    </div>
    
    @if($order->notes)
    <div class="order-notes">
        <h3>Additional Notes</h3>
        <p>{{ $order->notes }}</p>
    </div>
    @endif
    
    <div class="footer">
        <p>Thank you for shopping with LeafyLand!</p>
        <p>For any inquiries, please contact us at info@leafyland.com</p>
    </div>
</body>
</html>