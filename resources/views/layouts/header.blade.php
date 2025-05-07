<header class="header-area">

    <!-- ***** Top Header Area ***** -->
    <div class="top-header-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="top-header-content d-flex align-items-center justify-content-between">
                        <!-- Top Header Content -->
                        <div class="top-header-meta">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="info@leafyland.com">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i> 
                                <span>Email: info@leafyland.com</span>
                            </a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="+1 234 567 890">
                                <i class="fa fa-phone" aria-hidden="true"></i> 
                                <span>Call Us: +962 7 0000 0000</span>
                            </a>
                        </div>
                
                        <!-- Top Header Content -->
                        <div class="top-header-meta d-flex">
                            <!-- Language Dropdown -->
                            {{-- <div class="language-dropdown">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle mr-30" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i  aria-hidden="true"></i> Language
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#"><i class="fa fa-globe"></i> English</a>
                                        <a class="dropdown-item" href="#"><i class="fa fa-globe"></i> Arabic</a>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- Login -->
                            <div class="login">
                                @if(Auth::check())
                                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="login-link">
                                            <i class="fa fa-user" aria-hidden="true"></i> 
                                            <span>Logout</span>
                                        </button>
                                    </form>
                                @else
                                    <a href="{{ route('login') }}" class="login-link">
                                        <i class="fa fa-user" aria-hidden="true"></i> 
                                        <span>Login</span>
                                    </a>
                                @endif
                            </div>
                            
                            
                            
                            <!-- Cart -->
                         <!-- Cart -->
<div class="cart">
    <a href="{{ route('cart.view') }}">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i> 
        <span>Cart <span class="cart-quantity"> @include('components.cart-count')</span></span>
    </a>
</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Navbar Area ***** -->
    <div class="alazea-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
              @include('layouts.navbar')

                <!-- Search Form -->
                <div class="search-form">
                    <form action="#" method="get">
                        <input type="search" name="search" id="search" placeholder="Type keywords &amp; press enter...">
                        <button type="submit" class="d-none"></button>
                    </form>
                    <!-- Close Icon -->
                    <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    // JavaScript لتحديث عدد المنتجات في السلة عند إضافة منتج
    document.querySelector('.add-to-cart-form').addEventListener('submit', function(event) {
        event.preventDefault();
        
        let formData = new FormData(this);
        
        fetch("{{ route('cart.add') }}", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                updateCartQuantity(); // تحديث عدد المنتجات في السلة
            }
        });
    });
    
    function updateCartQuantity() {
        fetch("{{ route('cart.items') }}")
        .then(response => response.json())
        .then(data => {
            let totalQuantity = 0;
            data.forEach(item => {
                totalQuantity += item.quantity; // إجمالي الكمية في السلة
            });
            document.querySelector('.cart-quantity').textContent = totalQuantity;
        });
    }
    </script>
    