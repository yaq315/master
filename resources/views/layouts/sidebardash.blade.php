<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
    <!-- Header -->
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" 
           aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('img/core-img/favicon.ico') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold" style="color: #2E7D32;">leafyland</span>
        </a>
    </div>

    <hr class="horizontal dark mt-0">

    <!-- Menu Content -->
    <div class="sidenav-content d-flex flex-column flex-grow-1 overflow-hidden">
        <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav flex-column">
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


                <!-- Tables Section -->
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder" style="color: #2E7D32;">Data Management</h6>
                </li>
                
                <li class="nav-item">
                 <a class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}" 
   href="{{ route('admin.products.index') }}">
    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
         style="background: {{ request()->routeIs('admin.products.*') ? '#2E7D32' : '#E8F5E9' }};">
        <i class="ni ni-bullet-list-67 text-{{ request()->routeIs('admin.products.*') ? 'white' : 'success' }} text-sm opacity-10"></i>
    </div>
    <span class="nav-link-text ms-1 fw-bold">Tables</span>
  
</a>

                </li>

                <!-- Settings Section -->
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder" style="color: #2E7D32;">Settings</h6>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.profile') ? 'active' : '' }}" 
                       href="{{ route('admin.profile') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
                             style="background: {{ request()->routeIs('admin.profile') ? '#2E7D32' : '#E8F5E9' }};">
                            <i class="ni ni-settings-gear-65 text-{{ request()->routeIs('admin.profile') ? 'white' : 'success' }} text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Profile Settings</span>
                    </a>
                </li>

                @can('admin')
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}" 
                       href="{{ route('admin.settings.index') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
                             style="background: {{ request()->routeIs('admin.settings.*') ? '#2E7D32' : '#E8F5E9' }};">
                            <i class="ni ni-settings text-{{ request()->routeIs('admin.settings.*') ? 'white' : 'success' }} text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">System Settings</span>
                    </a>
                </li>
                @endcan

                <!-- Logout -->
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="nav-link" href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); this.closest('form').submit();">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
                                 style="background: #E8F5E9;">
                                <i class="ni ni-user-run text-success text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Logout</span>
                        </a>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Footer Stats -->
       <div class="sidenav-footer mx-3 mt-auto">
    <div class="card card-plain shadow-none bg-gray-100 border-radius-lg">
        <div class="card-body p-3">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="mb-0" style="color: #2E7D32;">Quick Stats</h6>
                <i class="ni ni-chart-bar-32 text-sm opacity-5" style="color: #2E7D32;"></i>
            </div>
            <div class="stats-item">
                <span class="text-sm">New Messages</span>
                <span class="badge bg-gradient-primary float-end">{{ $unreadCount ?? 0 }}</span>
            </div>
            <div class="stats-item mt-2">
                <span class="text-sm">Pending Orders</span>
                <span class="badge bg-gradient-warning float-end">{{ $pendingOrders ?? 0 }}</span>
            </div>
        </div>
    </div>
</div>

    </div>

    <!-- Custom Styles -->
    <style>
        .sidenav {
            display: flex;
            flex-direction: column;
            height: calc(100vh - 2rem);
            overflow: hidden !important;
            box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(46, 125, 50, 0.1);
        }

        .sidenav-header {
            padding: 1.5rem 1rem;
            border-bottom: 1px solid rgba(46, 125, 50, 0.1);
        }

        .sidenav-content {
            flex-grow: 1;
            overflow: hidden;
        }

        .sidenav-footer {
            margin-top: auto;
            padding-bottom: 1rem;
        }

        .nav-link {
            border-radius: 0.5rem;
            margin: 0.25rem 0.5rem;
            padding: 0.75rem 1rem;
            color: #4a4a4a;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background-color: rgba(46, 125, 50, 0.1);
            transform: translateX(3px);
        }

        .nav-link.active {
            background-color: #2E7D32;
            color: white !important;
            box-shadow: 0 0.125rem 0.25rem rgba(46, 125, 50, 0.3);
        }

        .nav-link-text {
            font-weight: 500;
        }

        .stats-item {
            font-size: 0.75rem;
            padding: 0.25rem 0;
            border-bottom: 1px solid rgba(46, 125, 50, 0.1);
        }

        .stats-item:last-child {
            border-bottom: none;
        }

        .bg-gray-100 {
            background-color: #f8f9fa !important;
        }

        .icon {
            width: 36px;
            height: 36px;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }
    </style>
</aside>