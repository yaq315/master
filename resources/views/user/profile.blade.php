@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card leafy-card">
                <div class="card-header bg-leafy text-white">
                    <h4 class="mb-0">الملف الشخصي</h4>
                </div>

                <div class="card-body">
                    <div class="text-center mb-4">
                        @if($user->profile_photo_path)
                            <img src="{{ asset('storage/' . $user->profile_photo_path) }}" 
                                 class="rounded-circle mb-3" 
                                 width="150" 
                                 alt="صورة الملف الشخصي">
                        @else
                            <div class="avatar bg-leafy rounded-circle mb-3 mx-auto" 
                                 style="width: 150px; height: 150px; line-height: 150px;">
                                <span class="text-white display-4">{{ substr($user->name, 0, 1) }}</span>
                            </div>
                        @endif

                        <h3>{{ $user->name }}</h3>
                        <p class="text-muted">{{ $user->email }}</p>
                    </div>

                    <div class="leafy-divider"></div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-card mb-4">
                                <h5><i class="fas fa-user-circle text-leafy"></i> المعلومات الأساسية</h5>
                                <p><strong>تاريخ التسجيل:</strong> {{ $user->created_at->format('Y/m/d') }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-card mb-4">
                                <h5><i class="fas fa-leaf text-leafy"></i> التفضيلات</h5>
                                <p><strong>النباتات المفضلة:</strong> 5</p>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('user.profile.edit') }}" class="btn btn-leafy">
                        <i class="fas fa-edit"></i> تعديل الملف الشخصي
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection