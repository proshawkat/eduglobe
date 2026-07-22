@extends('layouts.admin')
@section('page-title', $destination->exists ? 'Edit Destination' : 'Add Destination')

@section('content')
<div class="page-header">
    <div>
        <div class="page-title">{{ $destination->exists ? 'Edit Destination' : 'Add Destination' }}</div>
        <div class="breadcrumb"><a href="{{ route('admin.destinations.index') }}" style="color:#7c3aed">Destinations</a> / <span>{{ $destination->exists ? 'Edit' : 'New' }}</span></div>
    </div>
</div>

<div class="card" style="max-width:700px">
    <div class="card-header"><div class="card-title">Destination Details</div></div>
    <div class="card-body">
        <form action="{{ $destination->exists ? route('admin.destinations.update', $destination) : route('admin.destinations.store') }}" method="POST">
            @csrf
            @if($destination->exists) @method('PUT') @endif

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Country Name *</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $destination->name) }}" placeholder="e.g. United Kingdom" required>
                    @error('name')<div style="color:red;font-size:.78rem;margin-top:4px">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Country Code *</label>
                    <input type="text" name="country_code" class="form-control" value="{{ old('country_code', $destination->country_code) }}" placeholder="e.g. gb, au, nz, us" maxlength="5" required>
                    <div style="font-size:.73rem;color:#94a3b8;margin-top:4px">2-letter ISO code — used for real flag image (e.g. gb=🇬🇧, au=🇦🇺)</div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Slug (URL) *</label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug', $destination->slug) }}" placeholder="e.g. united-kingdom" required>
                    <div style="font-size:.73rem;color:#94a3b8;margin-top:4px">Used in URL: /study-abroad/<strong>slug</strong></div>
                </div>
                <div class="form-group">
                    <label class="form-label">Flag Emoji (optional)</label>
                    <input type="text" name="flag" class="form-control" value="{{ old('flag', $destination->flag) }}" placeholder="🇬🇧">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Short Description *</label>
                <textarea name="description" class="form-control" rows="3" required>{{ old('description', $destination->description) }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Full Details (for country page)</label>
                <textarea name="details" class="form-control" rows="6" placeholder="Write detailed info about studying in this country — costs, universities, visa, work rights etc.">{{ old('details', $destination->details) }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Image URL *</label>
                <input type="url" name="image_url" class="form-control" value="{{ old('image_url', $destination->image_url) }}" placeholder="https://..." required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Display Order</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $destination->order ?? 0) }}" min="0">
                </div>
                <div class="form-group" style="display:flex;align-items:flex-end;padding-bottom:4px">
                    <label class="form-check">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $destination->is_active ?? true) ? 'checked' : '' }}>
                        Active (visible on website)
                    </label>
                </div>
            </div>

            <div style="display:flex;gap:12px;margin-top:8px">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ $destination->exists ? 'Update' : 'Save' }}</button>
                <a href="{{ route('admin.destinations.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
