@extends('admin.layout')

@section('content')
<div class="card">
    <div class="card-header pb-0">
        <h4>Add New Admin</h4>
    </div>
    <div class="card-body pt-0">
        <form action="{{ route('admins.store') }}" method="POST">
            @csrf
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="form-control-label">Full Name</label>
                        <input class="form-control" type="text" id="name" name="name" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email" class="form-control-label">Email</label>
                        <input class="form-control" type="email" id="email" name="email" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password" class="form-control-label">Password</label>
                        <input class="form-control" type="password" id="password" name="password" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password_confirmation" class="form-control-label">Confirm Password</label>
                        <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="role" class="form-control-label">Role</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="admin">Admin</option>
                    <option value="super_admin">Super Admin</option>
                </select>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('admins.index') }}" class="btn btn-light me-3">Cancel</a>
                <button type="submit" class="btn btn-primary">Create Admin</button>
            </div>
        </form>
    </div>
</div>
@endsection