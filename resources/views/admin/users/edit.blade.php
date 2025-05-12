@extends('admin.create')

@section('title', 'Edit User')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 shadow-sm">
                <div class="card-header pb-0" style="background: linear-gradient(to right, #388e3c, #66bb6a);">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="text-white m-0">Edit User: {{ $user->name }}</h6>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-light text-success border-success">
                            <i class="fas fa-arrow-left me-2"></i> Back to Users
                        </a>
                    </div>
                </div>
                
                <div class="card-body px-4 pt-4 pb-2">
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label text-success">Full Name</label>
                                <input type="text" class="form-control border-success" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label text-success">Email Address</label>
                                <input type="email" class="form-control border-success" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label text-success">Password (optional)</label>
                                <input type="password" class="form-control border-success" id="password" name="password">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="password_confirmation" class="form-label text-success">Confirm Password</label>
                                <input type="password" class="form-control border-success" id="password_confirmation" name="password_confirmation">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="role" class="form-label text-success">User Role</label>
                                @if(auth()->user()->isSuperAdmin())
                                    <select class="form-select border-success" id="role" name="role" required>
                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Regular User</option>
                                    </select>
                                @else
                                    <input type="text" class="form-control border-success" value="{{ ucfirst($user->role) }}" readonly>
                                    <input type="hidden" name="role" value="{{ $user->role }}">
                                @endif
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-success px-4">Update User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
