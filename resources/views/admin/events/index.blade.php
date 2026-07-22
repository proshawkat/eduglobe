@extends('layouts.admin')
@section('page-title', 'Events')
@section('content')
<div class="page-header">
    <div><div class="page-title">Events</div><div class="breadcrumb">Manage <span>upcoming events</span></div></div>
    <a href="{{ route('admin.events.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Event</a>
</div>
<div class="card">
    <div class="table-wrap">
        @if($events->count())
        <table>
            <thead><tr><th>#</th><th>Date</th><th>Title</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
                @foreach($events as $e)
                <tr>
                    <td style="color:#94a3b8;font-size:.8rem">{{ $e->id }}</td>
                    <td>
                        <div style="text-align:center;background:linear-gradient(135deg,#7c3aed,#a855f7);color:#fff;border-radius:8px;padding:6px 12px;display:inline-block">
                            <div style="font-size:1.2rem;font-weight:800;line-height:1">{{ $e->event_date->format('d') }}</div>
                            <div style="font-size:.65rem;opacity:.85">{{ $e->event_date->format('M Y') }}</div>
                        </div>
                    </td>
                    <td style="font-weight:600">{{ $e->title }}</td>
                    <td><span class="badge badge-{{ $e->is_active ? 'active' : 'inactive' }}">{{ $e->is_active ? 'Active' : 'Inactive' }}</span></td>
                    <td style="display:flex;gap:8px">
                        <a href="{{ route('admin.events.edit', $e) }}" class="btn btn-secondary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                        <form action="{{ route('admin.events.destroy', $e) }}" method="POST" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="empty-state"><i class="fas fa-calendar-alt"></i>No events found.</div>
        @endif
    </div>
</div>
@endsection
