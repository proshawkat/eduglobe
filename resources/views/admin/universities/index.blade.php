@extends('layouts.admin')
@section('page-title', 'Partner Universities')
@section('content')
<div class="page-header">
    <div>
        <div class="page-title">Partner Universities</div>
        <div class="breadcrumb">Manage <span>university slider</span></div>
    </div>
    <a href="{{ route('admin.universities.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add University</a>
</div>

<div class="card">
    <div class="table-wrap">
        @if($universities->count())
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Logo Preview</th>
                    <th>University Name</th>
                    <th>Country</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($universities as $uni)
                <tr>
                    <td style="color:#94a3b8;font-size:.8rem">{{ $uni->id }}</td>
                    <td>
                        @php
                            $logoSrc = $uni->logo_url ?: 'https://ui-avatars.com/api/?name='.urlencode($uni->name).'&background=random&color=fff&size=40';
                        @endphp
                        <img src="{{ $logoSrc }}" alt="{{ $uni->name }}" style="width:40px;height:40px;border-radius:50%;object-fit:cover;">
                    </td>
                    <td style="font-weight:500">{{ $uni->name }}</td>
                    <td style="color:#64748b">{{ $uni->country ?: '—' }}</td>
                    <td>{{ $uni->order }}</td>
                    <td><span class="badge badge-{{ $uni->is_active ? 'active' : 'inactive' }}">{{ $uni->is_active ? 'Active' : 'Inactive' }}</span></td>
                    <td style="display:flex;gap:8px">
                        <a href="{{ route('admin.universities.edit', $uni) }}" class="btn btn-secondary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                        <form action="{{ route('admin.universities.destroy', $uni) }}" method="POST" onsubmit="return confirm('Delete this university?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="empty-state"><i class="fas fa-university"></i> No universities found. Add one to get started.</div>
        @endif
    </div>
</div>
@endsection
