@extends('layouts.admin')
@section('page-title', $university->exists ? 'Edit University' : 'Add University')
@section('content')
<div class="page-header">
    <div>
        <div class="page-title">{{ $university->exists ? 'Edit University' : 'Add University' }}</div>
        <div class="breadcrumb"><a href="{{ route('admin.universities.index') }}" style="color:#7c3aed">Partner Universities</a> / <span>{{ $university->exists ? 'Edit' : 'New' }}</span></div>
    </div>
</div>

<div class="card" style="max-width:700px">
    <div class="card-header"><div class="card-title"><i class="fas fa-university" style="color:#7c3aed;margin-right:8px"></i>University Details</div></div>
    <div class="card-body">
        <form action="{{ $university->exists ? route('admin.universities.update', $university) : route('admin.universities.store') }}" method="POST">
            @csrf @if($university->exists) @method('PUT') @endif

            <div class="form-group">
                <label class="form-label">University Name *</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $university->name) }}" placeholder="e.g. University of Oxford" required>
                @error('name')<div style="color:red;font-size:.78rem;margin-top:4px">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label class="form-label">Logo URL <span style="color:#94a3b8;font-size:.78rem">(optional — leave blank to auto-generate)</span></label>
                <input type="url" name="logo_url" class="form-control" value="{{ old('logo_url', $university->logo_url) }}" placeholder="https://example.com/logo.png">
                @error('logo_url')<div style="color:red;font-size:.78rem;margin-top:4px">{{ $message }}</div>@enderror
                <div style="font-size:.78rem;color:#64748b;margin-top:4px">
                    <i class="fas fa-info-circle"></i> If empty, an avatar will be auto-generated from the university name.
                </div>
            </div>

            {{-- Live logo preview --}}
            <div id="logo-preview-wrap" style="margin-bottom:16px;display:{{ old('logo_url', $university->logo_url) ? 'flex' : 'none' }};align-items:center;gap:12px;padding:12px 16px;background:#f8fafc;border:1px solid #e2e8f0;border-radius:8px">
                <img id="logo-preview-img"
                     src="{{ old('logo_url', $university->logo_url) ?: '' }}"
                     alt="Logo Preview"
                     style="width:48px;height:48px;border-radius:50%;object-fit:cover;background:#e2e8f0">
                <span style="font-size:.82rem;color:#64748b">Logo Preview</span>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Country</label>
                    <input type="text" name="country" class="form-control" value="{{ old('country', $university->country) }}" placeholder="e.g. United Kingdom">
                </div>
                <div class="form-group">
                    <label class="form-label">Display Order</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $university->order ?? 0) }}" min="0">
                </div>
            </div>

            <div class="form-group" style="display:flex;align-items:center;gap:10px;padding-bottom:4px">
                <label class="form-check">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $university->is_active ?? true) ? 'checked' : '' }}>
                    Active (show on homepage slider)
                </label>
            </div>

            <div style="display:flex;gap:12px;margin-top:16px">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ $university->exists ? 'Update' : 'Save' }}</button>
                <a href="{{ route('admin.universities.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const logoInput  = document.querySelector('input[name="logo_url"]');
    const previewWrap = document.getElementById('logo-preview-wrap');
    const previewImg  = document.getElementById('logo-preview-img');

    logoInput.addEventListener('input', function () {
        const url = this.value.trim();
        if (url) {
            previewImg.src = url;
            previewWrap.style.display = 'flex';
        } else {
            previewWrap.style.display = 'none';
        }
    });
});
</script>
@endsection
