@extends('admin.layout')

@section('title', 'Message Details')

@section('content')
<div class="container-fluid py-4 ">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 shadow-sm">
                <div class="card-header pb-0 bg-gradient-dark">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="text-white">Message Details</h6>
                        <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-light">
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
                            <div class="info-item mb-3">
                                <span class="info-label"><i class="fas fa-user me-2 text-dark"></i><strong>Name:</strong></span>
                                <span class="info-value">{{ $contact->name }}</span>
                            </div>
                            <div class="info-item mb-3">
                                <span class="info-label"><i class="fas fa-envelope me-2 text-dark"></i><strong>Email:</strong></span>
                                <a href="mailto:{{ $contact->email }}" class="info-value text-dark">{{ $contact->email }}</a>
                            </div>
                            @if($contact->phone)
                            <div class="info-item mb-3">
                                <span class="info-label"><i class="fas fa-phone me-2 text-dark"></i><strong>Phone:</strong></span>
                                <a href="tel:{{ $contact->phone }}" class="info-value text-dark">{{ $contact->phone }}</a>
                            </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="info-item mb-3">
                                <span class="info-label"><i class="fas fa-calendar-alt me-2 text-dark"></i><strong>Date:</strong></span>
                                <span class="info-value">{{ $contact->created_at->format('M d, Y H:i') }}</span>
                            </div>
                            <div class="info-item mb-3">
                                <span class="info-label"><i class="fas fa-circle me-2 text-dark"></i><strong>Status:</strong></span>
                                <span class="badge bg-gradient-{{ $contact->read_at ? 'success' : 'warning' }} rounded-pill text-dark">
                                    {{ $contact->read_at ? 'Read' : 'Unread' }}
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <hr class="my-4 bg-gray-300">
                    
                    <div class="row">
                        <div class="col-12">
                            <h5 class="mb-3"><i class="fas fa-paperclip me-2 text-dark"></i>Subject: {{ $contact->subject }}</h5>
                            <div class="card bg-gray-100 border-0 p-4 mt-2 rounded-lg">
                                <div class="message-content" style="white-space: pre-wrap; line-height: 1.6;">
                                    {{ $contact->message }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card-footer bg-gray-100 d-flex justify-content-between align-items-center border-0">
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
                    
                    <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" 
                                onclick="return confirm('Are you sure you want to permanently delete this message?')">
                            <i class="fas fa-trash me-2"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .info-label {
        display: inline-block;
        width: 100px;
        color: #495057;
        font-weight: 500;
    }
    
    .info-value {
        color: #212529;
    }
    
    .bg-gray-100 {
        background-color: #f8f9fa;
    }
    
    .bg-gray-300 {
        background-color: #dee2e6;
    }
    
    .rounded-lg {
        border-radius: 0.5rem;
    }
    
    .message-content {
        font-size: 0.95rem;
        line-height: 1.7;
        color: #495057;
    }
    
    .btn-sm {
        padding: 0.35rem 0.75rem;
        font-size: 0.875rem;
        border-radius: 0.375rem;
    }
    
    .card-header.bg-gradient-dark {
        color: white;
    }
    
    .alert {
        border-radius: 0.5rem;
    }
</style>
@endsection