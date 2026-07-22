@extends('layouts.admin')
@section('page-title', $testimonial->exists ? 'Edit Testimonial' : 'Add Testimonial')
@section('content')
<div class="page-header">
    <div>
        <div class="page-title">{{ $testimonial->exists ? 'Edit Testimonial' : 'Add Testimonial' }}</div>
        <div class="breadcrumb"><a href="{{ route('admin.testimonials.index') }}" style="color:#7c3aed">Testimonials</a> / <span>{{ $testimonial->exists ? 'Edit' : 'New' }}</span></div>
    </div>
</div>
<div class="card" style="max-width:700px">
    <div class="card-header"><div class="card-title">Testimonial Details</div></div>
    <div class="card-body">
        <form action="{{ $testimonial->exists ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}" method="POST">
            @csrf @if($testimonial->exists) @method('PUT') @endif
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Student Name *</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $testimonial->name) }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Initial (Avatar Letter) *</label>
                    <input type="text" name="initial" class="form-control" value="{{ old('initial', $testimonial->initial) }}" maxlength="3" required>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">University *</label>
                <input type="text" name="university" class="form-control" value="{{ old('university', $testimonial->university) }}" placeholder="e.g. University of Hull, UK" required>
            </div>
            <div class="form-group">
                <label class="form-label">Review Text *</label>
                <textarea name="text" class="form-control" rows="4" required>{{ old('text', $testimonial->text) }}</textarea>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Display Order</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $testimonial->order ?? 0) }}" min="0">
                </div>
                <div class="form-group" style="display:flex;align-items:flex-end;padding-bottom:4px">
                    <label class="form-check">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $testimonial->is_active ?? true) ? 'checked' : '' }}>
                        Active
                    </label>
                </div>
            </div>
            <div style="display:flex;gap:12px;margin-top:8px">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ $testimonial->exists ? 'Update' : 'Save' }}</button>
                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
