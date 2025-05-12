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

    <!-- Header -->
    @include('layouts.header')

    <!-- Breadcrumb -->
    <div class="breadcrumb-area">
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{asset('img/bg-img/51.jpg')}});">
            <h2>Checkout</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <!-- Shipping & Payment -->
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">Shipping Information</h5>
                    </div>
                    <div class="card-body">
                        <form id="checkout-form" method="POST" action="{{ route('place.order') }}">
                            @csrf
                            
                            <!-- Personal Information -->
                            <div class="form-row mb-4">
                                <div class="col-md-6 mb-3">
                                    <label for="name">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name" 
                                           value="{{ Auth::user()->name }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" class="form-control" id="phone" name="phone" required>
                                </div>
                            </div>
                            
                            <!-- Shipping Address -->
                            <div class="form-group mb-3">
                                <label for="city">Governorate</label>
                                <select class="form-control" id="city" name="city" required>
                                    <option value="">Select Governorate</option>
                                    @foreach(['Amman', 'Zarqa', 'Irbid', 'Balqa', 'Karak', 'Ma\'an', 'Aqaba', 'Mafraq', 'Tafilah', 'Madaba', 'Jerash', 'Ajloun'] as $gov)
                                        <option value="{{ $gov }}">{{ $gov }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="address">Full Address</label>
                                <textarea class="form-control" id="address" name="address" rows="2" required></textarea>
                            </div>
                            
                            <!-- Payment Method -->
                            <div class="payment-methods mb-4">
                                <h6 class="mb-3">Payment Method</h6>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" 
                                           id="cash-on-delivery" value="cash_on_delivery" checked>
                                    <label class="form-check-label" for="cash-on-delivery">
                                        Cash on Delivery
                                    </label>
                                </div>
                            </div>
                            
                            <!-- Order Notes -->
                            <div class="form-group mb-3">
                                <label for="notes">Additional Notes (optional)</label>
                                <textarea class="form-control" id="notes" name="notes" rows="2"></textarea>
                            </div>
                            
               <!-- عدل زر التأكيد ليكون -->
<button type="submit" class="btn btn-success btn-block py-2" id="confirm-order-btn">
    Confirm Order
</button>

                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Order Summary -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">Order Summary</h5>
                    </div>
                    <div class="card-body">
                        <div class="order-items mb-3">
                           @foreach($cartItems as $item)
                            <div class="d-flex justify-content-between mb-2">
                                <span>{{ $item->product->name }} × {{ $item->quantity }}</span>
                                <span>{{ number_format($item->product->price * $item->quantity, 2) }} JOD</span>
                            </div>
                            @endforeach
                        </div>
                        
                        <hr>
                        
                        <div class="order-totals">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Subtotal</span>
                                <span>{{ number_format($subtotal, 2) }} JOD</span>
                            </div>
                            
                            @if($discount > 0)
                            <div class="d-flex justify-content-between mb-2 text-success">
                                <span>Discount</span>
                                <span>-{{ number_format($discount, 2) }} JOD</span>
                            </div>
                            @endif
                            
                            <div class="d-flex justify-content-between mb-2">
                                <span>Shipping</span>
                                <span>{{ number_format($shipping, 2) }} JOD</span>
                            </div>
                            
                            <hr>
                            
                            <div class="d-flex justify-content-between font-weight-bold">
                                <span>Total</span>
                                <span>{{ number_format($total, 2) }} JOD</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer')
    @include('layouts.bottom')

    <!-- JavaScript -->
<!-- jQuery & SweetAlert2 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const checkoutForm = document.getElementById('checkout-form');

    if (checkoutForm) {
        checkoutForm.addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(checkoutForm);
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

            Swal.fire({
                title: 'Confirm Your Order',
                html: `
                    <div class="text-left">
                        <p><strong>Name:</strong> ${formData.get('name')}</p>
                        <p><strong>Phone:</strong> ${formData.get('phone')}</p>
                        <p><strong>Governorate:</strong> ${formData.get('city')}</p>
                        <p><strong>Address:</strong> ${formData.get('address')}</p>
                        <hr>
                        <p><strong>Total:</strong> {{ number_format($total, 2) }} JOD</p>
                    </div>
                `,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Place Order',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#28a745'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Processing...',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    fetch(checkoutForm.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        Swal.close();
                        if (data.success) {
                            Swal.fire({
                                title: 'Order Placed Successfully!',
                                html: `
                                    <div class="text-left">
                                        <p>Order #: <strong>${data.order_number}</strong></p>
                                        <p>Thank you for shopping with us!</p>
                                    </div>
                                `,
                                icon: 'success',
                                confirmButtonText: 'Download Invoice',
                                cancelButtonText: 'Back to Home',
                                showCancelButton: true
                            }).then(result => {
                                if (result.isConfirmed) {
                                    window.location.href = `/orders/${data.order_id}/pdf`;
                                } else {
                                    window.location.href = '/';
                                }
                            });
                        } else {
                            Swal.fire('Error!', data.message || 'Failed to place order.', 'error');
                        }
                    })
                    .catch(error => {
                        console.error(error);
                        Swal.fire('Error!', 'An error occurred while placing your order.', 'error');
                    });
                }
            });
        });
    }

    // Coupon Apply Handler (if coupon form exists)
    const couponForm = document.getElementById('apply-coupon-form');
    if (couponForm) {
        couponForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch("{{ route('apply.coupon') }}", {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    document.getElementById('coupon-message').innerHTML = `
                        <div class="alert alert-danger">${data.message}</div>
                    `;
                }
            });
        });
    }
});
</script>


</body>
</html>
