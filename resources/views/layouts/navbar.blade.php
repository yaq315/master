<nav class="classy-navbar justify-content-between" id="alazeaNav">

    <!-- Nav Brand -->
    <a href="index.html" class="nav-brand"><img src="img/core-img/logo2.png" alt=""style="height:150px"></a>

    <!-- Navbar Toggler -->
    <div class="classy-navbar-toggler">
        <span class="navbarToggler"><span></span><span></span><span></span></span>
    </div>

    <!-- Menu -->
    <div class="classy-menu">

        <!-- Close Button -->
        <div class="classycloseIcon">
            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
        </div>

        <!-- Navbar Start -->
        <div class="classynav">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="#">Pages</a>
                    <ul class="dropdown">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>
                            <a href="{{ route('about') }}" > About
                            </a>
                        </li>
                        <li><a href="{{route('shop')}}">Shop</a>
                            <ul class="dropdown">
                                <li><a href="{{route('shop')}}">Shop</a></li>
                                {{-- <a href="{{ route('shop-details', ['product' => $product->slug]) }}">Shop Details</a> --}}

                                <li><a href="{{route('cart')}}">Cart</a></li>
                                <li><a href="{{route('checkout')}}">Checkout</a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('blog')}}">Blog</a>
                            <ul class="dropdown">
                                <li><a href="{{route('blog')}}">Blog</a></li>
                                <li><a href="{{route('blog-details')}}">Blog Details</a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('contact')}}">Contact</a></li>
                    </ul>
                </li>
                <li><a href="{{route('shop')}}">Shop</a></li>
                <li><a href="{{route('contact')}}">Contact</a></li>
            </ul>

            <!-- Search Icon -->
            <div id="searchIcon">
                <i class="fa fa-search" aria-hidden="true"></i>
            </div>

        </div>
        <!-- Navbar End -->
    </div>
</nav>