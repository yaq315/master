@extends('layouts.contain_about')

@section('content')
<!-- Breadcrumb Area Start -->
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
<!-- Breadcrumb Area End -->

<!-- Shop Area Start -->
<section class="shop-page section-padding-0-100">
    <div class="container">
        <div class="row">
            <!-- Shop Sorting Data -->
            <div class="col-12">
                <div class="shop-sorting-data d-flex flex-wrap align-items-center justify-content-between">
                    <!-- Shop Page Count -->
                    <div class="shop-page-count">
                        <p>Showing {{ $products->firstItem() }}–{{ $products->lastItem() }} of {{ $products->total() }} results</p>
                    </div>
                    <!-- Search by Terms -->
                    <div class="search_by_terms">
                        <form action="{{ route('shop') }}" method="GET" class="form-inline">
                            <select class="custom-select widget-title" name="sort" onchange="this.form.submit()">
                                <option value="popular" {{ request('sort') === 'popular' ? 'selected' : '' }}>Sort by Popularity</option>
                                <option value="newest" {{ request('sort') === 'newest' ? 'selected' : '' }}>Sort by Newest</option>
                                <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>Price: low to high</option>
                                <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>Price: high to low</option>
                            </select>
                            <select class="custom-select widget-title" name="per_page" onchange="this.form.submit()">
                                <option value="9" {{ request('per_page', 9) == 9 ? 'selected' : '' }}>Show: 9</option>
                                <option value="12" {{ request('per_page') == 12 ? 'selected' : '' }}>12</option>
                                <option value="18" {{ request('per_page') == 18 ? 'selected' : '' }}>18</option>
                                <option value="24" {{ request('per_page') == 24 ? 'selected' : '' }}>24</option>
                            </select>
                            @if(request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif
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
                    <div class="shop-widget catagory mb-50">
                        <h4 class="widget-title">Categories</h4>
                        <div class="widget-desc">
                            <!-- All Categories -->
                            <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                <input type="checkbox" class="custom-control-input" id="customCheckAll" 
                                    onchange="window.location.href='{{ route('shop') }}'" 
                                    {{ !request('category') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="customCheckAll">
                                    All Products <span class="text-muted">({{ \App\Models\Product::count() }})</span>
                                </label>
                            </div>
                            <!-- Dynamic Categories -->
                            @foreach($categories as $category)
                            <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                <input type="checkbox" class="custom-control-input" id="customCheck{{ $category->id }}"
                                    onchange="window.location.href='{{ route('shop') }}?category={{ $category->slug }}'"
                                    {{ request('category') === $category->slug ? 'checked' : '' }}>
                                <label class="custom-control-label" for="customCheck{{ $category->id }}">
                                    {{ $category->name }} <span class="text-muted">({{ $category->products->count() }})</span>
                                </label>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>

                    <!-- Best Sellers Widget -->
                    <div class="shop-widget best-seller mb-50">
                        <h4 class="widget-title">Best Sellers</h4>
                        <div class="widget-desc">
                            @foreach(\App\Models\Product::inRandomOrder()->limit(3)->get() as $product)
                            <!-- Single Best Seller Product -->
                            <div class="single-best-seller-product d-flex align-items-center">
                                <div class="product-thumbnail">
                                    <a href="{{ route('shop-details', $product) }}">
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="{{ route('shop-details', $product) }}">{{ $product->name }}</a>
                                    <p>${{ number_format($product->price, 2) }}</p>
                                    <div class="ratings">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- All Products Area -->
            <div class="col-12 col-md-8 col-lg-9">
                <div class="shop-products-area">
                    <div class="row">
                        @foreach($products as $product)
                        <!-- Single Product Area -->
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="single-product-area mb-50">
                                <!-- Product Image -->
                                <div class="product-img">
                                    <a href="{{ route('shop-details', $product) }}">
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                                    </a>
                                    @if($product->is_hot)
                                    <!-- Product Tag -->
                                    <div class="product-tag">
                                        <a href="#">Hot</a>
                                    </div>
                                    @endif
                                    @if($product->is_on_sale)
                                    <!-- Sale Tag -->
                                    <div class="product-tag sale-tag">
                                        <a href="#">Sale</a>
                                    </div>
                                    @endif
                                    <div class="product-meta d-flex">
                                   
                                    </div>
                                </div>
                                <!-- Product Info -->
                                <div class="product-info mt-15 text-center">
                                    <a href="{{ route('shop-details', $product) }}">
                                        <p>{{ $product->name }}</p>
                                    </a>
                                    <h6>
                                        ${{ number_format($product->price, 2) }}
                                        @if($product->is_on_sale && $product->original_price)
                                            <span class="original-price">${{ number_format($product->original_price, 2) }}</span>
                                        @endif
                                    </h6>
                                    
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <nav aria-label="Page navigation">
                        {{ $products->links('vendor.pagination.custom') }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Area End -->


<style>
    .product-img {
    width: 100%;
    height: 300px;
    overflow: hidden; 
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f9f9f9;
}

.product-img img {
    width: 100%;
    height: 100%;
    object-fit: cover; 
    object-position: center;
    transition: all 0.3s ease-in-out;
}
</style>
@endsection