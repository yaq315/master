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
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{asset('img/bg-img/63.jpg')}}); background-color: rgba(0,0,0,0.4); background-blend-mode: overlay;">
            <h2>Shop</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shop</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Shop Area Start ##### -->
    <section class="shop-page section-padding-0-100">
        <div class="container">
            <div class="row">
                <!-- Shop Sorting Data -->
                <div class="col-12">
                    <div class="shop-sorting-data d-flex flex-wrap align-items-center justify-content-between">
                        <!-- Shop Page Count -->
                        <div class="shop-page-count">
                            <p>Showing 1–9 of 72 results</p>
                        </div>
                        <!-- Search by Terms -->
                        <div class="search_by_terms">
                            <form action="#" method="post" class="form-inline">
                                <select class="custom-select widget-title">
                                    <option selected>Sort by Popularity</option>
                                    <option value="1">Sort by Newest</option>
                                    <option value="2">Sort by Sales</option>
                                    <option value="3">Sort by Ratings</option>
                                </select>
                                <select class="custom-select widget-title">
                                    <option selected>Show: 9</option>
                                    <option value="1">12</option>
                                    <option value="2">18</option>
                                    <option value="3">24</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <!-- Sidebar Area -->
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop-sidebar-area">
    
                        <!-- Shop Widget -->
                        <div class="shop-widget price mb-50">
                            <h4 class="widget-title">Prices</h4>
                            <div class="widget-desc">
                                <div class="slider-range">
                                    <div data-min="5" data-max="150" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="5" data-value-max="150" data-label-result="Price:">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all first-handle" tabindex="0"></span>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    </div>
                                    <div class="range-price">Price: $5 - $150</div>
                                </div>
                            </div>
                        </div>
    
                        <!-- Shop Widget -->
                        <div class="shop-widget catagory mb-50">
                            <h4 class="widget-title">Categories</h4>
                            <div class="widget-desc">
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">All Plants <span class="text-muted">(72)</span></label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label" for="customCheck2">Indoor Plants <span class="text-muted">(25)</span></label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                                    <label class="custom-control-label" for="customCheck3">Outdoor Plants <span class="text-muted">(20)</span></label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck4">
                                    <label class="custom-control-label" for="customCheck4">Succulents & Cacti <span class="text-muted">(15)</span></label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck5">
                                    <label class="custom-control-label" for="customCheck5">Gardening Tools <span class="text-muted">(10)</span></label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck6">
                                    <label class="custom-control-label" for="customCheck6">Planters & Pots <span class="text-muted">(12)</span></label>
                                </div>
                            </div>
                        </div>
    
                        <!-- Shop Widget -->
                        <div class="shop-widget sort-by mb-50">
                            <h4 class="widget-title">Sort by</h4>
                            <div class="widget-desc">
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck7">
                                    <label class="custom-control-label" for="customCheck7">New arrivals</label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck8">
                                    <label class="custom-control-label" for="customCheck8">Alphabetically, A-Z</label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck9">
                                    <label class="custom-control-label" for="customCheck9">Alphabetically, Z-A</label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck10">
                                    <label class="custom-control-label" for="customCheck10">Price: low to high</label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center">
                                    <input type="checkbox" class="custom-control-input" id="customCheck11">
                                    <label class="custom-control-label" for="customCheck11">Price: high to low</label>
                                </div>
                            </div>
                        </div>
    
                        <!-- Shop Widget -->
                        <div class="shop-widget best-seller mb-50">
                            <h4 class="widget-title">Best Sellers</h4>
                            <div class="widget-desc">
    
                                <!-- Single Best Seller Products -->
                                <div class="single-best-seller-product d-flex align-items-center">
                                    <div class="product-thumbnail">
                                        <a href="shop-details.html"><img src="img/bg-img/4.jpg" alt="Monstera Deliciosa"></a>
                                    </div>
                                    <div class="product-info">
                                        <a href="shop-details.html">Monstera Deliciosa</a>
                                        <p>$24.99</p>
                                        <div class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </div>
    
                                <!-- Single Best Seller Products -->
                                <div class="single-best-seller-product d-flex align-items-center">
                                    <div class="product-thumbnail">
                                        <a href="shop-details.html"><img src="img/bg-img/5.jpg" alt="Snake Plant"></a>
                                    </div>
                                    <div class="product-info">
                                        <a href="shop-details.html">Snake Plant</a>
                                        <p>$18.99</p>
                                        <div class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-alt"></i>
                                        </div>
                                    </div>
                                </div>
    
                                <!-- Single Best Seller Products -->
                                <div class="single-best-seller-product d-flex align-items-center">
                                    <div class="product-thumbnail">
                                        <a href="shop-details.html"><img src="img/bg-img/34.jpg" alt="Premium Gardening Kit"></a>
                                    </div>
                                    <div class="product-info">
                                        <a href="shop-details.html">Premium Gardening Kit</a>
                                        <p>$29.99</p>
                                        <div class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </div>
    
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- All Products Area -->
                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop-products-area">
                        <div class="row">
    
                            <!-- Single Product Area -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-area mb-50">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <a href="{{route('shop-details')}}"><img src="img/bg-img/40.png" alt="Fiddle Leaf Fig"></a>
                                        <!-- Product Tag -->
                                        <div class="product-tag">
                                            <a href="#">Hot</a>
                                        </div>
                                        <div class="product-meta d-flex">
                                            <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                            <a href="cart.html" class="add-to-cart-btn">Add to cart</a>
                                            <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                                        </div>
                                    </div>
                                    <!-- Product Info -->
                                    <div class="product-info mt-15 text-center">
                                        <a href="{{route('shop-details')}}">
                                            <p>Fiddle Leaf Fig</p>
                                        </a>
                                        <h6>$34.99</h6>
                                    </div>
                                </div>
                            </div>
    
                            <!-- Single Product Area -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-area mb-50">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <a href="{{route('shop-details')}}"><img src="img/bg-img/41.png" alt="Peace Lily"></a>
                                        <div class="product-meta d-flex">
                                            <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                            <a href="cart.html" class="add-to-cart-btn">Add to cart</a>
                                            <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                                        </div>
                                    </div>
                                    <!-- Product Info -->
                                    <div class="product-info mt-15 text-center">
                                        <a href="{{route('shop-details')}}">
                                            <p>Peace Lily</p>
                                        </a>
                                        <h6>$22.99</h6>
                                    </div>
                                </div>
                            </div>
    
                            <!-- Single Product Area -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-area mb-50">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <a href="{{route('shop-details')}}"><img src="img/bg-img/42.png" alt="Aloe Vera Plant"></a>
                                        <div class="product-meta d-flex">
                                            <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                            <a href="cart.html" class="add-to-cart-btn">Add to cart</a>
                                            <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                                        </div>
                                    </div>
                                    <!-- Product Info -->
                                    <div class="product-info mt-15 text-center">
                                        <a href="{{route('shop-details')}}">
                                            <p>Aloe Vera Plant</p>
                                        </a>
                                        <h6>$15.99</h6>
                                    </div>
                                </div>
                            </div>
    
                            <!-- Single Product Area -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-area mb-50">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <a href="{{route('shop-details')}}"><img src="img/bg-img/43.png" alt="Ceramic Planter Set"></a>
                                        <div class="product-meta d-flex">
                                            <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                            <a href="cart.html" class="add-to-cart-btn">Add to cart</a>
                                            <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                                        </div>
                                    </div>
                                    <!-- Product Info -->
                                    <div class="product-info mt-15 text-center">
                                        <a href="{{route('shop-details')}}">
                                            <p>Ceramic Planter Set</p>
                                        </a>
                                        <h6>$29.99</h6>
                                    </div>
                                </div>
                            </div>
    
                            <!-- Single Product Area -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-area mb-50">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <a href="{{route('shop-details')}}"><img src="img/bg-img/44.png" alt="Rubber Plant"></a>
                                        <div class="product-meta d-flex">
                                            <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                            <a href="cart.html" class="add-to-cart-btn">Add to cart</a>
                                            <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                                        </div>
                                    </div>
                                    <!-- Product Info -->
                                    <div class="product-info mt-15 text-center">
                                        <a href="{{route('shop-details')}}">
                                            <p>Rubber Plant</p>
                                        </a>
                                        <h6>$27.99</h6>
                                    </div>
                                </div>
                            </div>
    
                            <!-- Single Product Area -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-area mb-50">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <a href="{{route('shop-details')}}"><img src="img/bg-img/45.png" alt="Gardening Tool Set"></a>
                                        <div class="product-meta d-flex">
                                            <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                            <a href="cart.html" class="add-to-cart-btn">Add to cart</a>
                                            <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                                        </div>
                                    </div>
                                    <!-- Product Info -->
                                    <div class="product-info mt-15 text-center">
                                        <a href="{{route('shop-details')}}">
                                            <p>Gardening Tool Set</p>
                                        </a>
                                        <h6>$39.99</h6>
                                    </div>
                                </div>
                            </div>
    
                            <!-- Single Product Area -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-area mb-50">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <a href="{{route('shop-details')}}"><img src="img/bg-img/46.png" alt="ZZ Plant"></a>
                                        <div class="product-meta d-flex">
                                            <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                            <a href="cart.html" class="add-to-cart-btn">Add to cart</a>
                                            <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                                        </div>
                                    </div>
                                    <!-- Product Info -->
                                    <div class="product-info mt-15 text-center">
                                        <a href="{{route('shop-details')}}">
                                            <p>ZZ Plant</p>
                                        </a>
                                        <h6>$19.99</h6>
                                    </div>
                                </div>
                            </div>
    
                            <!-- Single Product Area -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-area mb-50">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <a href="{{route('shop-details')}}"><img src="img/bg-img/47.png" alt="Hanging Planters"></a>
                                        <!-- Product Tag -->
                                        <div class="product-tag sale-tag">
                                            <a href="#">Sale</a>
                                        </div>
                                        <div class="product-meta d-flex">
                                            <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                            <a href="cart.html" class="add-to-cart-btn">Add to cart</a>
                                            <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                                        </div>
                                    </div>
                                    <!-- Product Info -->
                                    <div class="product-info mt-15 text-center">
                                        <a href="shop-details.html">
                                            <p>Hanging Planters (Set of 3)</p>
                                        </a>
                                        <h6>$24.99 <span class="original-price">$34.99</span></h6>
                                    </div>
                                </div>
                            </div>
    
                            <!-- Single Product Area -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-area mb-50">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <a href="{{route('shop-details')}}"><img src="img/bg-img/48.png" alt="Pothos Golden"></a>
                                        <div class="product-meta d-flex">
                                            <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                            <a href="cart.html" class="add-to-cart-btn">Add to cart</a>
                                            <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                                        </div>
                                    </div>
                                    <!-- Product Info -->
                                    <div class="product-info mt-15 text-center">
                                        <a href="{{route('shop-details')}}">
                                            <p>Pothos Golden</p>
                                        </a>
                                        <h6>$16.99</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <!-- Pagination -->
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
   @include('layouts.footer')
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Files ##### -->
@include('layouts.bottom')
</body>

</html>