@extends('admin.create')

@section('title', 'Edit Category')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 shadow-sm">
                <div class="card-header pb-0" style="background: linear-gradient(to right, #388e3c, #66bb6a);">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="text-white m-0">Edit Category: {{ $category->name }}</h6>
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-light text-success border-success">
                            <i class="fas fa-arrow-left me-2"></i> Back to Categories
                        </a>
                    </div>
                </div>
                <div class="card-body px-4 pt-4 pb-2">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label text-success">Category Name *</label>
                            <input type="text" name="name" class="form-control border-success @error('name') is-invalid @enderror" required value="{{ old('name', $category->name) }}">
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label text-success">Slug *</label>
                            <input type="text" name="slug" class="form-control border-success @error('slug') is-invalid @enderror" required value="{{ old('slug', $category->slug) }}">
                            @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label text-success">Description</label>
                            <textarea name="description" class="form-control border-success @error('description') is-invalid @enderror" rows="4">{{ old('description', $category->description) }}</textarea>
                            @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label text-success">New Image (optional)</label>
                            <input type="file" name="image" class="form-control border-success @error('image') is-invalid @enderror">
                            @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror

                            @if($category->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="Current Image" class="img-thumbnail" width="100">
                                    <p class="text-muted small mt-1">Current image</p>
                                </div>
                            @endif
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox" name="is_active" class="form-check-input border-success" id="is_active" value="1" 
                                {{ old('is_active', $category->is_active ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label text-success" for="is_active">Active</label>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success px-4">Update Category</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
