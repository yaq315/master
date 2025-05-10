@extends('admin.layout')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>System Settings</h6>
                </div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('admin.settings.update') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="site_name" class="form-label">Site Name</label>
                            <input type="text" class="form-control" id="site_name" name="site_name" 
                                   value="{{ $settings['site_name'] ?? '' }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="site_email" class="form-label">Site Email</label>
                            <input type="email" class="form-control" id="site_email" name="site_email" 
                                   value="{{ $settings['site_email'] ?? '' }}" required>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="maintenance_mode" 
                                   name="maintenance_mode" value="1" 
                                   {{ isset($settings['maintenance_mode']) && $settings['maintenance_mode'] ? 'checked' : '' }}>
                            <label class="form-check-label" for="maintenance_mode">Maintenance Mode</label>
                        </div>

                        <div class="mb-3">
                            <label for="items_per_page" class="form-label">Items Per Page</label>
                            <input type="number" class="form-control" id="items_per_page" name="items_per_page" 
                                   value="{{ $settings['items_per_page'] ?? 10 }}" min="5" max="100" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Save Settings</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection