{{-- <!DOCTYPE html>
<html lang="en"> --}}
{{-- 
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>LeafyLand - Online Plant Nursery</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head> --}}


{{-- <body> --}}
    <!-- Preloader -->
    {{-- <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="img/core-img/leaf.png" alt="">
        </div>
    </div> --}}

    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->

    @extends('layouts.contain_about')

    @section('content')

    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/70.avif);">
            <h2>ABOUT US</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### About Area Start ##### -->
    <section class="about-us-area">
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
                                    <h5>Expert Advice</h5>
                                    <p>Our team is always ready to help you with gardening tips and advice.</p>
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

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="border-line"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Area End ##### -->

    <!-- ##### Service Area Start ##### -->
    <section class="our-services-area bg-gray section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>OUR SERVICES</h2>
                        <p>We provide the perfect service for you.</p>
                    </div>
                </div>
            </div>

            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-lg-5">
                    <div class="alazea-service-area mb-100">

                        <!-- Single Service Area -->
                        <div class="single-service-area d-flex align-items-center">
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
                        <div class="single-service-area d-flex align-items-center">
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Service Area End ##### -->

    <!-- ##### Testimonial Area Start ##### -->
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
    <!-- ##### Testimonial Area End ##### -->

    <!-- ##### Cool Facts Area Start ##### -->
    <section class="cool-facts-area bg-img section-padding-100-0" style="background-image: url(img/bg-img/cool-facts.png);">
        <div class="container">
            <div class="row">
    
                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="single-cool-fact d-flex align-items-center justify-content-center mb-100">
                        <div class="cf-icon">
                            <img src="img/core-img/cf1.png" alt="">
                        </div>
                        <div class="cf-content">
                            <h2><span class="counter">500</span>+</h2>
                            <h6>PLANT SPECIES</h6>
                        </div>
                    </div>
                </div>
    
                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="single-cool-fact d-flex align-items-center justify-content-center mb-100">
                        <div class="cf-icon">
                            <img src="img/core-img/cf2.png" alt="">
                        </div>
                        <div class="cf-content">
                            <h2><span class="counter">10</span>K+</h2>
                            <h6>HAPPY CUSTOMERS</h6>
                        </div>
                    </div>
                </div>
    
                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="single-cool-fact d-flex align-items-center justify-content-center mb-100">
                        <div class="cf-icon">
                            <img src="img/core-img/cf3.png" alt="">
                        </div>
                        <div class="cf-content">
                            <h2><span class="counter">100</span>+</h2>
                            <h6>GARDENING TOOLS</h6>
                        </div>
                    </div>
                </div>
    
                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="single-cool-fact d-flex align-items-center justify-content-center mb-100">
                        <div class="cf-icon">
                            <img src="img/core-img/cf4.png" alt="">
                        </div>
                        <div class="cf-content">
                            <h2><span class="counter">50</span>K+</h2>
                            <h6>PLANTS SOLD</h6>
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
    
        <!-- Side Image -->
        <div class="side-img wow fadeInUp" data-wow-delay="500ms">
            <img src="img/core-img/pot.png" alt="">
        </div>
    </section>
    <!-- ##### Cool Facts Area End ##### -->

    <!-- ##### Team Area Start ##### -->
<!-- ##### Team Area Start ##### -->
<section class="team-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Heading -->
                <div class="section-heading text-center">
                    <h2>OUR GREEN TEAM</h2>
                    <p>Meet the passionate team behind LeafyLand.</p>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- Single Team Member Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-team-member text-center mb-100">
                    <!-- Team Member Thumb -->
                    <div class="team-member-thumb">
                        <img src="img/bg-img/61.jpg" alt="Team Member 1"style="height:170px">
                        <!-- Social Info -->
                        <div class="team-member-social-info">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <!-- Team Member Info -->
                    <div class="team-member-info mt-30">
                        <h5>Ahmed </h5>
                        <p>Founder & CEO</p>
                    </div>
                </div>
            </div>

            <!-- Single Team Member Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-team-member text-center mb-100">
                    <!-- Team Member Thumb -->
                    <div class="team-member-thumb">
                        <img src="img/bg-img/60.jpg" alt="Team Member 2">
                        <!-- Social Info -->
                        <div class="team-member-social-info">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <!-- Team Member Info -->
                    <div class="team-member-info mt-30">
                        <h5>Lina</h5>
                        <p>Head Gardener</p>
                    </div>
                </div>
            </div>

            <!-- Single Team Member Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-team-member text-center mb-100">
                    <!-- Team Member Thumb -->
                    <div class="team-member-thumb">
                        <img src="img/bg-img/59.jpg" alt="Team Member 3">
                        <!-- Social Info -->
                        <div class="team-member-social-info">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <!-- Team Member Info -->
                    <div class="team-member-info mt-30">
                        <h5>Yousef </h5>
                        <p>Plant Care Specialist</p>
                    </div>
                </div>
            </div>

            <!-- Single Team Member Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-team-member text-center mb-100">
                    <!-- Team Member Thumb -->
                    <div class="team-member-thumb">
                        <img src="img/bg-img/62.jpg" alt="Team Member 4"style="height: 170px;">
                        <!-- Social Info -->
                        <div class="team-member-social-info">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <!-- Team Member Info -->
                    <div class="team-member-info mt-30">
                        <h5>Sara</h5>
                        <p>Marketing Manager</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ##### Team Area End ##### -->
    <!-- ##### Team Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
  
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Files ##### -->

