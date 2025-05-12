@extends('admin.layout')

@section('title', 'Manage Products')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 shadow-sm">
                <div class="card-header pb-0 bg-gradient-dark d-flex justify-content-between align-items-center">
                    <h6 class="text-white mb-0" style="font-size: 16px;">Products Management</h6>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-sm btn-light">
                        <i class="fas fa-plus me-2"></i> Add New Product
                    </a>
                </div>

                <div class="card-body px-4 pt-0 pb-2"> <!-- تعديل padding هنا -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-container" style="width: 100%; overflow-x: auto;"> <!-- حاوية جديدة للجدول -->
                        <table class="table align-items-center mb-0" style="min-width: 100%; font-size: 12px;">
                            <thead>
                                <tr class="bg-light">
                                    <th class="text-dark ps-3" style="font-size: 13px; font-weight: 600; width: 25%;">Product</th>
                                    <th class="text-dark" style="font-size: 13px; font-weight: 600; width: 15%;">Category</th>
                                    <th class="text-dark" style="font-size: 13px; font-weight: 600; width: 12%;">Price</th>
                                    <th class="text-dark" style="font-size: 13px; font-weight: 600; width: 10%;">Stock</th>
                                    <th class="text-dark" style="font-size: 13px; font-weight: 600; width: 13%;">Status</th>
                                    <th class="text-dark text-center pe-3" style="font-size: 13px; font-weight: 600; width: 15%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td class="align-middle ps-3" style="width: 25%;">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('storage/' . $product->image) }}" class="avatar avatar-sm rounded-circle me-3" alt="{{ $product->name }}">
                                            <div>
                                                <h6 class="mb-0 text-dark" style="font-size: 13px; font-weight: 500;">{{ $product->name }}</h6>
                                                <p class="text-xs text-muted mb-0" style="font-size: 10px;">{{ Str::limit($product->description, 50) }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle" style="width: 15%;">
                                        <span class="badge bg-success" style="font-size: 12px;">{{ strtoupper($product->category->name) }}</span>
                                    </td>
                                    <td class="align-middle" style="width: 12%;">
                                        <div>
                                            @if($product->original_price)
                                                <span class="text-decoration-line-through text-muted text-xs me-1" style="font-size: 11px;">${{ $product->original_price }}</span>
                                            @endif
                                            <span class="fw-bold text-dark" style="font-size: 13px;">${{ $product->price }}</span>
                                        </div>
                                    </td>
                                    <td class="align-middle" style="width: 10%; font-size: 13px;">{{ $product->stock }}</td>
                                    <td class="align-middle" style="width: 13%;">
                                        <span class="badge bg-gradient-{{ $product->stock > 0 ? 'success' : 'danger' }}" style="font-size: 12px;">
                                            {{ $product->stock > 0 ? 'IN STOCK' : 'OUT OF STOCK' }}
                                        </span>
                                    </td>
                                    <td class="align-middle text-center pe-3" style="width: 15%;">
                                        <div class="d-flex justify-content-center gap-2">
             <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-outline-warning px-2 py-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="delete-form" data-name="{{ $product->name }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-outline-danger delete-btn" style="font-size: 12px; padding: 0.25rem 0.5rem;">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $products->onEachSide(1)->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(btn => {
            btn.addEventListener('click', function () {
                const form = btn.closest('form');
                const itemName = form.getAttribute('data-name');

                Swal.fire({
                    title: `Are you sure?`,
                    text: `You are about to delete "${itemName}"`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session("success") }}',
            timer: 2000,
            showConfirmButton: false
        });
        @endif
    });
</script>
@endsection