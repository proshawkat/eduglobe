@extends('layouts.admin')
@section('page-title', 'Services')
@section('content')
<div class="page-header">
    <div><div class="page-title">Services</div><div class="breadcrumb">Manage <span>all services</span></div></div>
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Service</a>
</div>
<div class="card">
    <div class="table-wrap">
        @if($services->count())
        <table>
            <thead><tr><th>#</th><th>Icon</th><th>Title</th><th>Order</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
                @foreach($services as $s)
                <tr>
                    <td style="color:#94a3b8;font-size:.8rem">{{ $s->id }}</td>
                    <td><i class="fas {{ $s->icon }}" style="font-size:1.2rem;color:#7c3aed"></i></td>
                    <td style="font-weight:600">{{ $s->title }}</td>
                    <td>{{ $s->order }}</td>
                    <td><span class="badge badge-{{ $s->is_active ? 'active' : 'inactive' }}">{{ $s->is_active ? 'Active' : 'Inactive' }}</span></td>
                    <td style="display:flex;gap:8px">
                        <a href="{{ route('admin.services.edit', $s) }}" class="btn btn-secondary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                        <form action="{{ route('admin.services.destroy', $s) }}" method="POST" onsubmit="return confirm('Delete this service?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="empty-state"><i class="fas fa-concierge-bell"></i>No services found.</div>
        @endif
    </div>
</div>
@endsection
