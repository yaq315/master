@extends('admin.layout')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">Contact Messages</h3>
            <span class="badge bg-primary">
                Total: {{ $contacts->total() }} 
                (Unread: {{ $contacts->whereNull('read_at')->count() }})
            </span>
        </div>
    </div>
    
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contacts as $contact)
                    <tr class="{{ $contact->read_at ? '' : 'font-weight-bold bg-light' }}">
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ Str::limit($contact->subject, 30) }}</td>
                        <td>
                            <span class="badge badge-{{ $contact->read_at ? 'success' : 'warning' }} text-dark">
                                {{ $contact->read_at ? 'Read' : 'Unread' }}
                            </span>
                        </td>
                        <td>{{ $contact->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('admin.contacts.show', $contact->id) }}" 
                                   class="btn btn-sm btn-info mr-2"
                                   data-toggle="tooltip" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this message?')"
                                            data-toggle="tooltip" title="Delete">
                                        <i class="fas fa-trash"></i>
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
        
        <div class="mt-3">
            {{ $contacts->links() }}
        </div>
    </div>
</div>

@section('scripts')
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip();
  
  // Auto-hide alerts after 5 seconds
  setTimeout(() => {
    $('.alert').fadeOut('slow');
  }, 5000);
});
</script>
@endsection
@endsection