<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Panel | LeafyLand</title>
  <link rel="icon" type="image/png" href="{{asset('img/core-img/favicon.ico')}}">
  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- SweetAlert2 -->



<!-- Font Awesome -->
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> --}}
  
  <!-- Custom CSS for LeafyLand -->
  <style>
   :root {
        --leafy-primary: #2E7D32;
        --leafy-secondary: #4CAF50;
        --leafy-light: #8BC34A;
        --leafy-dark: #1B5E20;
    }
    
    /* السايد بار المحسن */
    .sidenav {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
        z-index: 1038;
        background: linear-gradient(180deg, #ffffff 0%, #f8f9fa 100%);
        border: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .sidenav-header {
        padding: 1.5rem 1rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .navbar-brand {
        padding: 0;
    }
    
    .leafy-logo {
        font-weight: 700;
        color: var(--leafy-dark);
        font-size: 1.25rem;
        line-height: 1.2;
    }
    
    .leafy-subtitle {
        font-size: 0.75rem;
        color: var(--leafy-secondary);
        opacity: 0.8;
        line-height: 1;
    }
    
    /* عناصر القائمة */
    .nav-link {
        border-radius: 0.375rem;
        margin: 0.25rem 0.5rem;
        padding: 0.75rem 1rem;
        color: #495057;
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        position: relative;
    }
    
    .nav-link:hover {
        background-color: rgba(76, 175, 80, 0.1);
        color: var(--leafy-dark);
        transform: translateX(5px);
    }
    
    .nav-link.active {
        background: linear-gradient(310deg, var(--leafy-primary), var(--leafy-secondary));
        color: white !important;
        box-shadow: 0 4px 6px rgba(76, 175, 80, 0.3);
    }
    
    .nav-link.active .icon {
        background: rgba(255, 255, 255, 0.2) !important;
    }
    
    .nav-link-text {
        font-weight: 500;
    }
    
    /* الأيقونات */
    .icon {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 0.375rem;
        background: rgba(76, 175, 80, 0.1);
        transition: all 0.3s ease;
    }
    
    /* القسم الفاصل */
    .nav-item h6 {
        letter-spacing: 0.05em;
        font-size: 0.65rem;
        color: var(--leafy-dark);
        padding-top: 1rem;
        padding-bottom: 0.5rem;
    }
    
    /* شريط التمرير */
    #sidenav-collapse-main {
        scrollbar-width: thin;
        scrollbar-color: var(--leafy-light) rgba(0, 0, 0, 0.05);
    }
    
    #sidenav-collapse-main::-webkit-scrollbar {
        width: 5px;
    }
    
    #sidenav-collapse-main::-webkit-scrollbar-track {
        background: rgba(0, 0, 0, 0.05);
    }
    
    #sidenav-collapse-main::-webkit-scrollbar-thumb {
        background-color: var(--leafy-light);
        border-radius: 10px;
    }
    
    /* تأثيرات إضافية */
    .nav-item:last-child {
        margin-bottom: 1rem;
    }
    
    .badge-notification {
        position: absolute;
        top: 5px;
        right: 5px;
        font-size: 0.6rem;
        padding: 0.25em 0.4em;
    }

/* Pagination Hover Green */
.pagination .page-link:hover {
    background-color: #198754 !important; /* Bootstrap success green */
    color: #fff !important;
}

/* Active Pagination Green */
.pagination .page-item.active .page-link {
    background-color: #198754 !important;
    border-color: #198754 !important;
    color: #fff !important;
}

/* Edit Button Yellow */
.btn-outline-primary.edit-btn {
    border-color: #ffc107;
    color: #ffc107;
}

.btn-outline-primary.edit-btn:hover {
    background-color: #ffc107;
    color: #fff;
    border-color: #ffc107;
}


  </style>
</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="min-height-300 bg-success position-absolute w-100"></div>
  
  <!-- Sidebar -->
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main" style="height: calc(100vh - 2rem);">
     <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" 
           aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('img/core-img/favicon.ico') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold" style="color: #2E7D32;">leafyland</span>
        </a>
    </div>

    <hr class="horizontal dark mt-0 mb-2">

    <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main" style="overflow-y: auto;">
        <ul class="navbar-nav">
            <!-- Dashboard -->
                  <li class="nav-item">
                 <a class="nav-link {{ request()->routeIs('admin.dashboard.*') ? 'active' : '' }}" 
   href="{{ route('admin.dashboard') }}">
    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
         style="background: {{ request()->routeIs('admin.dashboard.*') ? '#2E7D32' : '#E8F5E9' }};">
        <i class="fas fa-tachometer-alt text-{{ request()->routeIs('admin.dashboard.*') ? 'white' : 'success' }} text-sm opacity-10"></i>
    </div>
    <span class="nav-link-text ms-1 fw-bold">Dashboard</span>
  
</a>

            <!-- Products -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/products*') ? 'active' : '' }}" href="{{ route('admin.products.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-seedling text-{{ request()->is('admin/products*') ? 'white' : 'success' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1">Products</span>
                </a>
            </li>

            <!-- Categories -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/categories*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-tags text-{{ request()->is('admin/categories*') ? 'white' : 'success' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1">Categories</span>
                </a>
            </li>

            <!-- Orders -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/orders*') ? 'active' : '' }}" href="{{ route('admin.orders.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-shopping-basket text-{{ request()->is('admin/orders*') ? 'white' : 'success' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1">Orders</span>
                </a>
            </li>

            <!-- Customers -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-users text-{{ request()->is('admin/users*') ? 'white' : 'success' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1">users</span>
                </a>
            </li>

            <!-- Messages -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/contacts*') ? 'active' : '' }}" href="{{ route('admin.contacts.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-envelope text-{{ request()->is('admin/contacts*') ? 'white' : 'success' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1">Messages</span>
                    @if($unreadCount = \App\Models\Contact::whereNull('read_at')->count())
                        <span class="badge bg-danger badge-sm ms-auto">{{ $unreadCount }}</span>
                    @endif
                </a>
            </li>

            <!-- Divider -->
         

            <!-- Profile -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.profile') ? 'active' : '' }}" 
                   href="{{ route('admin.profile') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-user text-{{ request()->routeIs('admin.profile') ? 'white' : 'success' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1">My Profile</span>
                </a>
            </li>

            <!-- Logout -->
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); this.closest('form').submit();">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-sign-out-alt text-success"></i>
                        </div>
                        <span class="nav-link-text ms-1">Logout</span>
                    </a>
                </form>
            </li>
        </ul>
    </div>
</aside>
  

  <main class="main-content position-relative border-radius-lg">
    <!-- Navbar -->
    {{-- <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Admin</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">@yield('title')</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">@yield('title')</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        
          <ul class="navbar-nav justify-content-end">
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="d-flex align-items-center">
                      @if(auth()->check())
                          @if(auth()->user()->profile_photo_path)
                              <img src="{{ asset('storage/' . auth()->user()->profile_photo_path) }}" 
                                   class="avatar avatar-sm rounded-circle me-2"
                                   alt="Profile Photo">
                          @else
                              <div class="avatar avatar-sm bg-gradient-primary rounded-circle me-2 d-flex align-items-center justify-content-center">
                                  <span class="text-white text-xs">{{ substr(auth()->user()->name, 0, 1) }}</span>
                              </div>
                          @endif
                          <span class="d-sm-inline d-none text-white">
                              {{ auth()->user()->email }}
                          </span>
                      @endif
                  </div>
              </a>
              <ul class="dropdown-menu dropdown-menu-end px-2 py-3" aria-labelledby="profileDropdown">
                  <li>
                      <a class="dropdown-item border-radius-md" href="{{ route('admin.profile') }}">
                          <i class="fa fa-user me-2"></i> My Profile
                      </a>
                  </li>
                  <li>
                      <hr class="dropdown-divider">
                  </li>
                  <li>
                      <form method="POST" action="{{ route('logout') }}">
                          @csrf
                          <a class="dropdown-item border-radius-md text-danger" href="{{ route('logout') }}" 
                             onclick="event.preventDefault(); this.closest('form').submit();">
                              <i class="fas fa-sign-out-alt me-2"></i> Logout
                          </a>
                      </form>
                  </li>
              </ul>
          </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav> --}}
    <!-- End Navbar -->
    
    <div class="container-fluid py-4">
      @yield('content')
      
       <footer class="footer pt-3">
  <div class="container-fluid">
    <div class="row align-items-center justify-content-between">
      <!-- Copyright Section -->
      <div class="col-lg-6 mb-lg-0 mb-4">
        <div class="copyright text-center text-sm text-muted text-lg-start">
          © <script>document.write(new Date().getFullYear())</script>,
          made with <i class="fa fa-heart text-danger"></i> by
          <a href="#" class="font-weight-bold text-dark" target="_blank">LeafyLand Team</a>
        </div>
      </div>
      <!-- Footer Navigation Links -->
      <div class="col-lg-6">
        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
          <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link text-muted" target="_blank">Home</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('about') }}" class="nav-link text-muted" target="_blank">About Us</a>
          </li>
          <li class="nav-item">
            <a href="{{route('shop')}}" class="nav-link text-muted" target="_blank">Shop</a>
          </li>
          <li class="nav-item">
            <a href="{{route('contact')}}" class="nav-link pe-0 text-muted" target="_blank">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
    </div>
  </main>

  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- Custom JS -->
  <script>
    // Delete confirmation
    document.addEventListener('DOMContentLoaded', function() {
      const deleteForms = document.querySelectorAll('.delete-form');
      
      deleteForms.forEach(form => {
        form.addEventListener('submit', function(e) {
          if (!confirm('Are you sure you want to delete this item?')) {
            e.preventDefault();
          }
        });
      });
      
      // Initialize sidenav
      var win = navigator.platform.indexOf('Win') > -1;
      if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
          damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
      }
    });
    
    // Active nav link
    const currentPath = window.location.pathname;
    document.querySelectorAll('.nav-link').forEach(link => {
      if (link.getAttribute('href') === currentPath) {
        link.classList.add('active');
      }
    });
  </script>
  
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(btn => {
            btn.addEventListener('click', function () {
                const form = btn.closest('form');
                const itemName = form.getAttribute('data-name');

                Swal.fire({
                    title: `Are you sure?`,
                    text: `You are about to delete "${itemName}"`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Done!',
                text: '{{ session("success") }}',
                timer: 2000,
                showConfirmButton: false
            });
        @endif
    });
</script>
<script>
    // تفعيل السايد بار
    document.addEventListener('DOMContentLoaded', function() {
        // توسيع/طي السايد بار
        const iconSidenav = document.getElementById('iconSidenav');
        const sidenav = document.getElementById('sidenav-main');
        
        if (iconSidenav && sidenav) {
            iconSidenav.addEventListener('click', function() {
                sidenav.classList.toggle('sidenav-toggled');
            });
        }
        
        // تفعيل التلميحات
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl, {
                trigger: 'hover'
            });
        });
        
        // تفعيل القوائم المنسدلة
        const dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
        dropdownElementList.map(function (dropdownToggleEl) {
            return new bootstrap.Dropdown(dropdownToggleEl);
        });
        
        // إغلاق التنبيهات تلقائياً
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                new bootstrap.Alert(alert).close();
            });
        }, 5000);
    });
    
    // تغيير لون الأيقونة عند التمرير
    window.addEventListener('scroll', function() {
        const sidenav = document.getElementById('sidenav-main');
        if (window.scrollY > 50) {
            sidenav.style.boxShadow = '0 0.5rem 1rem rgba(0, 0, 0, 0.1)';
        } else {
            sidenav.style.boxShadow = 'none';
        }
    });
</script>


</body>

</html>