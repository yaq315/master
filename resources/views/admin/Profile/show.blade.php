@extends('admin.layout')

@section('title', 'My Profile')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 bg-gradient-dark">
                    <h6 class="text-white">My Profile</h6>
                </div>
                <div class="card-body">
                    <!-- Session Messages -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" id="profile-form">
                        @csrf
                        @method('PUT')
                        
                        <!-- Validation Errors -->
                        @if($errors->any()))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-times-circle me-2"></i>
                                <ul class="mb-0 ps-3">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- Profile Photo Section -->
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Profile Photo</label>
                                <div class="d-flex align-items-center">
                                    <div class="position-relative">
                                        @if(auth()->user()->profile_photo_path)
                                            <img src="{{ asset('storage/'.auth()->user()->profile_photo_path) }}?v={{ time() }}" 
                                                 class="avatar avatar-xxl rounded-circle border border-3 border-primary me-3 shadow" 
                                                 id="profile-photo-preview"
                                                 alt="Profile Picture">
                                        @else
                                            <div class="avatar avatar-xxl bg-gradient-primary rounded-circle border border-3 border-primary me-3 shadow">
                                                <span class="text-white display-5">{{ substr(auth()->user()->name, 0, 1) }}</span>
                                            </div>
                                        @endif
                                        <label for="profile-photo-input" class="btn btn-sm btn-icon-only btn-rounded btn-primary position-absolute bottom-0 end-0 me-3 mb-3 cursor-pointer">
                                            <i class="fas fa-camera"></i>
                                        </label>
                                    </div>
                                    <input type="file" class="d-none" name="profile_photo" id="profile-photo-input" accept="image/jpeg,image/png,image/jpg,image/webp">
                                    <div class="text-muted small ms-3">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Profile Information -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" 
                                       value="{{ old('name', auth()->user()->name) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" 
                                       value="{{ old('email', auth()->user()->email) }}" required>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i> Back to Dashboard
                            </a>
                            <button type="submit" class="btn btn-primary" id="submit-btn">
                                <i class="fas fa-save me-2"></i> Update Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Profile photo preview
        const profilePhotoInput = document.getElementById('profile-photo-input');
        const profilePhotoPreview = document.getElementById('profile-photo-preview');
        
        profilePhotoInput.addEventListener('change', function(e) {
            if (this.files && this.files[0]) {
                // Validate file size (max 2MB)
                if (this.files[0].size > 2 * 1024 * 1024) {
                    alert('File size must be less than 2MB');
                    this.value = '';
                    return;
                }
                
                // Validate file type
                const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
                if (!validTypes.includes(this.files[0].type)) {
                    alert('Only JPG, PNG, and WEBP images are allowed');
                    this.value = '';
                    return;
                }
                
                // Preview image
                const reader = new FileReader();
                reader.onload = function(e) {
                    if (profilePhotoPreview) {
                        profilePhotoPreview.src = e.target.result;
                    } else {
                        // If no image exists, create the preview element
                        const previewContainer = document.querySelector('.position-relative');
                        const newPreview = document.createElement('img');
                        newPreview.src = e.target.result;
                        newPreview.className = 'avatar avatar-xxl rounded-circle border border-3 border-primary me-3 shadow';
                        newPreview.id = 'profile-photo-preview';
                        newPreview.alt = 'Profile Picture';
                        
                        // Replace the initial avatar with the new image
                        const initialAvatar = previewContainer.querySelector('.avatar.avatar-xxl');
                        if (initialAvatar) {
                            previewContainer.insertBefore(newPreview, initialAvatar);
                            initialAvatar.remove();
                        }
                    }
                }
                reader.readAsDataURL(this.files[0]);
            }
        });

        // Form submission handler
        const form = document.getElementById('profile-form');
        if (form) {
            form.addEventListener('submit', function() {
                const submitBtn = document.getElementById('submit-btn');
                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Updating...';
                }
            });
        }
    });
</script>
@endsection