@extends('layouts.admin')
@section('page-title', $faq->exists ? 'Edit FAQ' : 'Add FAQ')
@section('content')
<div class="page-header">
    <div>
        <div class="page-title">{{ $faq->exists ? 'Edit FAQ' : 'Add FAQ' }}</div>
        <div class="breadcrumb"><a href="{{ route('admin.faqs.index') }}" style="color:#7c3aed">FAQs</a> / <span>{{ $faq->exists ? 'Edit' : 'New' }}</span></div>
    </div>
</div>
<div class="card" style="max-width:700px">
    <div class="card-header"><div class="card-title">FAQ Details</div></div>
    <div class="card-body">
        <form action="{{ $faq->exists ? route('admin.faqs.update', $faq) : route('admin.faqs.store') }}" method="POST">
            @csrf @if($faq->exists) @method('PUT') @endif
            <div class="form-group">
                <label class="form-label">Question *</label>
                <input type="text" name="question" class="form-control" value="{{ old('question', $faq->question) }}" required>
            </div>
            <div class="form-group">
                <label class="form-label">Answer *</label>
                <textarea name="answer" class="form-control" rows="5" required>{{ old('answer', $faq->answer) }}</textarea>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Display Order</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $faq->order ?? 0) }}" min="0">
                </div>
                <div class="form-group" style="display:flex;align-items:flex-end;padding-bottom:4px">
                    <label class="form-check">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $faq->is_active ?? true) ? 'checked' : '' }}>
                        Active
                    </label>
                </div>
            </div>
            <div style="display:flex;gap:12px;margin-top:8px">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ $faq->exists ? 'Update' : 'Save' }}</button>
                <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
