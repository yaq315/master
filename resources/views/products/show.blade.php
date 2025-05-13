@extends('layouts.contain')

@section('content')
<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area">
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{asset('img/bg-img/67.jpg')}});">
        <h2 class="text-white">Product Details</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('shop')}}">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

<!-- Product Details Area Start -->
<section class="product-details-section py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Product Images -->
            <div class="col-lg-6">
                <div class="product-gallery">
                    <div class="main-image mb-4">
                        <img id="mainProductImage" src="{{ asset('storage/' . $product->image) }}" 
                             alt="{{ $product->name }}" class="img-fluid w-100 rounded-3">
                    </div>
                    
                    @if($product->images && is_array(json_decode($product->images)))
                    <div class="thumbnail-gallery d-flex flex-wrap gap-3">
                        <div class="thumbnail-item active">
                            <img src="{{ asset('storage/' . $product->image) }}" 
                                 alt="{{ $product->name }}" class="img-fluid rounded-2" style="width: 80px; height: 80px; object-fit: cover;">
                        </div>
                        @foreach(json_decode($product->images) as $image)
                        <div class="thumbnail-item">
                            <img src="{{ asset('storage/' . $image) }}" 
                                 alt="{{ $product->name }}" class="img-fluid rounded-2" style="width: 80px; height: 80px; object-fit: cover;">
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-lg-6">
                <div class="product-info p-4">
                    <h1 class="product-title mb-3 fw-bold">{{ $product->name }}</h1>
                    
                    <div class="price-section mb-4">
                        <span class="current-price fs-3 text-dark fw-bold">{{ number_format($product->price, 2) }}JD</span>
                        {{-- <span class="product-size text-muted ms-2">Size: Medium</span> --}}
                        @if($product->original_price)
                        <span class="original-price text-muted text-decoration-line-through ms-2">{{ number_format($product->original_price, 2) }}JD</span>
                        <span class="discount-badge bg-success text-white px-2 py-1 rounded ms-2 fs-6">
                            Save {{ number_format(100 - ($product->price / $product->original_price * 100), 0) }}%
                        </span>
                        @endif
                    </div>

                    {{-- <div class="product-description mb-4">
                        <p class="text-secondary">{{ $product->description }}</p>
                    </div> --}}

                    <!-- Care Information -->
                    {{-- @if($product->care_instructions)
                    <div class="care-info mb-4">
                        <h5 class="mb-3 fw-semibold">Care Instructions</h5>
                        <div class="care-content bg-light p-3 rounded-3">
                            {!! $product->care_instructions !!}
                        </div>
                    </div>
                    @endif --}}

                    <!-- Add to Cart Form -->
                   @auth
    <!-- Form يظهر فقط إذا كان المستخدم مسجلاً دخوله -->
    <form class="add-to-cart-form mb-4" method="post" action="{{ route('cart.add') }}">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <label for="size" class="form-label fw-medium">Size</label>
                <input type="text" name="size" id="size" class="form-control py-2" value="Medium" readonly>
            </div>
            <div class="col-md-6">
                <label for="quantity" class="form-label fw-medium">Quantity</label>
                <input type="number" name="quantity" id="quantity" 
                       class="form-control py-2 text-center" 
                       value="1" 
                       min="1" 
                       max="{{ $product->stock }}" 
                       oninput="validateQuantity(this)">
            </div>
        </div>

        <button type="submit" class="btn btn-dark w-100 py-3 fw-medium">
            Add to Cart
        </button>
   
        <input type="hidden" name="price" id="price">
    </form>

    @if($product->usage)
    <div class="alert mt-4" style="background-color: #d4edda; color: #155724; border-color: #c3e6cb;">

        <strong>Usage Instructions:</strong><br>
        {{ $product->usage }}
    </div>
@endif
@endauth

@guest
    <!-- زر تسجيل دخول يظهر لغير المسجلين -->
    <a href="{{ route('login') }}" class="btn btn-dark w-100 py-3 fw-medium">
        Login to Add to Cart
    </a>
@endguest


                    <!-- Product Meta -->
                    <div class="product-meta mt-4 pt-3 border-top">
                        <div class="d-flex flex-wrap gap-4">
                            <div class="meta-item">
                                <span class="fw-medium text-secondary">SKU:</span> 
                                <span>PL{{ str_pad($product->id, 4, '0', STR_PAD_LEFT) }}</span>
                            </div>
                            <div class="meta-item">
                                <span class="fw-medium text-secondary">Category:</span> 
                                <a href="{{ route('shop', ['category' => $product->category->slug]) }}" class="text-dark">
                                    {{ $product->category->name }}
                                </a>
                            </div>
                            <div class="meta-item">
                                <span class="fw-medium text-secondary">Availability:</span> 
                                <span class="{{ $product->stock > 0 ? 'text-success' : 'text-danger' }}">
                                    {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      

      
      
        

        <!-- Product Tabs -->
        <div class="product-tabs mt-5 pt-4">
            <ul class="nav nav-tabs border-0" id="productTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active px-4 py-3 fw-medium" id="description-tab" data-bs-toggle="tab" 
                            data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link px-4 py-3 fw-medium" id="care-tab" data-bs-toggle="tab" 
                            data-bs-target="#care" type="button" role="tab" aria-controls="care" aria-selected="false">Care Guide</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link px-4 py-3 fw-medium" id="reviews-tab" data-bs-toggle="tab" 
                            data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews</button>
                </li>
            </ul>
            
            <div class="tab-content p-4 border border-top-0 rounded-bottom" id="productTabsContent">
                <!-- Description Tab -->
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                    <div class="product-full-description">
                        <p class="text-secondary">{{ $product->description }}</p>
                    </div>
                </div>
                
                <!-- Care Guide Tab -->
                <div class="tab-pane fade" id="care" role="tabpanel" aria-labelledby="care-tab">
                    @if($product->care_instructions)
                    <div class="care-guide">
                        {!! nl2br(e($product->care_instructions)) !!}
                    </div>
                    @else
                    <div class="alert alert-light">No detailed care information available.</div>
                    @endif
                </div>
                
                <!-- Reviews Tab -->
                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                    <div class="reviews-container">
                        <div class="review-form mb-5">
                            <h5 class="fw-semibold mb-4">Write a Review</h5>
                            <form id="reviewForm" method="POST" action="{{ route('reviews.store', ['product_id' => $product->id]) }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                
                                <div class="mb-3">
                                    <label for="reviewRating" class="form-label fw-medium">Rating</label>
                                    <select class="form-select py-2" id="reviewRating" name="rating" required>
                                        <option value="">Select rating</option>
                                        <option value="5">5 Stars</option>
                                        <option value="4">4 Stars</option>
                                        <option value="3">3 Stars</option>
                                        <option value="2">2 Stars</option>
                                        <option value="1">1 Star</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="reviewText" class="form-label fw-medium">Your Review</label>
                                    <textarea class="form-control py-2" id="reviewText" name="comment" rows="3" required></textarea>
                                </div>
                                
                                <button type="submit" class="btn btn-dark py-2 px-4">Submit Review</button>
                            </form>
                            
                        </div>
                        
                        <div class="reviews-list">
                            <h5 class="fw-semibold mb-4">Customer Reviews</h5>
                            
                            @forelse($product->reviews as $review)
                            <div class="review-item mb-4 pb-4 border-bottom">
                                <div class="d-flex justify-content-between mb-2">
                                    <h6 class="fw-medium">{{ $review->name }}</h6>
                                    <div class="rating-stars text-warning">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $review->rating)
                                                ★
                                            @else
                                                ☆
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                                <p class="text-secondary">{{ $review->review }}</p>
                                <small class="text-muted">Posted on {{ $review->created_at->format('F j, Y') }}</small>
                            </div>
                            @empty
                            <div class="alert alert-light">No reviews yet. Be the first to review this product!</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        @if($relatedProducts->count() > 0)
        <section class="related-products mt-5 pt-5">
            <div class="section-header mb-5">
                <h2 class="fw-bold mb-3">You May Also Like</h2>
                <p class="text-secondary">Discover similar products</p>
            </div>
            
            <div class="row g-4">
                @foreach($relatedProducts as $related)
                <div class="col-md-6 col-lg-3">
                    <div class="product-card h-100 border-0 bg-white rounded-3 overflow-hidden">
                        <div class="product-thumbnail position-relative">
                            <a href="{{ route('shop-details', $related) }}">
                                <img src="{{ asset('storage/' . $related->image) }}" 
                                     alt="{{ $related->name }}" class="img-fluid w-100" style="height: 250px; object-fit: cover;">
                            </a>
                        </div>
                        
                        <div class="product-info p-3">
                            <h5 class="product-title mb-1 fw-medium">
                                <a href="{{ route('shop-details', $related) }}" class="text-dark text-decoration-none">{{ $related->name }}</a>
                            </h5>
                            <div class="product-price mb-2">
                                <span class="current-price text-dark fw-bold">{{ number_format($related->price, 2) }}JD</span>
                                @if($related->original_price)
                                <span class="original-price text-muted text-decoration-line-through ms-1">{{ number_format($related->original_price, 2) }}JD</span>
                                @endif
                            </div>
                            <a href="{{ route('shop-details', $related) }}" class="btn btn-outline-dark w-100 py-2">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        @endif
    </div>
</section>
<!-- Product Details Area End -->
@endsection

@push('styles')
<style>
/* Main Product Gallery */
.product-gallery .main-image {
    border: 1px solid #eaeaea;
    transition: all 0.3s ease;
}

.thumbnail-item {
    cursor: pointer;
    transition: all 0.3s ease;
    border: 1px solid transparent;
}

.thumbnail-item:hover, .thumbnail-item.active {
    border-color: #000;
}

/* Product Info Section */
.product-info {
    background: #fff;
}

.product-title {
    font-size: 2rem;
    line-height: 1.2;
}

.price-section {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
}

.current-price {
    font-size: 1.75rem;
}

.discount-badge {
    font-size: 0.85rem;
}



.tab-content {
    background: #fff;
    border-color: #eaeaea;
}

/* Review Stars */
.rating-stars {
    font-size: 1rem;
    letter-spacing: 2px;
}

/* Related Products */
.product-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.05);
}

.product-thumbnail img {
    transition: transform 0.5s ease;
}

.product-card:hover .product-thumbnail img {
    transform: scale(1.03);
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .product-title {
        font-size: 1.5rem;
    }
    
    .nav-tabs .nav-link {
        padding: 10px 15px;
        font-size: 0.9rem;
    }
    
}


</style>
@endpush

@push('scripts')
<script>

document.addEventListener('DOMContentLoaded', function() {
    // Initialize product gallery functionality
    initProductGallery();
    
    // Initialize review functionality
    initReviewSystem();
    
    // Initialize cart functionality
    initCartSystem();
    
    // Initialize tabs
    initBootstrapTabs();
});

/**
 * Product Gallery Functionality
 */
function initProductGallery() {
    const mainImage = document.getElementById('mainProductImage');
    const thumbnails = document.querySelectorAll('.thumbnail-item img');
    
    if (mainImage && thumbnails.length) {
        thumbnails.forEach(thumbnail => {
            thumbnail.addEventListener('click', function() {
                // Update main image
                mainImage.src = this.src;
                
                // Update active thumbnail
                document.querySelectorAll('.thumbnail-item').forEach(item => {
                    item.classList.remove('active');
                });
                this.closest('.thumbnail-item').classList.add('active');
            });
        });
    }
}

/**
 * Review System Functionality
 */
function initReviewSystem() {
    const reviewForm = document.getElementById('reviewForm');
    
    if (reviewForm) {
        reviewForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Check if user is authenticated
            const isAuthenticated = {{ auth()->check() ? 'true' : 'false' }};
            
            if (!isAuthenticated) {
                window.location.href = "{{ route('login') }}";
                return;
            }
            
            submitReview(this);
        });
    }
}

function submitReview(form) {
    fetch(form.action, {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: new FormData(form)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showAlert('success', 'Review submitted successfully!');
            setTimeout(() => location.reload(), 1500);
        } else {
            showAlert('error', data.message || 'An error occurred while saving.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showAlert('error', 'Network error occurred.');
    });
}

/**
 * Cart System Functionality
 */
function initCartSystem() {
    const addToCartForm = document.querySelector('.add-to-cart-form');
    
    if (addToCartForm) {
        addToCartForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Check if user is authenticated
            const isAuthenticated = {{ auth()->check() ? 'true' : 'false' }};
            
            if (!isAuthenticated) {
                window.location.href = "{{ route('login') }}";
                return;
            }
            
            addToCart(this);
        });
    }
    
    // Quantity input changes
    document.querySelectorAll('.quantity-input').forEach(input => {
        input.addEventListener('change', function() {
            updateCartItem(this);
        });
    });
}
document.querySelector('.add-to-cart-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const quantityInput = document.getElementById('quantity');
    const maxQuantity = parseInt(quantityInput.max);
    const requestedQuantity = parseInt(quantityInput.value);
    
    // التحقق من الكمية
    if (requestedQuantity < 1) {
        Swal.fire({
            icon: 'error',
            title: 'Invalid Quantity',
            text: 'Please enter a quantity of at least 1.',
            confirmButtonColor: '#3085d6',
        });
        return;
    }
    
    if (requestedQuantity > maxQuantity) {
        Swal.fire({
            icon: 'error',
            title: 'Not Enough Stock',
            html: `Sorry, we only have <strong>${maxQuantity}</strong> items available.<br>Please adjust your quantity.`,
            confirmButtonColor: '#3085d6',
        });
        return;
    }
    
    // إذا كانت الكمية مقبولة، تابع عملية الإرسال
    this.submit();
});

// دوال الزيادة والنقصان
function incrementQuantity() {
    const quantityInput = document.getElementById('quantity');
    const currentValue = parseInt(quantityInput.value) || 1;
    const maxValue = parseInt(quantityInput.max);
    
    if (currentValue < maxValue) {
        quantityInput.value = currentValue + 1;
    } else {
        Swal.fire({
            icon: 'warning',
            title: 'Maximum Reached',
            text: `Maximum available quantity is ${maxValue}`,
            timer: 1500,
            showConfirmButton: false
        });
    }
}

function decrementQuantity() {
    const quantityInput = document.getElementById('quantity');
    const currentValue = parseInt(quantityInput.value) || 1;
    
    if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
    } else {
        Swal.fire({
            icon: 'warning',
            title: 'Minimum Reached',
            text: 'Minimum quantity is 1',
            timer: 1500,
            showConfirmButton: false
        });
    }
}
function updateCartQuantity() {
    fetch("{{ route('cart.items') }}")
    .then(response => response.json())
    .then(data => {
        let totalQuantity = 0;
        data.forEach(item => {
            totalQuantity += item.quantity;
        });
        const cartBadge = document.querySelector('.cart-quantity');
        if (cartBadge) {
            cartBadge.textContent = totalQuantity;
        }
    });
}

function updateCartItem(input) {
    const cartId = input.dataset.cartId;
    const newQuantity = input.value;
    const maxQuantity = input.dataset.max;
    const row = input.closest('tr');
    const price = parseFloat(row.querySelector('td:nth-child(5)').textContent.replace('$', ''));

    if (parseInt(newQuantity) > parseInt(maxQuantity)) {
        showAlert('error', `Only ${maxQuantity} items available in stock.`);
        input.value = maxQuantity;
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
            quantity: newQuantity
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update item total
            row.querySelector('.item-total').textContent = '$' + (price * newQuantity).toFixed(2);
            
            // Update totals
            document.getElementById('subtotal').textContent = '$' + data.totals.subtotal.toFixed(2);
            document.getElementById('shipping-cost').textContent = '$' + data.totals.shipping.toFixed(2);
            document.getElementById('total').textContent = '$' + data.totals.total.toFixed(2);
            
            showAlert('success', 'Quantity updated successfully!', 1200);
        }
    })
    .catch(error => {
        showAlert('error', 'An error occurred while updating quantity.');
    });
}

/**
 * Bootstrap Tabs Initialization
 */
function initBootstrapTabs() {
    const tabElms = document.querySelectorAll('button[data-bs-toggle="tab"]');
    tabElms.forEach(tabElm => {
        tabElm.addEventListener('click', function(event) {
            const tabTrigger = new bootstrap.Tab(this);
            tabTrigger.show();
        });
    });
}

/**
 * Helper function to show alerts
 */
function showAlert(type, message, timer = null) {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: timer || 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
    
    Toast.fire({
        icon: type,
        title: message
    });
}

function validateQuantity(input) {
    const maxQuantity = parseInt(input.max);
    const enteredValue = parseInt(input.value);
    
    if (enteredValue < 1) {
        input.value = 1;
    } else if (enteredValue > maxQuantity) {
        input.value = maxQuantity;
        Swal.fire({
            icon: 'warning',
            title: 'Maximum Quantity Reached',
            text: `Only ${maxQuantity} items available in stock.`,
            timer: 2000,
            showConfirmButton: false
        });
    }
}

</script>




@endpush