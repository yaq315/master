


@extends('admin.layout')

@section('title', 'Create New Product')

@section('content')

<div class="container-fluid py-4">

    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show mx-4">
        <i class="fas fa-exclamation-circle me-2"></i> 
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 shadow-sm">
                <div class="card-header pb-0 bg-gradient-dark">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="text-white">Create New Product</h6>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-light">
                            <i class="fas fa-arrow-left me-2"></i> Back to Products
                        </a>
                    </div>
                </div>
                <div class="card-body px-4 pt-4 pb-2">
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="category_slug" class="form-label">Category</label>
                                <select class="form-select" id="category_slug" name="category_slug" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->slug }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="care_instructions" class="form-label">Care Instructions</label>
                                <textarea class="form-control" id="care_instructions" name="care_instructions" rows="3"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="usage" class="form-label">Usage</label>
                                <textarea class="form-control" id="usage" name="usage" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="original_price" class="form-label">Original Price</label>
                                <input type="number" step="0.01" class="form-control" id="original_price" name="original_price">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="stock" class="form-label">Stock Quantity</label>
                                <input type="number" class="form-control" id="stock" name="stock" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked>
                                    <label class="form-check-label" for="is_active">Active</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1">
                                    <label class="form-check-label" for="is_featured">Featured</label>
                                </div>
                            </div>
        <label for="image" class="form-label">Product Image</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" 
               id="image" name="image" required accept="image/*">
        
        @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        
        <small class="text-muted">Allowed types: jpeg, png, jpg, gif (Max: 2MB)</small>
    </div>
                            
                            
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const selector = document.getElementById('image-selector');
    const preview = document.getElementById('preview-image');
    
    if (selector && preview) {
        // تحديث المعاينة عند تغيير الاختيار
        selector.addEventListener('change', function() {
            const selectedImage = this.value;
            // استبدل هذا المسار بمسارك الفعلي
            preview.src = `file:///C:/xampp/htdocs/external_images/${selectedImage}`;
            preview.style.display = 'block';
        });
        
        // تشغيل المعاينة مباشرة عند تحميل الصفحة
        if (selector.options.length > 0) {
            selector.dispatchEvent(new Event('change'));
        }
    }
});

document.getElementById('image').addEventListener('change', function(e) {
    if (e.target.files.length > 0) {
        const src = URL.createObjectURL(e.target.files[0]);
        const preview = document.getElementById('image-preview');
        preview.src = src;
        preview.style.display = "block";
    }
});
</script>
@endsection
@endsection