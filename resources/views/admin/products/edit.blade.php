@extends('admin.layout')

@section('title', 'Edit Product')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 shadow-sm">
                <div class="card-header pb-0 bg-gradient-dark">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="text-white">Edit Product: {{ $product->name }}</h6>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-light">
                            <i class="fas fa-arrow-left me-2"></i> Back to Products
                        </a>
                    </div>
                </div>
                <div class="card-body px-4 pt-4 pb-2">
                    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="category_slug" class="form-label">Category</label>
                                <select class="form-select" id="category_slug" name="category_slug" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->slug }}" {{ $product->category_slug == $category->slug ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $product->description }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="care_instructions" class="form-label">Care Instructions</label>
                                <textarea class="form-control" id="care_instructions" name="care_instructions" rows="3">{{ $product->care_instructions }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="usage" class="form-label">Usage</label>
                                <textarea class="form-control" id="usage" name="usage" rows="3">{{ $product->usage }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="original_price" class="form-label">Original Price</label>
                                <input type="number" step="0.01" class="form-control" id="original_price" name="original_price" value="{{ $product->original_price }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="stock" class="form-label">Stock Quantity</label>
                                <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="image" class="form-label">Product Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                @if($product->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="Current Image" class="img-thumbnail" width="100">
                                        <p class="text-muted small mt-1">Current image</p>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ $product->is_active ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Active</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" {{ $product->is_featured ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_featured">Featured</label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection