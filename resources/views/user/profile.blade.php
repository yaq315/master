



    @extends('layouts.contain_profile')

@section('content')
    <!-- Hero Section with Blurred Background -->
    <div class="profile-hero">
        {{-- <div class="profile-hero-content">
            <div>
                <h1 class="display-5 fw-bold">My LeafyLand Profile</h1>
                <p class="lead">Your personal gardening journey</p>
            </div>
        </div> --}}
    </div>

    <!-- Profile Container -->
  <div class="row justify-content-center">
    <div class="col-lg-10">
        <!-- Profile Card -->
        <div class="card profile-card">
            <!-- Profile Header -->
            <div class="profile-header">
              @if(Auth::user()->profile_photo_path)
    <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" 
         alt="Profile Image" 
         class="profile-avatar">
@else
    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=1a5c36&color=fff&size=150" 
         alt="Default Avatar" 
         class="profile-avatar">
@endif

                <h2 class="profile-name">{{ Auth::user()->name }}</h2>
                <p class="profile-email">{{ Auth::user()->email }}</p>
            </div>

            <!-- Profile Body -->
            <div class="profile-body">
                <!-- Stats -->
                <div class="profile-section">
                    <div class="stats-container">
                           <div class="stat-item">
                            <div class="stat-number">{{ $orderCount }}</div>
                            <div class="stat-label">Orders</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">{{ $plantCount }}</div>
                            <div class="stat-label">Plants Owned</div>
                        </div>
                     
                        <div class="stat-item">
                            <div class="stat-number">{{ $activeCouponsCount }}</div>
                            <div class="stat-label">Active Coupons</div>
                        </div>
                    </div>
                </div>

                <!-- Tabs Navigation -->
                <ul class="nav nav-pills mb-4 justify-content-center" id="profileTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="coupons-tab" data-bs-toggle="pill" data-bs-target="#coupons" type="button" role="tab">My Coupons</button>
                    </li>
                    <li class="nav-item">
    <a class="nav-link" data-bs-toggle="tab" href="#orders" role="tab">My Orders</a>
</li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="plants-tab" data-bs-toggle="pill" data-bs-target="#plants" type="button" role="tab">My Plants</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="settings-tab" data-bs-toggle="pill" data-bs-target="#settings" type="button" role="tab">Settings</button>
                    </li>
                </ul>

                <!-- Tabs Content -->
                <div class="tab-content" id="profileTabsContent">
                    <!-- Coupons Tab -->
                    <div class="tab-pane fade show active" id="coupons" role="tabpanel">
                        <h3 class="section-title">My Active Coupons</h3>
                        
                        @if($activeCoupons->isEmpty())
                            <div class="alert alert-info">
                                You don't have any active coupons right now.
                            </div>
                        @else
                            <div class="row">
                                @foreach($activeCoupons as $coupon)
                                    <div class="col-md-6">
                                        <div class="coupon-card">
                                            <div class="coupon-code">{{ $coupon->code }}</div>
                                            <div class="coupon-desc">
                                                @if($coupon->type == 'fixed')
                                                    ${{ $coupon->value }} off
                                                @else
                                                    {{ $coupon->value }}% off
                                                @endif
                                                - {{ $coupon->description }}
                                            </div>
                                            <div class="text-muted small mt-2">
                                                Expires: {{ $coupon->valid_to->format('d/m/Y') }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        
                      
                    </div>
                    <div class="tab-pane fade" id="orders" role="tabpanel">
    <h3 class="section-title">My Orders</h3>

    @if($orders->count())
        <div class="table-responsive mt-3">
            <table class="table table-bordered text-sm">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Order Number</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Placed At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order->order_number }}</td>
                        <td>${{ number_format($order->total, 2) }}</td>
                        <td>
                            <span class="badge bg-{{ getStatusColor($order->status) }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td>{{ $order->created_at->format('d M Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-muted">You have no orders yet.</p>
    @endif
</div>


                    <!-- Plants Tab -->
                    <div class="tab-pane fade" id="plants" role="tabpanel">
                        <h3 class="section-title">My Plant Collection</h3>
                        
                        @if($purchasedPlants->isEmpty())
                            <div class="alert alert-info">
                                You haven't purchased any plants yet.
                            </div>
                        @else
                            <div class="row">
                                @foreach($purchasedPlants as $plant)
                                    <div class="col-md-4 mb-4">
                                        <div class="plant-card">
                                          <img src="{{ asset('storage/' . $plant->image) }}" alt="{{ $plant->name }}" class="plant-img">

                                            <div class="plant-body">
                                                <h5 class="plant-name">{{ $plant->name }}</h5>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="plant-price">${{ number_format($plant->price, 2) }}</span>
                                                    <span class="badge bg-success">Purchased</span>
                                                </div>
                                               {{-- <div class="mt-2 small text-muted">
    @if($plant->pivot && $plant->created_at)
        Ordered on: {{ $plant->created_at }}
    @else
        Order date not available
    @endif
</div> --}}

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        
                        <div class="text-center mt-4">
                            <a href="{{ route('shop') }}" class="btn btn-leafy">
                                <i class="fas fa-shopping-cart me-2"></i> Shop More Plants
                            </a>
                        </div>
                    </div>

                    <!-- Settings Tab -->
                    <div class="tab-pane fade" id="settings" role="tabpanel">
                        <h3 class="section-title">Account Settings</h3>
                        
                        <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="row mb-3">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="profile_photo" class="form-label">Profile Photo</label>
                                <input class="form-control" type="file" id="profile_photo" name="profile_photo">
                                @if(Auth::user()->profile_photo_path)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" width="100" class="rounded">
                                    </div>
                                @endif
                            </div>
                            
                            <div class="mb-3">
                                <label for="bio" class="form-label">About Me</label>
                                <textarea class="form-control" id="bio" name="bio" rows="3" placeholder="Tell us about your gardening journey...">{{ Auth::user()->bio }}</textarea>
                            </div>
                            
                            <div class="text-end">
                                <button type="button" class="btn btn-outline-secondary me-2">Cancel</button>
                                <button type="submit" class="btn btn-leafy">Save Changes</button>
                            </div>
                        </form>
                        
                        <div class="mt-5 pt-4 border-top">
                            <h5 class="section-title">Account Actions</h5>
                            <div class="d-flex flex-wrap gap-2">
                              <button type="button" class="btn btn-outline-danger" id="changePasswordBtn">
    <i class="fas fa-lock me-2"></i> Change Password
</button>

                                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger">
                                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    
