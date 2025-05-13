<!DOCTYPE html>
<html lang="en">

@include('layouts.top')

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="img/core-img/leaf.png" alt="">
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
   @include('layouts.header')
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{asset('img/bg-img/69.jpg')}});">
            <h2>Cart</h2>
        </div>

        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
              
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Cart Area Start ##### -->
    <div class="cart-area section-padding-0-100 clearfix">
        <div class="container">
            @section('content')
            <div class="cart-area container my-5">
                <h2 class="mb-4">🛒 Your Cart</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center">
                        <thead class="table-success">
                            <tr>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $item)
                                <tr data-id="{{ $item->id }}">
                                    <td data-label="Image">
                                        <img src="{{ asset('storage/' . $item->product->image) }}" alt="Product Image" class="img-fluid" width="60">
                                    </td>
                                    <td data-label="Product">
                                        <a href="{{ route('shop-details', $item->product->slug) }}">
                                            {{ $item->product->name }}
                                        </a>
                                    </td>
                                    <td data-label="Size">{{ $item->size }}</td>
                                    <td data-label="Quantity">
                                        <div class="d-flex justify-content-center">
                                            <input type="number" min="1" value="{{ $item->quantity }}" 
                                                   class="form-control quantity-input" 
                                                   data-cart-id="{{ $item->id }}" 
                                                   data-max="{{ $item->product->stock }}"
                                                   style="max-width: 80px;">
                                        </div>
                                    </td>
                                    <td data-label="Price">{{ number_format($item->product->price, 2) }}JD</td>
                                    <td data-label="Total" class="item-total">{{ number_format($item->product->price * $item->quantity, 2) }}JD</td>
                                    <td data-label="Action">
                                        <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $item->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        

            <div class="row">
                <!-- Coupon Discount -->
                <div class="col-12 col-lg-6">
                    <div class="coupon-discount mt-4">
                        <h5 class="mb-3">Apply Coupon</h5>
                        Coupons can be applied in the cart prior to checkout. Add an eligible item from the booth of the seller that created the coupon code to your cart. Click the green "Apply code" button to add the coupon to your order. The order total will update to indicate the savings specific to the coupon code entered.
                        <div class="input-group">
                            <input type="text" name="coupon_code" id="coupon_code" class="form-control" placeholder="Enter coupon code">
                            <div class="input-group-append">
                                <button class="btn btn-success" type="button" id="apply-coupon-btn">Apply</button>
                            </div>
                        </div>
                        <div id="coupon-message" class="mt-2 small"></div>
                    </div>
                </div>
            
                <!-- Cart Totals -->
                <div class="col-12 col-lg-6">
                    <div class="cart-totals-area mt-4">
                        <h5 class="mb-3">Order Summary</h5>
                        
                        <div class="cart-summary">
                            <!-- Subtotal -->
                            <div class="d-flex justify-content-between mb-2">
                                <span>Subtotal</span>
                                <span id="subtotal">{{ number_format($subtotal, 2) }}JD</span>
                            </div>
                            
                            <!-- Coupon Discount -->
                            <div class="d-flex justify-content-between mb-2 text-success" id="coupon-row" style="display: none !important;">
                                <span>Discount (<span id="coupon-code-display"></span>)</span>
                                <span id="coupon-value">-$0.00</span>
                            </div>
                            
                            <!-- Shipping -->
                            <div class="d-flex justify-content-between mb-2">
                                <span>Shipping</span>
                                <span id="shipping-cost">{{ number_format($shipping, 2) }}JD</span>
                            </div>
                            
                            <hr>
                            
                            <!-- Total -->
                            <div class="d-flex justify-content-between font-weight-bold">
                                <span>Total</span>
                                <span id="total">{{ number_format($total, 2) }}JD</span>
                            </div>
                        </div>
                        
                        <!-- Proceed to Checkout -->
     <button id="proceed-to-checkout" class="btn btn-success btn-block mt-4 py-2" 
        onclick="proceedToCheckout()">
    Proceed to Checkout
</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- ##### Cart Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
  @include('layouts.footer')
    <!-- ##### Footer Area End ##### -->
@include('layouts.bottom')



  
</body>
<!-- SweetAlert CDN -->
<!-- SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Handle quantity update
    document.querySelectorAll('.quantity-input').forEach(input => {
        input.addEventListener('change', function () {
            const cartId = this.dataset.cartId;
            const newQty = this.value;
            const maxQty = this.dataset.max;
            const row = this.closest('tr');
            const price = parseFloat(row.querySelector('td:nth-child(5)').textContent.replace('$', ''));

            if (parseInt(newQty) > parseInt(maxQty)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Quantity Exceeded',
                    text: `Only ${maxQty} items available in stock.`
                });
                this.value = maxQty;
                return;
            }

            fetch("{{ route('cart.update') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    cart_id: cartId,
                    quantity: newQty
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update item total
                    row.querySelector('.item-total').textContent = '$' + (price * newQty).toFixed(2);

                    // Update summary
                    document.getElementById('subtotal').textContent = '$' + data.totals.subtotal.toFixed(2);
                    document.getElementById('shipping-cost').textContent = '$' + data.totals.shipping.toFixed(2);
                    document.getElementById('total').textContent = '$' + data.totals.total.toFixed(2);

                    Swal.fire({
                        icon: 'success',
                        title: 'Updated',
                        text: 'Quantity updated successfully!',
                        timer: 1200,
                        showConfirmButton: false
                    });
                }
            })
            .catch(() => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while updating quantity.'
                });
            });
        });
    });

    // Handle delete item
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.dataset.id;

            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it'
            }).then(result => {
                if (result.isConfirmed) {
                    fetch(`/cart/delete/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire('Deleted!', 'Your item has been deleted.', 'success')
                            .then(() => location.reload());
                        }
                    });
                }
            });
        });
    });

    // Handle coupon apply
    const applyCouponBtn = document.getElementById('apply-coupon-btn');
    if (applyCouponBtn) {
        applyCouponBtn.addEventListener('click', applyCoupon);
    }

    const applyCouponForm = document.getElementById('apply-coupon-form');
    if (applyCouponForm) {
        applyCouponForm.addEventListener('submit', function (e) {
            e.preventDefault();
            applyCoupon();
        });
    }

    function applyCoupon() {
        const couponInput = document.getElementById('coupon_code');
        const couponCode = couponInput?.value.trim();
        const subtotal = parseFloat(document.getElementById('subtotal').textContent.replace(/[^0-9.-]+/g, ""));

        if (!couponCode) {
            showCouponMessage('Please enter a coupon code', 'error');
            return;
        }

        fetch("{{ route('apply.coupon') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                coupon_code: couponCode,
                subtotal: subtotal
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                updateOrderTotals(data.coupon.discount, data.coupon.code);
                showCouponMessage(data.message, 'success');

                if (window.location.pathname.includes('cart')) {
                    window.location.href = "{{ route('checkout') }}";
                }
            } else {
                showCouponMessage(data.message, 'error');
            }
        })
        .catch(error => {
            showCouponMessage('An error occurred. Please try again.', 'error');
            console.error('Error:', error);
        });
    }

    function updateOrderTotals(discount, couponCode) {
        const subtotal = parseFloat(document.getElementById('subtotal').textContent.replace(/[^0-9.-]+/g, ""));
        const shipping = parseFloat(document.getElementById('shipping-cost').textContent.replace(/[^0-9.-]+/g, ""));
        const total = subtotal + shipping - discount;

        document.getElementById('coupon-row').style.display = 'flex';
        document.getElementById('coupon-code-display').textContent = couponCode;
        document.getElementById('coupon-value').textContent = '-$' + discount.toFixed(2);
        document.getElementById('total').textContent = '$' + total.toFixed(2);
    }

    function showCouponMessage(message, type) {
        const messageDiv = document.getElementById('coupon-message');
        messageDiv.textContent = message;
        messageDiv.className = type === 'success' ? 'text-success small mt-2' : 'text-danger small mt-2';
    }
});
</script>

</html>