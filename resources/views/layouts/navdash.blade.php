<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
  <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
          {{-- <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
              <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
          </ol> --}}
          <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
      </nav>
      
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
              {{-- <div class="input-group">
                  <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" placeholder="Type here...">
              </div> --}}
          </div>
          
          <ul class="navbar-nav justify-content-end">
              <!-- إشعارات -->
              {{-- <li class="nav-item dropdown pe-2 d-flex align-items-center">
                  <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-bell cursor-pointer"></i>
                      <span class="position-absolute top-5 start-100 translate-middle badge rounded-pill bg-danger">3</span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                      <li class="mb-2">
                          <a class="dropdown-item border-radius-md" href="javascript:;">
                              <div class="d-flex py-1">
                                  <div class="my-auto">
                                      <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                                  </div>
                                  <div class="d-flex flex-column justify-content-center">
                                      <h6 class="text-sm font-weight-normal mb-1">
                                          <span class="font-weight-bold">New message</span> from Laur
                                      </h6>
                                      <p class="text-xs text-secondary mb-0">
                                          <i class="fa fa-clock me-1"></i>
                                          13 minutes ago
                                      </p>
                                  </div>
                              </div>
                          </a>
                      </li>
                      <!-- المزيد من عناصر الإشعارات -->
                  </ul>
              </li> --}}
              
              <!-- بروفايل المستخدم -->
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
              
              <!-- زر القائمة الجانبية للأجهزة الصغيرة -->
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
<style>
  .avatar {
      width: 32px;
      height: 32px;
      object-fit: cover;
  }
  .avatar-sm {
      width: 36px;
      height: 36px;
  }
  .dropdown-menu {
      min-width: 240px;
      display: block; /* مهم */
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
      pointer-events: none;
  }
  .dropdown-menu.show {
      opacity: 1;
      visibility: visible;
      pointer-events: auto;
  }
  .sidenav-toggler-line {
      display: block;
      height: 2px;
      width: 20px;
      margin: 4px 0;
      transition: all 0.3s ease;
  }
  </style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // تفعيل dropdowns من Bootstrap بشكل طبيعي
    const dropdownElements = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
    dropdownElements.map(function (dropdownToggleEl) {
        return new bootstrap.Dropdown(dropdownToggleEl);
    });
    
    // إضافة تأثيرات للقائمة الجانبية
    const sidenavToggler = document.getElementById('iconNavbarSidenav');
    if (sidenavToggler) {
        sidenavToggler.addEventListener('click', function() {
            document.body.classList.toggle('g-sidenav-pinned');
        });
    }
});
</script>
  