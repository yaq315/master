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

<!-- Font Awesome -->
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> --}}
  
  <!-- Custom CSS for LeafyLand -->
  <style>
    :root {
      --primary-color: #4CAF50;
      --dark-color: #2E7D32;
    }
    
    .bg-dark {
      background-color: var(--dark-color) !important;
    }
    
    .bg-gradient-dark {
      background-image: linear-gradient(310deg, var(--dark-color), #1e5631) !important;
    }
    
    .btn-primary, .bg-gradient-primary {
      background-image: linear-gradient(310deg, var(--primary-color), #3a8c40) !important;
    }
    
    .badge.bg-primary {
      background-color: var(--primary-color) !important;
    }
    
    .sidebar .nav .nav-item .nav-link.active {
      background-color: var(--primary-color);
      box-shadow: 0 0 0.5rem rgba(76, 175, 80, 0.5);
    }
    
    .leafy-logo {
      font-weight: 700;
      color: white;
      font-size: 1.25rem;
    }
    
    .leafy-subtitle {
      font-size: 0.8rem;
      opacity: 0.8;
    }
  </style>
</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="min-height-300 bg-success position-absolute w-100"></div>
  
  <!-- Sidebar -->
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 d-flex flex-column" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
         aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html" target="_blank">
        <img src="{{asset('img/core-img/favicon.ico')}}" width="50px" height="200px" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">leafyland</span>
      </a>
    </div>
  
    <hr class="horizontal dark mt-0">
  
    <!-- Sidebar content wrapper -->
    <div class="flex-grow-1 overflow-hidden">
      <div class="collapse navbar-collapse w-auto h-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fas fa-tachometer-alt text-dark text-sm"></i>
              </div>
              <span class="nav-link-text ms-1">Dashboard</span>
            </a>
          </li>
  
          <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/contacts*') ? 'active' : '' }}" href="{{ route('admin.contacts.index') }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fas fa-envelope-open-text text-dark text-sm"></i>
              </div>
              <span class="nav-link-text ms-1">Contact Management</span>
            </a>
          </li>
  
          <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fas fa-users text-dark text-sm"></i>
              </div>
              <span class="nav-link-text ms-1">Users</span>
            </a>
          </li>
  
          <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}" href="{{ route('admin.products.index') }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fas fa-users text-dark text-sm"></i>
              </div>
              <span class="nav-link-text ms-1">Products</span>
            </a>
          </li>


          
          <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fas fa-users text-dark text-sm"></i>
              </div>
              <span class="nav-link-text ms-1">Categories</span>
            </a>
          </li>
  
          <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Settings</h6>
          </li>
  
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.profile') ? 'active' : '' }}" 
               href="{{ route('admin.profile') }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-settings-gear-65 text-dark text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Profile Settings</span>
            </a>
          </li>
  
          @can('admin')
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}" 
               href="{{ route('admin.settings.index') }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-settings text-dark text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">System Settings</span>
            </a>
          </li>
          @endcan
  
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <a class="nav-link" href="{{ route('logout') }}"
                 onclick="event.preventDefault(); this.closest('form').submit();">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-user-run text-dark text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Logout</span>
              </a>
            </form>
          </li>
        </ul>
      </div>
    </div>
  
    <style>
      .sidenav {
        overflow: hidden !important;
        height: calc(100vh - 2rem);
      }
  
      .sidenav .navbar-nav {
        padding-bottom: 2rem;
      }
  
      .nav-link {
        transition: all 0.3s ease;
      }
  
      .nav-link:hover {
        background-color: rgba(76, 175, 80, 0.1);
        transform: translateX(2px);
      }
  
      .nav-link.active {
        background-color: #4CAF50;
        color: white;
        box-shadow: 0 0 0.5rem rgba(76, 175, 80, 0.3);
      }
  
      .icon i {
        font-size: 1rem;
      }
    </style>
  </aside>
  

  <main class="main-content position-relative border-radius-lg">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          {{-- <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Admin</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">@yield('title')</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">@yield('title')</h6> --}}
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
    </nav>
    <!-- End Navbar -->
    
    <div class="container-fluid py-4">
      @yield('content')
      
      <footer class="footer pt-3">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="#" class="font-weight-bold" target="_blank">LeafyLand Team</a>
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="#" class="nav-link text-muted" target="_blank">LeafyLand</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link pe-0 text-muted" target="_blank">License</a>
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
</body>

</html>