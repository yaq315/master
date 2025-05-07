@php
    $cartCount = auth()->check()
        ? \App\Models\Cart::where('user_id', auth()->id())->sum('quantity')
        : 0;
@endphp

<span class="cart-quantity">{{ $cartCount }}</span>