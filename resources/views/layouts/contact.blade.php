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
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{asset('img/bg-img/65.avif')}});">
            <h2>Contact US</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Info -->
    <div class="contact-area-info section-padding-0-100">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-md-6">
                    <div class="contact--thumbnail">
                        <img src="img/bg-img/25.jpg" alt="">
                    </div>
                </div>

                <div class="col-12 col-md-5">
                    <div class="section-heading">
                        <h2>CONTACT US</h2>
                        <p>We're here to help with all your plant needs and gardening questions.</p>
                    </div>
                    <div class="contact-information">
                        <p><span>Address:</span>123 Green Valley, Aqaba, Jordan</p>
                        <p><span>Phone:</span> +962 7 0000 0000</p>
                        <p><span>Email:</span> info@leafyland.com</p>
                        <p><span>Open hours:</span>sun - wed: 8 AM - 8 PM</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Form -->
    <section class="contact-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-lg-5">
                    <div class="section-heading">
                        <h2>GET IN TOUCH</h2>
                        <p>Send us a message, we will call back later</p>
                    </div>
                    
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    
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
                </div>
                
                <div class="col-12 col-lg-6">
                    <div class="map-area mb-100">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d110082.714768784!2d34.9621504!3d29.5319192!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x150070a26a7b0b9d%3A0x9e5e3b6e5a3e5b6e!2sAqaba%2C%20Jordan!5e0!3m2!1sen!2sjo!4v1698780000000!5m2!1sen!2sjo" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.footer')
    @include('layouts.bottom')
</body>
</html>