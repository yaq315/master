@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card leafy-card">
                <div class="card-header bg-leafy text-white">
                    <h4 class="mb-0">Edit Profile</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3 text-center">
                            <label class="form-label">Profile Photo</label>
                            <div class="d-flex flex-column align-items-center">
                                @if($user->profile_photo_path)
                                    <img src="{{ asset('storage/' . $user->profile_photo_path) }}" 
                                         class="rounded-circle mb-3" 
                                         width="150" 
                                         id="profile-photo-preview"
                                         alt="Profile Photo">
                                @else
                                    <div class="avatar bg-leafy rounded-circle mb-3" 
                                         id="profile-photo-preview"
                                         style="width: 150px; height: 150px; line-height: 150px;">
                                        <span class="text-white display-4">{{ substr($user->name, 0, 1) }}</span>
                                    </div>
                                @endif
                                <input type="file" class="form-control w-auto" name="profile_photo" id="profile-photo-input" accept="image/*">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('user.profile') }}" class="btn btn-outline-leafy">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                            <button type="submit" class="btn btn-leafy">
                                <i class="fas fa-save"></i> Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    document.getElementById('profile-photo-input').addEventListener('change', function(e) {
        const preview = document.getElementById('profile-photo-preview');
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                if (preview.tagName === 'IMG') {
                    preview.src = e.target.result;
                } else {
                    preview.innerHTML = `<img src="${e.target.result}" class="rounded-circle" width="150" alt="Preview">`;
                }
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
@endsection
@endsection
