

@extends('layouts.contain-home')

@section("contant1")

<section class="hero-area">
    <div class="hero-post-slides owl-carousel">

        <!-- Single Hero Post -->
        <div class="single-hero-post bg-overlay">
            <!-- Post Image -->
            <div class="slide-img bg-img" style="background-image: url(img/bg-img/20.jpg);"></div>
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <!-- Post Content -->
                        <div class="hero-slides-content text-center">
                            <h2>Bring Nature to Your Home with LeafyLand</h2>
                            <p>Discover a wide range of ornamental plants and gardening tools to create your dream garden.</p>
                            <div class="welcome-btn-group">
                                <a href="{{route('shop')}}" class="btn alazea-btn mr-30">SHOP NOW</a>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single Hero Post -->
        <div class="single-hero-post bg-overlay">
            <!-- Post Image -->
            <div class="slide-img bg-img" style="background-image: url(img/bg-img/56.jpg);"></div>
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <!-- Post Content -->
                        <div class="hero-slides-content text-center">
                            <h2>Everything You Need for Your Garden</h2>
                            <p>From plants to tools, we provide everything to help you grow and maintain a beautiful garden.</p>
                            <div class="welcome-btn-group">
                                <a href="{{route('shop')}}" class="btn alazea-btn mr-30">EXPLORE PRODUCTS</a>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>





@section("contant2")


<section class="our-services-area bg-gray section-padding-100-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Heading -->
                <div class="section-heading text-center">
                    <h2>OUR SERVICES</h2>
                    <p>We provide the perfect service for your gardening needs.</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-between">
            <div class="col-12 col-lg-5">
                <div class="alazea-service-area mb-100">

                    <!-- Single Service Area -->
                    <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="100ms">
                        <!-- Icon -->
                        <div class="service-icon mr-30">
                            <img src="img/core-img/s1.png" alt="">
                        </div>
                        <!-- Content -->
                        <div class="service-content">
                            <h5>Plants Care</h5>
                            <p>We offer expert advice and products to help you care for your plants.</p>
                        </div>
                    </div>

                    <!-- Single Service Area -->
                    <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="300ms">
                        <!-- Icon -->
                        <div class="service-icon mr-30">
                            <img src="img/core-img/s2.png" alt="">
                        </div>
                        <!-- Content -->
                        <div class="service-content">
                            <h5>Gardening Tools</h5>
                            <p>High-quality tools to make gardening easier and more enjoyable.</p>
                        </div>
                    </div>        
                
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="alazea-video-area bg-overlay mb-100">
                    <img src="img/bg-img/51.jpg" alt="">
                       
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>






@section("contant3")

<section class="about-us-area section-padding-100-0">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-12 col-lg-5">
                <!-- Section Heading -->
                <div class="section-heading">
                    <h2>ABOUT US</h2>
                    <p>We are passionate about plants and gardening.</p>
                </div>
                <p>At LeafyLand, we believe that everyone deserves a green space to relax and enjoy. Our mission is to provide high-quality plants and tools to help you create your dream garden.</p>

                <!-- Progress Bar Content Area -->
                <div class="alazea-progress-bar mb-50">
                    <!-- Single Progress Bar -->
                    <div class="single_progress_bar">
                        <p>Plant Varieties</p>
                        <div id="bar1" class="barfiller">
                            <div class="tipWrap">
                                <span class="tip"></span>
                            </div>
                            <span class="fill" data-percentage="90"></span>
                        </div>
                    </div>

                    <!-- Single Progress Bar -->
                    <div class="single_progress_bar">
                        <p>Customer Satisfaction</p>
                        <div id="bar2" class="barfiller">
                            <div class="tipWrap">
                                <span class="tip"></span>
                            </div>
                            <span class="fill" data-percentage="95"></span>
                        </div>
                    </div>

                    <!-- Single Progress Bar -->
                    <div class="single_progress_bar">
                        <p>Quality Products</p>
                        <div id="bar3" class="barfiller">
                            <div class="tipWrap">
                                <span class="tip"></span>
                            </div>
                            <span class="fill" data-percentage="85"></span>
                        </div>
                    </div>

                    
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="alazea-benefits-area">
                    <div class="row">
                        <!-- Single Benefits Area -->
                        <div class="col-12 col-sm-6">
                            <div class="single-benefits-area">
                                <img src="img/core-img/b1.png" alt="">
                                <h5>Quality Products</h5>
                                <p>We offer only the best plants and tools to ensure your garden thrives.</p>
                            </div>
                        </div>

                        <!-- Single Benefits Area -->
                     <div class="col-12 col-sm-6">
    <div class="single-benefits-area">
        <img src="img/core-img/b2.png" alt="">
        <h5>Best Care Methods</h5>
        <p>We provide the best care and usage tips when purchasing your plants.</p>
    </div>
</div>


                        <!-- Single Benefits Area -->
                        <div class="col-12 col-sm-6">
                            <div class="single-benefits-area">
                                <img src="img/core-img/b3.png" alt="">
                                <h5>Eco-Friendly</h5>
                                <p>We are committed to sustainable and eco-friendly gardening practices.</p>
                            </div>
                        </div>

                        <!-- Single Benefits Area -->
                        <div class="col-12 col-sm-6">
                            <div class="single-benefits-area">
                                <img src="img/core-img/b4.png" alt="">
                                <h5>Fast Delivery</h5>
                                <p>Get your plants and tools delivered quickly and safely to your doorstep.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>



@section("contant4")

<section class="testimonial-area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="testimonials-slides owl-carousel">

                    <!-- Single Testimonial Slide -->
                    <div class="single-testimonial-slide">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-6">
                                <div class="testimonial-thumb">
                                    <img src="img/bg-img/58.webp" alt="">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="testimonial-content">
                                    <!-- Section Heading -->
                                    <div class="section-heading">
                                        <h2>TESTIMONIAL</h2>
                                        <p>What our customers say about us</p>
                                    </div>
                                    <p>“LeafyLand transformed my garden into a beautiful oasis. Their plants are healthy, and their tools are top-notch. Highly recommended!”</p>
                                    <div class="testimonial-author-info">
                                        <h6>ahmed</h6>
                                        <p>Happy Customer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Testimonial Slide -->
                    <div class="single-testimonial-slide">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-6">
                                <div class="testimonial-thumb">
                                    <img src="img/bg-img/57.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="testimonial-content">
                                    <!-- Section Heading -->
                                    <div class="section-heading">
                                        <h2>TESTIMONIAL</h2>
                                        <p>What our customers say about us</p>
                                    </div>
                                    <p>“I love the variety of plants available at LeafyLand. Their customer service is excellent, and my garden has never looked better!”</p>
                                    <div class="testimonial-author-info">
                                        <h6>samia</h6>
                                        <p>Happy Customer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@section("contant5");

<section class="new-arrivals-products-area bg-light section-padding-70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Heading -->
                <div class="section-heading text-center mb-5">
                   <h2 class="section-heading">Categories</h2>
                    <p class="text-muted">Browse our featured product categories</p>
                </div>
            </div>
        </div>

<div class="row" id="categoriesContainer">
    @foreach($categories->take(3) as $category)
    <!-- Single Category Card -->
    <div class="col-12 col-sm-6 col-lg-4 d-flex mb-4">
        <div class="single-product-area border rounded shadow-sm p-3 bg-white w-100 d-flex flex-column">
            <!-- Category Image -->
            <div class="product-img position-relative">
                <a href="{{ route('shop') }}?category={{ $category->slug }}">
                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="img-fluid rounded">
                </a>
                @if($category->is_featured)
                <div class="product-tag position-absolute top-0 start-0 bg-success text-white px-2 py-1 rounded-end">
                    <small>Featured</small>
                </div>
                @endif
            </div>

            <!-- Category Info -->
            <div class="product-info text-center mt-3 mt-auto">
                <a href="{{ route('shop') }}?category={{ $category->slug }}" class="product-title d-block h5 text-dark mb-1">
                    {{ $category->name }}
                </a>
                <div class="product-category text-muted mb-2">
                    {{ $category->products_count }} products available
                </div>
                <div>
                    <a href="{{ route('shop') }}?category={{ $category->slug }}" class="btn btn-success btn-sm">
                        Shop Now <i class="fa fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
    </div>
</section>

<section class="new-arrivals-products-area section-padding-80 bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2 class="section-heading">Featured Products</h2>
            </div>
        </div>

        <div class="row">
            @foreach($products->take(3) as $product)
            <div class="col-12 col-sm-6 col-lg-4 d-flex mb-4">
                <div class="single-product-area border rounded shadow-sm p-3 bg-white w-100 d-flex flex-column">
                    <!-- Product Image -->
                    <div class="product-img position-relative">
                        <a href="{{ route('shop-details', $product->slug) }}">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded">
                        </a>
                        @if($product->is_featured)
                        <div class="product-tag position-absolute top-0 start-0 bg-success text-white px-2 py-1 rounded-end">
                            <small>Featured</small>
                        </div>
                        @endif
                    </div>

                    <!-- Product Info -->
                    <div class="product-info text-center mt-3 mt-auto">
                        <a href="{{ route('shop-details', $product->slug) }}" class="product-title d-block h5 text-dark mb-1">
                            {{ $product->name }}
                        </a>
                        <div class="product-price text-success fw-bold mb-2">
                            {{ number_format($product->price, 2) }}JD
                        </div>
                        <a href="{{ route('shop-details', $product->slug) }}" class="btn btn-success btn-sm">
                            View Details <i class="fa fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-12 text-center mt-3">
                <a href="{{ route('shop') }}" class="btn alazea-btn">View All Products</a>
            </div>
        </div>
    </div>
</section>


@section("contant6");
<section class="contact-area section-padding-100-0">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-12 col-lg-5">
                <!-- Section Heading -->
            <div class="section-heading">
    <h2>GET IN TOUCH</h2>
    <p>Send us a message, we will call back later</p>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Contact Form Area -->
<div class="contact-form-area mb-100">
    <form action="{{ route('contact.store') }}" method="POST">
 

        @csrf
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" id="contact-name" placeholder="Your Name" required>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" id="contact-email" placeholder="Your Email" required>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <input type="text" name="subject" class="form-control" id="contact-subject" placeholder="Subject" required>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Message" required></textarea>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn alazea-btn mt-15">Send Message</button>
            </div>
        </div>
    </form>
</div>

                <!-- Contact Form Area -->
              
            </div>
            <div class="col-12 col-lg-6">
                <!-- Google Maps -->
                <div class="map-area mb-100">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d110082.714768784!2d34.9621504!3d29.5319192!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x150070a26a7b0b9d%3A0x9e5e3b6e5a3e5b6e!2sAqaba%2C%20Jordan!5e0!3m2!1sen!2sjo!4v1698780000000!5m2!1sen!2sjo" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>