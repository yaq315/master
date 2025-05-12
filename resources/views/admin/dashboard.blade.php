@extends('layouts.maindash')


@section('content1')


  <!-- Navbar -->
 
  <!-- End Navbar -->
  <div class="container-fluid py-4">
 
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-4">
        
        <!-- Total Messages -->
        <div class="col d-flex align-items-stretch">
          <div class="card w-100 h-100">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Messages</p>
                    <h5 class="font-weight-bolder">
                      {{ $contactsCount }}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-email-83 text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    
        <!-- Unread Messages -->
        <div class="col d-flex align-items-stretch">
          <div class="card w-100 h-100">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Unread Messages</p>
                    <h5 class="font-weight-bolder">
                      {{ $unreadContactsCount }}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-notification-70 text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    
        <!-- Total Users -->
        <div class="col d-flex align-items-stretch">
          <div class="card w-100 h-100">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Users</p>
                    <h5 class="font-weight-bolder">
                      {{ $usersCount }}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    
        <!-- Total Products -->
        <div class="col d-flex align-items-stretch">
          <div class="card w-100 h-100">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Products</p>
                    <h5 class="font-weight-bolder">
                      {{ $productsCount }}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="ni ni-shop text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    
      </div>
    </div>
    
  
    <div class="row mt-4">


  <div class="col-lg-7 mb-lg-0 mb-4">
    <div class="card z-index-2 h-100">
        <div class="card-header pb-0 pt-3 bg-transparent">
            <h6 class="text-capitalize">Sales overview</h6>
            <p class="text-sm mb-0">
                <i class="fa fa-arrow-up text-success"></i>
                <span class="font-weight-bold">Live Data</span> from {{ now()->year }}
            </p>
        </div>
        <div class="card-body p-3">
            <div class="chart">
                <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
            </div>
        </div>
    </div>
</div>



<div class="col-lg-5">
  <div class="card card-carousel overflow-hidden h-100 p-0">
    <div id="leafyLandCarousel" class="carousel slide h-100" data-bs-ride="carousel">
      <div class="carousel-inner border-radius-lg h-100">
        
        <!-- Slide 1 -->
        <div class="carousel-item h-100 active" style="background-image:url('{{asset('img/bg-img/55.avif')}}'); background-size: cover;">
          <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
            <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
              <i class="fas fa-seedling text-success opacity-10"></i>
            </div>
            <h5 class="text-white mb-1">Plants</h5>
            <p>Discover our collection of air-purifying  plants that add beauty to your space.</p>
         
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item h-100" style="background-image:url('{{asset('img/bg-img/50.jpg')}}'); background-size: cover;">
          <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
            <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
              <i class="fas fa-tools text-success opacity-10"></i>
            </div>
            <h5 class="text-white mb-1">High-Quality Gardening Tools</h5>
            <p>Everything you need to care for your plants in one place.</p>
           
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item h-100" style="background-image: url('{{asset('img/bg-img/51.jpg')}}'); background-size: cover;">
          <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
            <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
              <i class="fas fa-spa text-success opacity-10"></i>
            </div>
            <h5 class="text-white mb-1">Organic Soil & Fertilizer</h5>
            <p>Special soil blends that provide the best environment for plant growth.</p>
           
          </div>
        </div>

      </div>

      <!-- Carousel Controls -->
      <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#leafyLandCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#leafyLandCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</div>



    
<div class="row mt-4">
    <div class="col-12">
        <div class="card shadow-sm mb-4 border-0">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h6 class="mb-0 text-dark">Recent Messages</h6>
                <span class="badge bg-gradient-primary text-white px-3 py-2 rounded-pill">
                    Total: {{ $contactsCount }} <small>(Unread: {{ $unreadContactsCount }})</small>
                </span>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-uppercase text-secondary text-xs font-weight-bold">ID</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bold ps-2">Name</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bold">Email</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bold">Subject</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bold text-center">Status</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bold text-center">Date</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bold text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentContacts as $contact)
                                <tr class="{{ $contact->read_at ? '' : 'bg-light' }} hover-effect">
                                    <td class="ps-4">
                                        <p class="text-sm font-weight-bold mb-0">{{ $contact->id }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $contact->name }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm mb-0">{{ $contact->email }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm mb-0">{{ Str::limit($contact->subject, 30) }}</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-{{ $contact->read_at ? 'success' : 'warning' }} text-white">
                                            {{ $contact->read_at ? 'Read' : 'Unread' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-sm">
                                            {{ $contact->created_at->format('Y-m-d H:i') }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('admin.contacts.show', $contact->id) }}" 
                                               class="btn btn-sm btn-outline-info">
                                                <i class="fas fa-eye me-1"></i> View
                                            </a>
                                            <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-outline-danger delete-btn">
                                                    <i class="fas fa-trash me-1"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">
                                        No messages found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
</div>





<div class="row mt-4">
    <div class="col-12">
        <div class="card mb-4 shadow-lg rounded-3 border-0">
            <div class="card-header bg-white border-bottom-0 py-3 d-flex justify-content-between align-items-center">
                <h6 class="mb-0 text-dark">Latest Registered Users</h6>
                <span class="badge bg-gradient-primary">
                    Total: {{ $users->count() }}
                </span>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-hover mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-uppercase text-secondary text-xs font-weight-bold">User</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bold ps-2">Role</th>
                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bold">Status</th>
                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bold">Registered At</th>
                                <th class="text-center text-secondary text-xs font-weight-bold">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr class="hover-effect">
                                <td>
                                    <div class="d-flex px-2 py-1 align-items-center">
                                        <div class="me-3">
                                            <div class="avatar avatar-sm bg-gradient-secondary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                                {{ strtoupper(substr($user->name, 0, 1)) }}
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <span class="fw-bold text-sm">{{ $user->name }}</span>
                                            <span class="text-xs text-muted">{{ $user->email }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-gradient-{{ $user->role == 'admin' ? 'info' : 'primary' }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-gradient-success text-white">Active</span>
                                </td>
                                <td class="text-center">
                                    <span class="text-secondary text-xs">{{ $user->created_at->format('M d, Y') }}</span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-outline-secondary px-2" title="Edit User">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-center mt-3">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-dark btn-sm">
                        View All Users <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>






    <div class="row mt-4">
  <div class="col-lg-7 mb-lg-0 mb-4">
    <div class="card shadow-sm">
        <div class="card-header pb-0 p-3" style="background: linear-gradient(to right, #388e3c, #66bb6a);">
            <div class="d-flex justify-content-between">
                <h6 class="text-white mb-2">Recent Reviews</h6>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table align-items-center table-striped table-bordered">
                <thead class="text-center text-light">
                    <tr>
                        <th>User</th>
                        <th>Product</th>
                        <th>Rating</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentReviews as $review)
                    <tr>
                        <td class="w-30">
                            <div class="d-flex px-2 py-1 align-items-center">
                                <div>
                                    @if($review->user->profile_photo_path)
                                        <img src="{{ asset('storage/'.$review->user->profile_photo_path) }}" 
                                             class="avatar avatar-sm me-3" 
                                             alt="User Avatar">
                                    @else
                                        <div class="avatar avatar-sm bg-gradient-dark rounded-circle me-3">
                                            {{ substr($review->user->name, 0, 1) }}
                                        </div>
                                    @endif
                                </div>
                                <div class="ms-4">
                                    <p class="text-xs font-weight-bold mb-0">User:</p>
                                    <h6 class="text-sm mb-0">{{ $review->user->name }}</h6>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <p class="text-xs font-weight-bold mb-0">Product:</p>
                            <h6 class="text-sm mb-0">{{ $review->product->name }}</h6>
                        </td>
                        <td class="text-center">
                            <p class="text-xs font-weight-bold mb-0">Rating:</p>
                            <div class="rating">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star{{ $i <= $review->rating ? ' text-warning' : ' text-secondary' }}"></i>
                                @endfor
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

  <div class="col-lg-5">
    <div class="card shadow-sm">
        <div class="card-header pb-0 p-3" style="background: linear-gradient(to right, #388e3c, #66bb6a);">
            <h6 class="text-white mb-0">Categories</h6>
        </div>
        <div class="card-body p-3">
            <ul class="list-group">
                @foreach($categories as $category)
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg shadow-sm">
                    <div class="d-flex align-items-center">
                        <div class="icon icon-shape icon-sm me-3  shadow text-center">
                            @if($category->image)
                                <img src="{{ asset('storage/' . $category->image) }}" 
                                     alt="{{ $category->name }}"
                                     style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%; border: 2px solid white;">
                            @else
                                <i class="ni ni-box-2 text-white opacity-10"></i>
                            @endif
                        </div>
                        <div class="d-flex flex-column">
                            <h6 class="mb-1 text-dark text-sm">{{ $category->name }}</h6>
                            <span class="text-xs">
                                {{ $category->products_count }} products,
                                @if($category->is_active)
                                    <span class="text-success">Active</span>
                                @else
                                    <span class="text-danger">Inactive</span>
                                @endif
                            </span>
                        </div>
                    </div>
                    {{-- <div class="d-flex">
                        <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto">
                            <i class="ni ni-bold-right" aria-hidden="true"></i>
                        </button>
                    </div> --}}
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

    </div>
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

@endsection

@section('content2')

<div class="fixed-plugin">
  <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
    <i class="fa fa-cog py-2"> </i>
  </a>
  <div class="card shadow-lg">
    <div class="card-header pb-0 pt-3 ">
      <div class="float-start">
        <h5 class="mt-3 mb-0">Argon Configurator</h5>
        <p>See our dashboard options.</p>
      </div>
      <div class="float-end mt-4">
        <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
          <i class="fa fa-close"></i>
        </button>
      </div>
      <!-- End Toggle Button -->
    </div>
    <hr class="horizontal dark my-1">
    <div class="card-body pt-sm-3 pt-0 overflow-auto">
      <!-- Sidebar Backgrounds -->
      <div>
        <h6 class="mb-0">Sidebar Colors</h6>
      </div>
      <a href="javascript:void(0)" class="switch-trigger background-color">
        <div class="badge-colors my-2 text-start">
          <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
          <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
          <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
          <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
          <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
          <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
        </div>
      </a>
      <!-- Sidenav Type -->
      <div class="mt-3">
        <h6 class="mb-0">Sidenav Type</h6>
        <p class="text-sm">Choose between 2 different sidenav types.</p>
      </div>
      <div class="d-flex">
        <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default" onclick="sidebarType(this)">Dark</button>
      </div>
      <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
      <!-- Navbar Fixed -->
      <div class="d-flex my-3">
        <h6 class="mb-0">Navbar Fixed</h6>
        <div class="form-check form-switch ps-0 ms-auto my-auto">
          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
        </div>
      </div>
      <hr class="horizontal dark my-sm-4">
      <div class="mt-2 mb-5 d-flex">
        <h6 class="mb-0">Light / Dark</h6>
        <div class="form-check form-switch ps-0 ms-auto my-auto">
          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
        </div>
      </div>
      <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/argon-dashboard">Free Download</a>
      <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard">View documentation</a>
      <div class="w-100 text-center">
        <a class="github-button" href="https://github.com/creativetimofficial/argon-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/argon-dashboard on GitHub">Star</a>
        <h6 class="mt-3">Thank you for sharing!</h6>
        <a href="https://twitter.com/intent/tweet?text=Check%20Argon%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fargon-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
          <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
        </a>
        <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/argon-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
          <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
        </a>
      </div>
    </div>
  </div>
</div>
<style>
    .hover-effect:hover {
        background-color: #f4f6f9;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .btn-outline-secondary {
        color: #6c757d;
        border-color: #6c757d;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-outline-secondary:hover {
        background-color: #6c757d;
        color: white;
    }

    .hover-effect:hover {
        background-color: #f4f6f9;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .btn-outline-info {
        color: #17a2b8;
        border-color: #17a2b8;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-outline-info:hover {
        background-color: #17a2b8;
        color: white;
    }

    .btn-outline-danger {
        color: #dc3545;
        border-color: #dc3545;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-outline-danger:hover {
        background-color: #dc3545;
        color: white;
    }

    .badge {
        font-size: 0.75rem;
        padding: 0.35rem 0.75rem;
    }
</style>
@endsection