@extends('layouts.admin')
@section('page-title', 'Blog Posts')
@section('content')
<div class="page-header">
    <div><div class="page-title">Blog Posts</div><div class="breadcrumb">Manage <span>all articles</span></div></div>
    <a href="{{ route('admin.blog.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> New Post</a>
</div>
<div class="card">
    <div class="table-wrap">
        @if($posts->count())
        <table>
            <thead><tr><th>#</th><th>Title</th><th>Tag</th><th>Read Time</th><th>Published</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
                @foreach($posts as $p)
                <tr>
                    <td style="color:#94a3b8;font-size:.8rem">{{ $p->id }}</td>
                    <td style="font-weight:600;max-width:280px">{{ Str::limit($p->title, 60) }}</td>
                    <td><span class="badge badge-active" style="background:#eff6ff;color:#1d4ed8;border-color:#bfdbfe">{{ $p->tag }}</span></td>
                    <td style="font-size:.8rem">{{ $p->read_time }} min</td>
                    <td style="font-size:.8rem;color:#64748b">{{ $p->published_at?->format('d M Y') ?? '—' }}</td>
                    <td><span class="badge badge-{{ $p->is_active ? 'active' : 'inactive' }}">{{ $p->is_active ? 'Published' : 'Draft' }}</span></td>
                    <td style="display:flex;gap:8px">
                        <a href="{{ route('admin.blog.edit', $p) }}" class="btn btn-secondary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                        <form action="{{ route('admin.blog.destroy', $p) }}" method="POST" onsubmit="return confirm('Delete this post?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="empty-state"><i class="fas fa-blog"></i>No blog posts found.</div>
        @endif
    </div>
</div>
@endsection
