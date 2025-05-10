@extends('admin.layout')

@section('content')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container mt-4">
    <h2>Edit Category</h2>
   <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Category Name *</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required value="{{ old('name', $category->name) }}">
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug *</label>
            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" required value="{{ old('slug', $category->slug) }}">
            @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description', $category->description) }}</textarea>
            @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
          
            
            <label for="image" class="form-label mt-2">New Image (optional)</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
            @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

    <div class="mb-3 form-check">
    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1" 
        {{ old('is_active', $category->is_active ?? true) ? 'checked' : '' }}>
    <label class="form-check-label" for="is_active">Active</label>
</div>

        <button type="submit" class="btn btn-success">Update Category</button>

    </form>
</div>
@endsection