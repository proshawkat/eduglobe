@extends('layouts.admin')
@section('page-title', $event->exists ? 'Edit Event' : 'Add Event')
@section('content')
<div class="page-header">
    <div>
        <div class="page-title">{{ $event->exists ? 'Edit Event' : 'Add Event' }}</div>
        <div class="breadcrumb"><a href="{{ route('admin.events.index') }}" style="color:#7c3aed">Events</a> / <span>{{ $event->exists ? 'Edit' : 'New' }}</span></div>
    </div>
</div>
<div class="card" style="max-width:700px">
    <div class="card-header"><div class="card-title">Event Details</div></div>
    <div class="card-body">
        <form action="{{ $event->exists ? route('admin.events.update', $event) : route('admin.events.store') }}" method="POST">
            @csrf @if($event->exists) @method('PUT') @endif
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Event Title *</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $event->title) }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Event Date *</label>
                    <input type="date" name="event_date" class="form-control" value="{{ old('event_date', $event->event_date?->format('Y-m-d')) }}" required>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Description *</label>
                <textarea name="description" class="form-control" rows="3" required>{{ old('description', $event->description) }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-check">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $event->is_active ?? true) ? 'checked' : '' }}>
                    Active (visible on website)
                </label>
            </div>
            <div style="display:flex;gap:12px;margin-top:8px">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ $event->exists ? 'Update' : 'Save' }}</button>
                <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
