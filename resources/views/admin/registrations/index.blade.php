@extends('layouts.admin')
@section('page-title', 'Registrations')
@section('content')
<div class="page-header">
    <div><div class="page-title">Registrations</div><div class="breadcrumb">All <span>student applications</span></div></div>
</div>

{{-- Filter Tabs --}}
<div style="display:flex;gap:8px;margin-bottom:20px;flex-wrap:wrap">
    @foreach(['all' => 'All', 'new' => 'New', 'contacted' => 'Contacted', 'in_progress' => 'In Progress', 'completed' => 'Completed'] as $val => $label)
    <a href="{{ route('admin.registrations.index', ['status' => $val]) }}"
       style="padding:7px 16px;border-radius:8px;font-size:.8rem;font-weight:600;border:1.5px solid {{ $filter === $val ? '#7c3aed' : '#e2e8f0' }};background:{{ $filter === $val ? '#7c3aed' : '#fff' }};color:{{ $filter === $val ? '#fff' : '#374151' }};transition:all .2s">
        {{ $label }}
    </a>
    @endforeach
</div>

<div class="card">
    <div class="table-wrap">
        @if($registrations->count())
        <table>
            <thead><tr><th>#</th><th>Name</th><th>Phone</th><th>Email</th><th>Country</th><th>Level</th><th>Status</th><th>Date</th><th>Actions</th></tr></thead>
            <tbody>
                @foreach($registrations as $r)
                <tr>
                    <td style="color:#94a3b8;font-size:.8rem">{{ $r->id }}</td>
                    <td style="font-weight:600">{{ $r->name }}</td>
                    <td>{{ $r->phone }}</td>
                    <td style="color:#7c3aed;font-size:.85rem">{{ $r->email }}</td>
                    <td style="font-size:.85rem">{{ $r->country ?? '—' }}</td>
                    <td style="font-size:.8rem">{{ $r->study_level ?? '—' }}</td>
                    <td><span class="badge badge-{{ $r->status }}">{{ ucfirst(str_replace('_',' ',$r->status)) }}</span></td>
                    <td style="font-size:.78rem;color:#94a3b8">{{ $r->created_at->format('d M Y') }}</td>
                    <td style="display:flex;gap:6px">
                        <a href="{{ route('admin.registrations.show', $r) }}" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i></a>
                        <form action="{{ route('admin.registrations.destroy', $r) }}" method="POST" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="padding:16px 24px">{{ $registrations->appends(['status' => $filter])->links() }}</div>
        @else
        <div class="empty-state"><i class="fas fa-users"></i>No registrations found.</div>
        @endif
    </div>
</div>
@endsection
