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
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    
                    <div class="contact-form-area mb-100">
                        <form action="{{ route('contact.store') }}" method="POST" id="contactForm">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" id="contact-name" 
                                               placeholder="Your Name" value="{{ old('name') }}" required
                                               minlength="3" maxlength="50">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" id="contact-email" 
                                               placeholder="Your Email" value="{{ old('email') }}" required>
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" name="subject" class="form-control" id="contact-subject" 
                                               placeholder="Subject" value="{{ old('subject') }}" required
                                               minlength="5" maxlength="100">
                                        @error('subject')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" id="message" 
                                                  cols="30" rows="10" placeholder="Message" 
                                                  required minlength="10" maxlength="500">{{ old('message') }}</textarea>
                                        @error('message')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn alazea-btn mt-15" id="submitBtn">
                                        <span id="submitText">Send Message</span>
                                        <div id="submitSpinner" class="spinner-border spinner-border-sm d-none" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </button>
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

    @section('scripts')
<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    const submitBtn = document.getElementById('submitBtn');
    const submitText = document.getElementById('submitText');
    const submitSpinner = document.getElementById('submitSpinner');
    
    submitText.textContent = 'Sending...';
    submitSpinner.classList.remove('d-none');
    submitBtn.disabled = true;
});

// إظهار رسائل التنبيه لمدة 5 ثواني
setTimeout(() => {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        alert.style.transition = 'opacity 1s';
        alert.style.opacity = '0';
        setTimeout(() => alert.remove(), 1000);
    });
}, 5000);
</script>
@endsection
</body>
</html>