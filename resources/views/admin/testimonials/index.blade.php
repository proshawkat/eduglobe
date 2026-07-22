@extends('layouts.admin')
@section('page-title', 'Testimonials')
@section('content')
<div class="page-header">
    <div><div class="page-title">Testimonials</div><div class="breadcrumb">Manage <span>student reviews</span></div></div>
    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Testimonial</a>
</div>
<div class="card">
    <div class="table-wrap">
        @if($testimonials->count())
        <table>
            <thead><tr><th>#</th><th>Student</th><th>University</th><th>Order</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
                @foreach($testimonials as $t)
                <tr>
                    <td style="color:#94a3b8;font-size:.8rem">{{ $t->id }}</td>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px">
                            <div style="width:32px;height:32px;border-radius:50%;background:linear-gradient(135deg,#7c3aed,#a855f7);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:.85rem;flex-shrink:0">{{ $t->initial }}</div>
                            <span style="font-weight:600">{{ $t->name }}</span>
                        </div>
                    </td>
                    <td style="font-size:.8rem;color:#64748b">{{ $t->university }}</td>
                    <td>{{ $t->order }}</td>
                    <td><span class="badge badge-{{ $t->is_active ? 'active' : 'inactive' }}">{{ $t->is_active ? 'Active' : 'Inactive' }}</span></td>
                    <td style="display:flex;gap:8px">
                        <a href="{{ route('admin.testimonials.edit', $t) }}" class="btn btn-secondary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                        <form action="{{ route('admin.testimonials.destroy', $t) }}" method="POST" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="empty-state"><i class="fas fa-quote-left"></i>No testimonials found.</div>
        @endif
    </div>
</div>
@endsection
