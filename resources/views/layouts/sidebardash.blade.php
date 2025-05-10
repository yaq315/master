<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
  <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" 
         aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="{{ route('admin.dashboard') }}">
          <img src="{{ asset('img/core-img/favicon.ico') }}" class="navbar-brand-img h-100" alt="main_logo">
          <span class="ms-1 font-weight-bold">leafyland</span>
      </a>
  </div>
  <hr class="horizontal dark mt-0">

  <!-- Sidebar content wrapper to control scroll -->
  <div class="sidenav-content d-flex flex-column flex-grow-1 overflow-hidden">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav flex-column">
            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" 
                   href="{{ route('admin.dashboard') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <!-- Tables Section -->
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Data Management</h6>
            </li>
            
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}" 
                   href="{{ route('admin.contacts.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-email-83 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">tables Management</span>
                </a>
            </li>

            <li class="nav-item">
                {{-- <a class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}" 
                   href="{{ route('admin.products.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-box-2 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Products</span>
                </a> --}}
            </li>

        <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}" 
       href="{{ route('admin.orders.index') }}">
        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-cart text-dark text-sm opacity-10"></i>
        </div>
        <span class="nav-link-text ms-1">Orders</span>
    </a>
</li>


            @can('admin')
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">User Management</h6>
            </li>
            
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" 
                   href="{{ route('admin.users.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Users</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.reviews.*') ? 'active' : '' }}" 
                   href="{{ route('admin.reviews.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-star text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Product Reviews</span>
                </a>
            </li>
            @endcan

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

    <!-- Footer -->
   <div class="sidenav-footer mx-3 mt-auto">
    <div class="card card-plain shadow-none bg-gray-100 border-radius-lg">
        <div class="card-body p-3">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="mb-0">Quick Stats</h6>
                <i class="ni ni-chart-bar-32 text-sm opacity-5"></i>
            </div>
            <div class="stats-item">
                <span class="text-sm">New Messages</span>
                <span class="badge bg-gradient-primary float-end">{{ $newMessagesCount ?? 0 }}</span>
            </div>
            <div class="stats-item mt-2">
                <span class="text-sm">Pending Orders</span>
                <span class="badge bg-gradient-warning float-end">{{ $pendingOrdersCount ?? 0 }}</span>
               
            </div>
        </div>
    </div>
</div>


  </div>

  <!-- Custom style to control scroll and height -->
  <style>
    .sidenav {
        display: flex;
        flex-direction: column;
        height: calc(100vh - 2rem);
        overflow: hidden !important;
    }

    .sidenav-content {
        flex-grow: 1;
        overflow: hidden;
    }

    .sidenav-footer {
        margin-top: auto;
        padding-bottom: 1rem;
    }

    .stats-item {
        font-size: 0.75rem;
        padding: 0.25rem 0;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .stats-item:last-child {
        border-bottom: none;
    }

    .nav-item .nav-link {
        transition: all 0.2s ease;
    }

    .nav-item .nav-link:hover {
        transform: translateX(3px);
    }

    .nav-item .nav-link.active {
        box-shadow: 0 4px 8px rgba(21, 115, 71, 0.1);
    }

    .bg-gray-100 {
        background-color: #f8f9fa;
    }
  </style>
</aside>
