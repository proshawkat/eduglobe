@extends('layouts.admin')
@section('page-title', 'Destinations')

@section('content')
<div class="page-header">
    <div>
        <div class="page-title">Study Destinations</div>
        <div class="breadcrumb">Manage <span>all destinations</span></div>
    </div>
    <a href="{{ route('admin.destinations.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Destination</a>
</div>

<div class="card">
    <div class="table-wrap">
        @if($destinations->count())
        <table>
            <thead>
                <tr><th>#</th><th>Flag</th><th>Name</th><th>Order</th><th>Status</th><th>Actions</th></tr>
            </thead>
            <tbody>
                @foreach($destinations as $d)
                <tr>
                    <td style="color:#94a3b8;font-size:.8rem">{{ $d->id }}</td>
                    <td style="font-size:1.5rem">{{ $d->flag }}</td>
                    <td style="font-weight:600">{{ $d->name }}</td>
                    <td>{{ $d->order }}</td>
                    <td><span class="badge badge-{{ $d->is_active ? 'active' : 'inactive' }}">{{ $d->is_active ? 'Active' : 'Inactive' }}</span></td>
                    <td style="display:flex;gap:8px">
                        <a href="{{ route('admin.destinations.edit', $d) }}" class="btn btn-secondary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                        <form action="{{ route('admin.destinations.destroy', $d) }}" method="POST" onsubmit="return confirm('Delete this destination?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="empty-state"><i class="fas fa-globe"></i>No destinations found. <a href="{{ route('admin.destinations.create') }}" style="color:#7c3aed">Add one</a></div>
        @endif
    </div>
</div>
@endsection
