@extends('admin.create')

@section('title', 'Create New User')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 shadow-sm">
                <!-- Header -->
                <div class="card-header pb-0" style="background: linear-gradient(90deg, #4caf50, #81c784);">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="text-white">Create New User</h6>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-light">
                            <i class="fas fa-arrow-left me-2"></i> Back to Users
                        </a>
                    </div>
                </div>

                <!-- Body -->
                <div class="card-body px-4 pt-4 pb-2">
                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="role" class="form-label">User Role</label>
                                @if(auth()->user()->isSuperAdmin())
                                    <select class="form-select" id="role" name="role" required>
                                        <option value="">Select Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="user">Regular User</option>
                                    </select>
                                @else
                                    <input type="text" class="form-control" value="Regular User" readonly>
                                    <input type="hidden" name="role" value="user">
                                @endif
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-success">Create User</button>
                        </div>
                    </form>
                </div>
                <!-- End card-body -->
            </div>
        </div>
    </div>
</div>
@endsection
