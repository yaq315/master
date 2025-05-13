@extends('layouts.contain_about')

@section('content')
<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{asset('img/bg-img/71.avif')}}); background-color: rgba(0,0,0,0.4); background-blend-mode: overlay;">
        <h2>Shop</h2>
    </div>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shop</li>
                    </ol>
                </nav>
            </div>
            <div class="col-12 col-md-6 mt-3 mt-md-0">
                <div class="search-box">
                    <div class="input-group">
                        <input type="text" id="productSearch" class="form-control" placeholder="Search plants..." 
                               aria-label="Search plants">
                        <button class="btn btn-outline-secondary clear-search" type="button" style="display:none;">
                            <i class="fa fa-times"></i>
                        </button>
                        <span class="input-group-text bg-success text-white search-icon">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
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
        @php
            $bestSellers = \App\Models\Product::whereHas('reviews')
                ->withAvg('reviews', 'rating')
                ->orderByDesc('reviews_avg_rating')
                ->take(3)
                ->get();
        @endphp

        @foreach($bestSellers as $product)
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
                    @php
                        $avgRating = round($product->reviews_avg_rating);
                        $reviewCount = $product->reviews()->count();
                    @endphp
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $avgRating)
                            <i class="fa fa-star text-warning"></i>
                        @else
                            <i class="fa fa-star text-secondary"></i>
                        @endif
                    @endfor
                    <small>({{ $reviewCount }})</small>
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
        <div class="row" id="productsContainer">
            @foreach($products as $product)
            <!-- Single Product Area -->
            <div class="col-12 col-sm-6 col-lg-4 product-item mb-4" data-name="{{ strtolower($product->name) }}" 
                 data-category="{{ strtolower($product->category->name) }}">
                 <div class="single-product-area">
                    <div class="product-img">
                        <a href="{{ route('shop-details', $product) }}">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        </a>
                        @if($product->is_hot)
                        <div class="product-tag">
                            <span>Hot</span>
                        </div>
                        @endif
                        @if($product->is_on_sale && $product->original_price)
                        <div class="product-tag sale-tag">
                            <span>Sale {{ round(100 - ($product->price / $product->original_price * 100)) }}%</span>
                        </div>
                        @endif
                    </div>
                    
                    <div class="product-info">
                        <a href="{{ route('shop-details', $product) }}" class="product-title">
                            {{ $product->name }}
                        </a>
                        <div class="product-category">
                            {{ $product->category->name }}
                        </div>
                        <div class="product-price">
                            <span class="current-price">{{ number_format($product->price, 2) }}JD</span>
                            @if($product->is_on_sale && $product->original_price)
                            <span class="original-price">{{ number_format($product->original_price, 2) }}JD</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <nav aria-label="Page navigation" id="productsPagination">
            {{ $products->links('vendor.pagination.custom') }}
        </nav>
        
        <!-- Empty State for Search -->
        <div id="noResults" class="col-12 text-center py-5" style="display: none;">
            <i class="fas fa-search fa-3x text-muted mb-3"></i>
            <h4 class="text-muted">No products found</h4>
            <p class="text-muted">Try different search terms</p>
        </div>
    </div>
</div>
        </div>
    </div>
</section>
<!-- Shop Area End -->


<style>
    /* تحسينات عامة */
    .shop-products-area {
        padding: 20px 0;
    }
    
    /* تحسين شريط البحث */
    .search-box {
        position: relative;
        margin-bottom: 20px;
    }
    
    .search-box .input-group {
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        border-radius: 25px;
        overflow: hidden;
    }
    
    #productSearch {
        border: none;
        padding: 12px 20px;
        background: #f8f9fa;
    }
    
    .search-box .input-group-text {
        background: #28a745;
        color: white;
        border: none;
        padding: 0 20px;
        cursor: pointer;
        transition: all 0.3s;
    }
    
    .search-box .input-group-text:hover {
        background: #218838 !important;
    }
    
    .clear-search {
        background: transparent;
        border: none;
        color: #6c757d;
        transition: all 0.3s;
    }
    
    .clear-search:hover {
        color: #dc3545;
    }
    
    /* تحسين بطاقات المنتجات */
    .product-item {
        margin-bottom: 30px;
        transition: all 0.3s ease;
    }
    
    .product-item:hover {
        transform: translateY(-5px);
    }
    
    .single-product-area {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .product-img {
        position: relative;
        overflow: hidden;
        height: 250px;
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%);
    }
    
    .product-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.5s ease;
    }
    
    .product-img:hover img {
        transform: scale(1.05);
    }
    
    .product-tag {
        position: absolute;
        top: 15px;
        left: 15px;
        background: #ff6b6b;
        color: white;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
        z-index: 2;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    
    .sale-tag {
        background: #4dabf7;
        left: auto;
        right: 15px;
    }
    
    .product-info {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }
    
    .product-title {
        color: #2c3e50;
        font-size: 1.1rem;
        margin-bottom: 10px;
        font-weight: 600;
        transition: color 0.3s;
        line-height: 1.4;
    }
    
    .product-title:hover {
        color: #3498db;
        text-decoration: none;
    }
    
    .product-price {
        margin-top: auto;
        padding-top: 10px;
    }
    
    .current-price {
        font-weight: bold;
        color: #27ae60;
        font-size: 1.2rem;
    }
    
    .original-price {
        font-size: 0.9rem;
        color: #95a5a6;
        text-decoration: line-through;
        margin-left: 8px;
    }
    
    .product-category {
        font-size: 0.85rem;
        color: #7f8c8d;
        margin-top: 5px;
    }
    
    /* رسالة عدم وجود نتائج */
    #noResults {
        text-align: center;
        padding: 50px 0;
    }
    
    #noResults i {
        font-size: 50px;
        color: #bdc3c7;
        margin-bottom: 20px;
    }
    
    #noResults h4 {
        color: #7f8c8d;
        margin-bottom: 10px;
    }
    
    /* التكيف مع الشاشات الصغيرة */
    @media (max-width: 768px) {
        .product-img {
            height: 200px;
        }
        
        .product-info {
            padding: 15px;
        }
        
        .product-title {
            font-size: 1rem;
        }
        
        .current-price {
            font-size: 1.1rem;
        }
    }
    
    @media (max-width: 576px) {
        .product-img {
            height: 180px;
        }
        
        .product-tag, .sale-tag {
            font-size: 10px;
            padding: 3px 8px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('productSearch');
        const clearBtn = document.querySelector('.clear-search');
        const productItems = document.querySelectorAll('.product-item');
        const productsPagination = document.getElementById('productsPagination');
        const noResults = document.getElementById('noResults');
        
        function performSearch() {
            const searchTerm = searchInput.value.trim().toLowerCase();
            clearBtn.style.display = searchTerm ? 'block' : 'none';
            
            if(searchTerm) {
                let hasMatches = false;
                
                productItems.forEach(item => {
                    const productName = item.dataset.name.toLowerCase();
                    const productCategory = item.dataset.category.toLowerCase();
                    
                    if(productName.includes(searchTerm) || productCategory.includes(searchTerm)) {
                        item.style.display = 'block';
                        hasMatches = true;
                    } else {
                        item.style.display = 'none';
                    }
                });
                
                noResults.style.display = hasMatches ? 'none' : 'block';
                if(productsPagination) productsPagination.style.display = 'none';
            } else {
                productItems.forEach(item => item.style.display = 'block');
                noResults.style.display = 'none';
                if(productsPagination) productsPagination.style.display = 'flex';
            }
        }
        
        searchInput.addEventListener('input', performSearch);
        clearBtn.addEventListener('click', function() {
            searchInput.value = '';
            performSearch();
        });
    });
    </script>