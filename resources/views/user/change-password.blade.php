
    @extends('layouts.contain_profile')

@section('content')
<div class="container py-5">
    <h3>Change Password</h3>

    @if($errors->any())
        <div class="alert alert-danger">
            {{ implode('', $errors->all(':message')) }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <div class="mb-3">
            <label for="current_password">Current Password</label>
            <input type="password" name="current_password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="new_password">New Password</label>
            <input type="password" name="new_password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="new_password_confirmation">Confirm New Password</label>
            <input type="password" name="new_password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-leafy">Change Password</button>
    </form>
</div>
@endsection
