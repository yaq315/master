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
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{asset('img/bg-img/51.jpg')}});">
            <h2>order</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">order</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Cart Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{asset('img/bg-img/51.jpg')}});">
            <h2>Order Confirmation</h2>
        </div>
    
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Order Confirmation</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h4>Order Confirmation</h4>
                    </div>
                    <div class="card-body text-center">
                        <div class="mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="green" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </svg>
                        </div>
                        <h3 class="text-success">Thank You For Your Order!</h3>
                        <p>Your order has been placed successfully.</p>
                        <p>Order Number: <strong>{{ $order->order_number }}</strong></p>
                        <p>Total Amount: <strong>${{ number_format($order->total, 2) }}</strong></p>
                        <p>We'll send you a confirmation email shortly.</p>
                        
                        <a href="{{ route('home') }}" class="btn btn-success mt-3">Continue Shopping</a>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>

    
    document.querySelectorAll('.quantity-input').forEach(input => {
        input.addEventListener('change', function () {
            const cartId = this.dataset.cartId;
            const newQuantity = this.value;
            const maxQuantity = this.dataset.max;

            if (parseInt(newQuantity) > parseInt(maxQuantity)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Quantity Exceeded',
                    text: `Only ${maxQuantity} items available in stock.`
                });
                this.value = maxQuantity; // ترجعها للقيمة الصحيحة
                return;
            }

            fetch(`/cart/update-quantity`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    cart_id: cartId,
                    quantity: newQuantity
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Updated',
                        text: 'Quantity updated successfully!',
                        timer: 1200,
                        showConfirmButton: false
                    });
                    location.reload(); // أو: حدث السعر بدون تحديث كامل إذا بتحب
                }
            });
        });
    });
    
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
        }).then((result) => {
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
                        Swal.fire(
                            'Deleted!',
                            'Your item has been deleted.',
                            'success'
                        ).then(() => {
                            location.reload();
                        });
                    }
                });
            }
        });
    });
});



document.addEventListener('DOMContentLoaded', function() {
    // تطبيق الكوبون
    document.getElementById('apply-coupon-btn').addEventListener('click', function() {
        const couponCode = document.getElementById('coupon_code').value;
        const couponMessage = document.getElementById('coupon-message');
        
        fetch("{{ route('apply.coupon') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                coupon_code: couponCode
            })
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                const coupon = data.coupon;
                const subtotal = parseFloat(document.getElementById('subtotal').textContent.replace('$', ''));
                let discount = 0;
                
                if(coupon.type === 'fixed') {
                    discount = coupon.value;
                } else {
                    discount = subtotal * (coupon.value / 100);
                }
                
                // عرض تفاصيل الكوبون
                document.getElementById('coupon-row').style.display = 'flex';
                document.getElementById('coupon-code-display').textContent = coupon.code;
                document.getElementById('coupon-value').textContent = `-$${discount.toFixed(2)}`;
                
                // تحديث المجموع الكلي
                const shipping = 0; // يمكنك إضافة حساب الشحن هنا
                const total = subtotal + shipping - discount;
                document.getElementById('total').textContent = `$${total.toFixed(2)}`;
                
                couponMessage.innerHTML = `<div class="alert alert-success">Coupon applied successfully!</div>`;
            } else {
                couponMessage.innerHTML = `<div class="alert alert-danger">${data.message}</div>`;
            }
        })
        .catch(error => {
            couponMessage.innerHTML = `<div class="alert alert-danger">An error occurred. Please try again.</div>`;
        });
    });
    
    // تحديث تكلفة الشحن (اختياري)
    document.getElementById('update-shipping-btn').addEventListener('click', function() {
        // يمكنك إضافة منطق حساب تكلفة الشحن هنا
        const shippingCost = 5.00; // مثال: تكلفة ثابتة
        
        const subtotal = parseFloat(document.getElementById('subtotal').textContent.replace('$', ''));
        const couponValue = parseFloat(document.getElementById('coupon-value').textContent.replace('-$', '')) || 0;
        const total = subtotal + shippingCost - couponValue;
        
        document.getElementById('total').textContent = `$${total.toFixed(2)}`;
    });
});

    </script>
</html>