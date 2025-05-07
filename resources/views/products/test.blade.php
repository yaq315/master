@section('content')
<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{asset('img/bg-img/63.jpg')}}); background-color: rgba(0,0,0,0.4); background-blend-mode: overlay;">
        <h2>Product Details</h2>
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
<section class="single_product_details_area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="single_product_thumb">
                    <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                        <!-- Slides -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                            </div>
                            @if($product->images && is_array(json_decode($product->images)))
                            @foreach(json_decode($product->images) as $image)
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ asset('storage/' . $image) }}" alt="{{ $product->name }}">
                                </div>
                            @endforeach

                        @endif
                        
                        </div>
                        <!-- Controls -->
                        <a class="carousel-control-prev" href="#product_details_slider" role="button" data-slide="prev">
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#product_details_slider" role="button" data-slide="next">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="single_product_desc">
                    <h4>{{ $product->name }}</h4>
                    <h5>
                        ${{ number_format($product->price, 2) }}
                        @if($product->original_price)
                        <span>${{ number_format($product->original_price, 2) }}</span>
                        @endif
                    </h5>
                    <p>{{ $product->description }}</p>

                    <!-- Care Information -->
                    <div class="care-info mb-30">
                        <h6>Care Instructions</h6>
                        <ul>
                            <li><i class="fa fa-sun-o"></i> Light: Bright indirect light</li>
                            <li><i class="fa fa-tint"></i> Water: Once a week</li>
                            <li><i class="fa fa-thermometer-half"></i> Temperature: 18-24°C</li>
                        </ul>
                    </div>

                    <!-- Add to Cart Form -->
                    <form class="cart-form clearfix" method="post">
                        <!-- Select Box -->
                        <div class="select-box d-flex mt-50 mb-30">
                            <select name="size" id="productSize" class="mr-5">
                                <option value="small">Small</option>
                                <option value="medium">Medium</option>
                                <option value="large">Large</option>
                            </select>
                            <select name="quantity" id="productQuantity">
                                @for($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <!-- Cart & Favourite Box -->
                        <div class="cart-fav-box d-flex align-items-center">
                            <!-- Cart -->
                            <button type="submit" name="addtocart" class="btn alazea-btn mr-3">Add to cart</button>
                            <!-- Favourite -->
                            <div class="product-favourite ml-4">
                                <a href="#" class="favme fa fa-heart"></a>
                            </div>
                        </div>
                    </form>

                    <!-- Product Meta -->
                    <div class="products-meta mt-30">
                        <p><span>Category:</span> <a href="{{ route('shop', ['category' => $product->category->slug]) }}">{{ $product->category->name }}</a></p>
                        <p><span>Stock:</span> <span class="{{ $product->stock > 0 ? 'text-success' : 'text-danger' }}">{{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}</span></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="product_details_tab section-padding-0-100">
                    <!-- Tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="care-tab" data-toggle="tab" href="#care" role="tab" aria-controls="care" aria-selected="false">Care Guide</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews (3)</a>
                        </li>
                    </ul>
                    <!-- Tab Content -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                            <div class="description_area">
                                <p>{{ $product->description }}</p>
                                <p>This beautiful plant will add a touch of nature to your home or office. Perfect for beginners and experienced plant lovers alike.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="care" role="tabpanel" aria-labelledby="care-tab">
                            <div class="care_area">
                                <ul>
                                    <li><strong>Light:</strong> Prefers bright, indirect light but can tolerate lower light conditions.</li>
                                    <li><strong>Water:</strong> Water when the top inch of soil is dry. Avoid overwatering.</li>
                                    <li><strong>Humidity:</strong> Enjoys moderate to high humidity.</li>
                                    <li><strong>Temperature:</strong> Keep in temperatures between 18-24°C.</li>
                                    <li><strong>Fertilizer:</strong> Feed monthly during the growing season with a balanced fertilizer.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="reviews_area">
                                <!-- Single Review -->
                                <div class="single_review mb-15">
                                    <div class="reviewer_meta d-flex align-items-center mb-4">
                                        <img src="img/bg-img/user1.jpg" alt="">
                                        <div class="reviewer-content">
                                            <h6>Sarah Johnson</h6>
                                            <div class="ratings">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Beautiful plant! Arrived in perfect condition and is thriving in my living room.</p>
                                </div>
                                <!-- Single Review -->
                                <div class="single_review mb-15">
                                    <div class="reviewer_meta d-flex align-items-center mb-4">
                                        <img src="img/bg-img/user2.jpg" alt="">
                                        <div class="reviewer-content">
                                            <h6>Michael Brown</h6>
                                            <div class="ratings">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Great addition to my plant collection. The care instructions were very helpful.</p>
                                </div>
                                <!-- Single Review -->
                                <div class="single_review">
                                    <div class="reviewer_meta d-flex align-items-center mb-4">
                                        <img src="img/bg-img/user3.jpg" alt="">
                                        <div class="reviewer-content">
                                            <h6>Emily Davis</h6>
                                            <div class="ratings">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Fast delivery and the plant was very well packaged. Highly recommend!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        @if($relatedProducts->count() > 0)
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>Related Products</h2>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($relatedProducts as $product)
            <!-- Single Product Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-product-area mb-50">
                    <!-- Product Image -->
                    <div class="product-img">
                        {{-- <a href="{{ route('shop-details', $product) }}">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        </a> --}}
                        @if($product->is_hot)
                        <!-- Product Tag -->
                        <div class="product-tag">
                            <a href="#">Hot</a>
                        </div>
                        @endif
                        <div class="product-meta d-flex">
                            <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                            <a href="cart.html" class="add-to-cart-btn">Add to cart</a>
                            <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                        </div>
                    </div>
                    <!-- Product Info -->
                    <div class="product-info mt-15 text-center">
                        <a href="{{ route('shop-details', $product) }}">
                            <p>{{ $product->name }}</p>
                        </a>
                        <h6>${{ number_format($product->price, 2) }}</h6>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>



<!-- Product Details Area End -->
@endsection