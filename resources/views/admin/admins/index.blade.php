@extends('admin.layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Admins Management</h4>
        <a href="{{ route('admins.create') }}" class="btn btn-primary">Add New Admin</a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $admin)
                <tr>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <span class="badge bg-{{ $admin->role == 'super_admin' ? 'danger' : 'info' }}">
                            {{ ucfirst($admin->role) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admins.destroy', $admin->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection