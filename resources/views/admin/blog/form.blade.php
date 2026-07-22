@extends('layouts.admin')
@section('page-title', $post->exists ? 'Edit Blog Post' : 'New Blog Post')
@section('content')
<div class="page-header">
    <div>
        <div class="page-title">{{ $post->exists ? 'Edit Blog Post' : 'New Blog Post' }}</div>
        <div class="breadcrumb"><a href="{{ route('admin.blog.index') }}" style="color:#7c3aed">Blog</a> / <span>{{ $post->exists ? 'Edit' : 'New' }}</span></div>
    </div>
</div>
<div class="card">
    <div class="card-header"><div class="card-title">Post Details</div></div>
    <div class="card-body">
        <form action="{{ $post->exists ? route('admin.blog.update', $post) : route('admin.blog.store') }}" method="POST">
            @csrf @if($post->exists) @method('PUT') @endif

            <div class="form-group">
                <label class="form-label">Post Title *</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}" required>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Tag / Category *</label>
                    <input type="text" name="tag" class="form-control" value="{{ old('tag', $post->tag) }}" placeholder="e.g. Study in UK" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Read Time (minutes) *</label>
                    <input type="number" name="read_time" class="form-control" value="{{ old('read_time', $post->read_time ?? 5) }}" min="1" required>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Excerpt (Short Description) *</label>
                <textarea name="excerpt" class="form-control" rows="3" required>{{ old('excerpt', $post->excerpt) }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Full Content</label>
                <textarea name="content" class="form-control" rows="10">{{ old('content', $post->content) }}</textarea>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Image URL</label>
                    <input type="url" name="image_url" class="form-control" value="{{ old('image_url', $post->image_url) }}" placeholder="https://...">
                </div>
                <div class="form-group">
                    <label class="form-label">Publish Date *</label>
                    <input type="datetime-local" name="published_at" class="form-control"
                        value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}" required>
                </div>
            </div>
            <div class="form-group">
                <label class="form-check">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $post->is_active ?? true) ? 'checked' : '' }}>
                    Published (visible on website)
                </label>
            </div>
            <div style="display:flex;gap:12px;margin-top:8px">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ $post->exists ? 'Update Post' : 'Publish Post' }}</button>
                <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
