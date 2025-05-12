@extends('admin.layout')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 shadow-sm">
                <div class="card-header pb-0 bg-gradient-dark d-flex justify-content-between align-items-center">
                    <h6 class="text-white mb-0" style="font-size: 16px;">Orders Management</h6>
                    <span class="badge bg-light text-dark">
                        Total: {{ $orders->total() }}
                    </span>
                </div>

                <div class="card-body px-0 pt-0 pb-2">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mx-4">
                            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive p-4">
                        <table class="table align-items-center mb-0" style="font-size: 12px;">
                            <thead>
                                <tr class="bg-light">
                                    <th class="text-dark ps-3" style="font-size: 13px; font-weight: 600; width: 5%;">#</th>
                                    <th class="text-dark" style="font-size: 13px; font-weight: 600; width: 15%;">Order #</th>
                                    <th class="text-dark" style="font-size: 13px; font-weight: 600; width: 20%;">Customer</th>
                                    <th class="text-dark" style="font-size: 13px; font-weight: 600; width: 15%;">Total</th>
                                    <th class="text-dark" style="font-size: 13px; font-weight: 600; width: 15%;">Status</th>
                                    <th class="text-dark text-center pe-3" style="font-size: 13px; font-weight: 600; width: 30%;">Change Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td class="ps-3">{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ route('admin.orders.show', $order->id) }}" class="text-dark font-weight-bold">
                                            {{ $order->order_number }}
                                        </a>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-sm bg-gradient-dark me-3">
                                                <span class="text-white">{{ substr($order->user->name, 0, 1) }}</span>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-sm">{{ $order->user->name }}</h6>
                                                <p class="text-xs text-muted mb-0">{{ $order->user->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>${{ number_format($order->total, 2) }}</td>
                                    <td>
                                        <span class="badge bg-gradient-{{ getStatusColor($order->status) }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td class="pe-3">
                                        <form method="POST" action="{{ route('admin.orders.updateStatus', $order->id) }}">
                                            @csrf
                                            @method('PATCH')
                                            <div class="d-flex align-items-center gap-2">
                                                <select name="status" class="form-select form-select-sm bg-gray-100 border-0 shadow-none" 
                                                        style="width: 150px;" onchange="this.form.submit()">
                                                    @foreach(['pending', 'processing', 'shipped', 'delivered', 'cancelled'] as $status)
                                                        <option value="{{ $status }}" {{ $order->status == $status ? 'selected' : '' }}>
                                                            {{ ucfirst($status) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                {{-- <a href="{{ route('admin.orders.show', $order->id) }}" 
                                                   class="btn btn-sm btn-outline-info ms-2"
                                                   data-bs-toggle="tooltip" 
                                                   data-bs-original-title="View Details">
                                                    <i class="fas fa-eye"></i>
                                                </a> --}}
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-4 px-4">
                        {{ $orders->onEachSide(1)->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endsection