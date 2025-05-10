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
          <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
            <div class="carousel-inner border-radius-lg h-100">
              <div class="carousel-item h-100 active" style="background-image: url('{{asset('img/bg-img/55.avif')}}');
    background-size: cover;">
                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                  <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                    <i class="ni ni-camera-compact text-dark opacity-10"></i>
                  </div>
                  <h5 class="text-white mb-1">Get started with Argon</h5>
                  <p>There’s nothing I really wanted to do in life that I wasn’t able to get good at.</p>
                </div>
              </div>
              <div class="carousel-item h-100" style="background-image: url('{{asset('img/bg-img/50.jpg')}}');
    background-size: cover;">
                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                  <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                    <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                  </div>
                  <h5 class="text-white mb-1">Faster way to create web pages</h5>
                  <p>That’s my skill. I’m not really specifically talented at anything except for the ability to learn.</p>
                </div>
              </div>
              <div class="carousel-item h-100" style="background-image: url('{{asset('img/bg-img/51.jpg')}}');
    background-size: cover;">
                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                  <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                    <i class="ni ni-trophy text-dark opacity-10"></i>
                  </div>
                  <h5 class="text-white mb-1">Share with us your design tips!</h5>
                  <p>Don’t be afraid to be wrong because you can’t learn anything from a compliment.</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>

    
    <div class="row mt-4">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
              <div class="d-flex justify-content-between align-items-center">
                  <h6>Recent Messages</h6>
                  <span class="badge badge-primary">
                      Total: {{ $contactsCount }} 
                      (Unread: {{ $unreadContactsCount }})
                  </span>
              </div>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                      <thead>
                          <tr>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Subject</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                          @forelse($recentContacts as $contact)
                          <tr class="{{ $contact->read_at ? '' : 'bg-gray-100' }}">
                              <td class="ps-4">
                                  <p class="text-xs font-weight-bold mb-0">{{ $contact->id }}</p>
                              </td>
                              <td>
                                  <p class="text-xs font-weight-bold mb-0">{{ $contact->name }}</p>
                              </td>
                              <td>
                                  <p class="text-xs font-weight-bold mb-0">{{ $contact->email }}</p>
                              </td>
                              <td>
                                  <p class="text-xs font-weight-bold mb-0">{{ Str::limit($contact->subject, 30) }}</p>
                              </td>
                              <td class="align-middle text-center text-sm">
                                  <span class="badge badge-sm bg-gradient-{{ $contact->read_at ? 'success' : 'warning' }}">
                                      {{ $contact->read_at ? 'Read' : 'Unread' }}
                                  </span>
                              </td>
                              <td class="align-middle text-center">
                                  <span class="text-secondary text-xs font-weight-bold">
                                      {{ $contact->created_at->format('Y-m-d H:i') }}
                                  </span>
                              </td>
                              <td class="align-middle">
                                  <div class="d-flex">
                                      <a href="{{ route('admin.contacts.show', $contact->id) }}" 
                                         class="btn btn-link text-info px-3 mb-0">
                                          <i class="fas fa-eye me-2"></i>View
                                      </a>
                                      <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-link text-danger px-3 mb-0"
                                                  onclick="return confirm('Are you sure?')">
                                              <i class="fas fa-trash me-2"></i>Delete
                                          </button>
                                      </form>
                                  </div>
                              </td>
                          </tr>
                          @empty
                          <tr>
                              <td colspan="7" class="text-center py-4">
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
        <div class="card mb-4 shadow-sm">
            <div class="card-header pb-0 bg-gradient-white">
                <h6 class="text-dark">Latest Registered Users</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Registered At</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            {{-- <img src="{{ asset('img/team-2.jpg') }}" class="avatar avatar-sm me-3" alt="user1"> --}}
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                            <p class="text-xs text-secondary mb-0">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-gradient-{{ $user->role == 'admin' ? 'info' : 'primary' }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="badge badge-sm bg-gradient-success">Active</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $user->created_at->format('M d, Y') }}</span>
                                </td>
                                <td class="align-middle">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" title="Edit User">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-center mt-3">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-outline-dark">
                        View All Users <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="row mt-4">
      <div class="col-lg-7 mb-lg-0 mb-4">
        <div class="card ">
          <div class="card-header pb-0 p-3">
            <div class="d-flex justify-content-between">
              <h6 class="mb-2">Sales by Country</h6>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center ">
              <tbody>
                <tr>
                  <td class="w-30">
                    <div class="d-flex px-2 py-1 align-items-center">
                      <div>
                        <img src="../assets/img/icons/flags/US.png" alt="Country flag">
                      </div>
                      <div class="ms-4">
                        <p class="text-xs font-weight-bold mb-0">Country:</p>
                        <h6 class="text-sm mb-0">United States</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="text-center">
                      <p class="text-xs font-weight-bold mb-0">Sales:</p>
                      <h6 class="text-sm mb-0">2500</h6>
                    </div>
                  </td>
                  <td>
                    <div class="text-center">
                      <p class="text-xs font-weight-bold mb-0">Value:</p>
                      <h6 class="text-sm mb-0">$230,900</h6>
                    </div>
                  </td>
                  <td class="align-middle text-sm">
                    <div class="col text-center">
                      <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                      <h6 class="text-sm mb-0">29.9%</h6>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="w-30">
                    <div class="d-flex px-2 py-1 align-items-center">
                      <div>
                        <img src="../assets/img/icons/flags/DE.png" alt="Country flag">
                      </div>
                      <div class="ms-4">
                        <p class="text-xs font-weight-bold mb-0">Country:</p>
                        <h6 class="text-sm mb-0">Germany</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="text-center">
                      <p class="text-xs font-weight-bold mb-0">Sales:</p>
                      <h6 class="text-sm mb-0">3.900</h6>
                    </div>
                  </td>
                  <td>
                    <div class="text-center">
                      <p class="text-xs font-weight-bold mb-0">Value:</p>
                      <h6 class="text-sm mb-0">$440,000</h6>
                    </div>
                  </td>
                  <td class="align-middle text-sm">
                    <div class="col text-center">
                      <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                      <h6 class="text-sm mb-0">40.22%</h6>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="w-30">
                    <div class="d-flex px-2 py-1 align-items-center">
                      <div>
                        <img src="../assets/img/icons/flags/GB.png" alt="Country flag">
                      </div>
                      <div class="ms-4">
                        <p class="text-xs font-weight-bold mb-0">Country:</p>
                        <h6 class="text-sm mb-0">Great Britain</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="text-center">
                      <p class="text-xs font-weight-bold mb-0">Sales:</p>
                      <h6 class="text-sm mb-0">1.400</h6>
                    </div>
                  </td>
                  <td>
                    <div class="text-center">
                      <p class="text-xs font-weight-bold mb-0">Value:</p>
                      <h6 class="text-sm mb-0">$190,700</h6>
                    </div>
                  </td>
                  <td class="align-middle text-sm">
                    <div class="col text-center">
                      <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                      <h6 class="text-sm mb-0">23.44%</h6>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="w-30">
                    <div class="d-flex px-2 py-1 align-items-center">
                      <div>
                        <img src="../assets/img/icons/flags/BR.png" alt="Country flag">
                      </div>
                      <div class="ms-4">
                        <p class="text-xs font-weight-bold mb-0">Country:</p>
                        <h6 class="text-sm mb-0">Brasil</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="text-center">
                      <p class="text-xs font-weight-bold mb-0">Sales:</p>
                      <h6 class="text-sm mb-0">562</h6>
                    </div>
                  </td>
                  <td>
                    <div class="text-center">
                      <p class="text-xs font-weight-bold mb-0">Value:</p>
                      <h6 class="text-sm mb-0">$143,960</h6>
                    </div>
                  </td>
                  <td class="align-middle text-sm">
                    <div class="col text-center">
                      <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                      <h6 class="text-sm mb-0">32.14%</h6>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="card">
          <div class="card-header pb-0 p-3">
            <h6 class="mb-0">Categories</h6>
          </div>
          <div class="card-body p-3">
            <ul class="list-group">
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                  <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                    <i class="ni ni-mobile-button text-white opacity-10"></i>
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">Devices</h6>
                    <span class="text-xs">250 in stock, <span class="font-weight-bold">346+ sold</span></span>
                  </div>
                </div>
                <div class="d-flex">
                  <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                </div>
              </li>
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                  <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                    <i class="ni ni-tag text-white opacity-10"></i>
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">Tickets</h6>
                    <span class="text-xs">123 closed, <span class="font-weight-bold">15 open</span></span>
                  </div>
                </div>
                <div class="d-flex">
                  <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                </div>
              </li>
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                  <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                    <i class="ni ni-box-2 text-white opacity-10"></i>
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">Error logs</h6>
                    <span class="text-xs">1 is active, <span class="font-weight-bold">40 closed</span></span>
                  </div>
                </div>
                <div class="d-flex">
                  <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                </div>
              </li>
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                <div class="d-flex align-items-center">
                  <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                    <i class="ni ni-satisfied text-white opacity-10"></i>
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">Happy users</h6>
                    <span class="text-xs font-weight-bold">+ 430</span>
                  </div>
                </div>
                <div class="d-flex">
                  <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
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

@endsection