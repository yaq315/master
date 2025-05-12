@extends('admin.layout')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header pb-0 bg-gradient-dark d-flex justify-content-between align-items-center">
                    <h6 class="text-white mb-0" style="font-size: 16px; font-weight: 600;">Contact Messages</h6>
                    <span class="badge bg-light text-dark">
                        Total: {{ $contacts->total() }} 
                        <span class="badge bg-success ms-1">
                            Unread: {{ $contacts->whereNull('read_at')->count() }}
                        </span>
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
                        <table class="table align-items-center mb-0" style="font-size: 14px;">
                            <thead>
                                <tr class="bg-light">
                                    <th class="text-dark ps-3" style="font-size: 14px; font-weight: 600;">ID</th>
                                    <th class="text-dark" style="font-size: 14px; font-weight: 600;">Name</th>
                                    <th class="text-dark" style="font-size: 14px; font-weight: 600;">Email</th>
                                    <th class="text-dark" style="font-size: 14px; font-weight: 600;">Subject</th>
                                    <th class="text-dark" style="font-size: 14px; font-weight: 600;">Status</th>
                                    <th class="text-dark" style="font-size: 14px; font-weight: 600;">Date</th>
                                    <th class="text-dark text-center pe-3" style="font-size: 14px; font-weight: 600;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($contacts as $contact)
                                <tr class="{{ $contact->read_at ? '' : 'bg-gray-100' }}">
                                    <td class="ps-3">{{ $contact->id }}</td>
                                    <td class="{{ $contact->read_at ? '' : 'font-weight-bold' }}">{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ Str::limit($contact->subject, 30) }}</td>
                                    <td>
                                        <span class="badge bg-gradient-{{ $contact->read_at ? 'success' : 'warning' }}">
                                            {{ $contact->read_at ? 'Read' : 'Unread' }}
                                        </span>
                                    </td>
                                    <td>{{ $contact->created_at->format('Y-m-d H:i') }}</td>
                                    <td class="text-center pe-3">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('admin.contacts.show', $contact->id) }}" 
                                               class="btn btn-sm btn-outline-info"
                                               data-bs-toggle="tooltip" 
                                               data-bs-original-title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" 
                                                        class="btn btn-sm btn-outline-danger delete-btn"
                                                        data-bs-toggle="tooltip" 
                                                        data-bs-original-title="Delete"
                                                        data-id="{{ $contact->id }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">No messages found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-4 px-4">
                        {{ $contacts->links('vendor.pagination.bootstrap-5') }}
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

        // Auto-hide alerts after 5 seconds
        setTimeout(() => {
            var alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                var bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);

        // SweetAlert for delete confirmation
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                const form = this.closest('form');
                const contactId = this.getAttribute('data-id');
                
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        // SweetAlert for success messages
        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            timer: 3000,
            showConfirmButton: false
        });
        @endif
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
