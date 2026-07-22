@extends('layouts.admin')
@section('page-title', $service->exists ? 'Edit Service' : 'Add Service')
@section('content')
<div class="page-header">
    <div>
        <div class="page-title">{{ $service->exists ? 'Edit Service' : 'Add Service' }}</div>
        <div class="breadcrumb"><a href="{{ route('admin.services.index') }}" style="color:#7c3aed">Services</a> / <span>{{ $service->exists ? 'Edit' : 'New' }}</span></div>
    </div>
</div>
<div class="card" style="max-width:700px">
    <div class="card-header"><div class="card-title">Service Details</div></div>
    <div class="card-body">
        <form action="{{ $service->exists ? route('admin.services.update', $service) : route('admin.services.store') }}" method="POST">
            @csrf @if($service->exists) @method('PUT') @endif
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Font Awesome Icon Class *</label>
                    <input type="text" name="icon" class="form-control" value="{{ old('icon', $service->icon) }}" placeholder="fa-graduation-cap" required>
                    <div style="font-size:.75rem;color:#94a3b8;margin-top:4px">e.g. fa-passport, fa-award, fa-language</div>
                </div>
                <div class="form-group">
                    <label class="form-label">Display Order</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $service->order ?? 0) }}" min="0">
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Title *</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $service->title) }}" required>
            </div>
            <div class="form-group">
                <label class="form-label">Description *</label>
                <textarea name="description" class="form-control" rows="4" required>{{ old('description', $service->description) }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-check">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $service->is_active ?? true) ? 'checked' : '' }}>
                    Active
                </label>
            </div>
            <div style="display:flex;gap:12px;margin-top:8px">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ $service->exists ? 'Update' : 'Save' }}</button>
                <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
