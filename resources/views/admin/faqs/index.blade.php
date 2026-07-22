@extends('layouts.admin')
@section('page-title', 'FAQs')
@section('content')
<div class="page-header">
    <div><div class="page-title">FAQs</div><div class="breadcrumb">Manage <span>frequently asked questions</span></div></div>
    <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add FAQ</a>
</div>
<div class="card">
    <div class="table-wrap">
        @if($faqs->count())
        <table>
            <thead><tr><th>#</th><th>Question</th><th>Order</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
                @foreach($faqs as $f)
                <tr>
                    <td style="color:#94a3b8;font-size:.8rem">{{ $f->id }}</td>
                    <td style="font-weight:500;max-width:400px">{{ Str::limit($f->question, 80) }}</td>
                    <td>{{ $f->order }}</td>
                    <td><span class="badge badge-{{ $f->is_active ? 'active' : 'inactive' }}">{{ $f->is_active ? 'Active' : 'Inactive' }}</span></td>
                    <td style="display:flex;gap:8px">
                        <a href="{{ route('admin.faqs.edit', $f) }}" class="btn btn-secondary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                        <form action="{{ route('admin.faqs.destroy', $f) }}" method="POST" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="empty-state"><i class="fas fa-question-circle"></i>No FAQs found.</div>
        @endif
    </div>
</div>
@endsection
