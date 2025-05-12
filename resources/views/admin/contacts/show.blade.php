@extends('admin.create')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 shadow-sm">
                <div class="card-header pb-0" style="background: linear-gradient(to right, #388e3c, #66bb6a);">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="text-white m-0">Message Details</h6>
                        <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-light text-success border-success">
                            <i class="fas fa-arrow-left me-2"></i> Back to Messages
                        </a>
                    </div>
                </div>
                
                <div class="card-body px-4 pt-4 pb-2">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-4">
                            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-user me-2"></i><strong>Name:</strong></label>
                                <p>{{ $contact->name }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-envelope me-2"></i><strong>Email:</strong></label>
                                <a href="mailto:{{ $contact->email }}" class="form-text text-dark">{{ $contact->email }}</a>
                            </div>
                            @if($contact->phone)
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-phone me-2"></i><strong>Phone:</strong></label>
                                <a href="tel:{{ $contact->phone }}" class="form-text text-dark">{{ $contact->phone }}</a>
                            </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-calendar-alt me-2"></i><strong>Date:</strong></label>
                                <p>{{ $contact->created_at->format('M d, Y H:i') }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-circle me-2"></i><strong>Status:</strong></label>
                                <span class="badge bg-{{ $contact->read_at ? 'success' : 'warning' }}">
                                    {{ $contact->read_at ? 'Read' : 'Unread' }}
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <hr class="my-4">

                    <div class="row">
                        <div class="col-12">
                            <h5 class="mb-3"><i class="fas fa-paperclip me-2"></i>Subject: {{ $contact->subject }}</h5>
                            <div class="card bg-light p-4 mt-2 rounded">
                                <div class="message-content" style="white-space: pre-wrap; line-height: 1.6;">
                                    {{ $contact->message }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card-footer bg-light d-flex justify-content-between align-items-center border-0">
                    <div class="d-flex gap-2">
                        @if($contact->read_at)
                            <form action="{{ route('admin.contacts.markAsUnread', $contact->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm">
                                    <i class="fas fa-envelope me-2"></i> Mark as Unread
                                </button>
                            </form>
                        @else
                            <form action="{{ route('admin.contacts.markAsRead', $contact->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fas fa-envelope-open me-2"></i> Mark as Read
                                </button>
                            </form>
                        @endif
                    </div>
                    
                    <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm delete-btn" data-id="{{ $contact->id }}">
                            <i class="fas fa-trash me-2"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // SweetAlert for Delete Confirmation
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                const form = this.closest('form');
                const contactId = this.getAttribute('data-id');
                
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#388e3c',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        // SweetAlert for Success Message
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
@endsection

