@extends('layouts.admin')
@section('page-title', 'Dashboard')

@section('content')
<div class="page-header">
    <div>
        <div class="page-title">Dashboard</div>
        <div class="breadcrumb">Welcome back, <span>{{ auth()->user()->name }}</span>!</div>
    </div>
</div>

{{-- Stats Row --}}
<div class="stats-row">
    <div class="stat-card">
        <div class="stat-icon" style="background:#eff6ff;color:#2563eb"><i class="fas fa-users"></i></div>
        <div>
            <div class="stat-number">{{ $totalRegistrations }}</div>
            <div class="stat-label">Total Registrations</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:#fef2f2;color:#dc2626"><i class="fas fa-bell"></i></div>
        <div>
            <div class="stat-number">{{ $newRegistrations }}</div>
            <div class="stat-label">New (Uncontacted)</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:#f0fdf4;color:#16a34a"><i class="fas fa-globe-asia"></i></div>
        <div>
            <div class="stat-number">{{ $totalDestinations }}</div>
            <div class="stat-label">Destinations</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:#fdf4ff;color:#9333ea"><i class="fas fa-blog"></i></div>
        <div>
            <div class="stat-number">{{ $totalBlogPosts }}</div>
            <div class="stat-label">Blog Posts</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:#fff7ed;color:#ea580c"><i class="fas fa-calendar-alt"></i></div>
        <div>
            <div class="stat-number">{{ $totalEvents }}</div>
            <div class="stat-label">Events</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:#f0f9ff;color:#0284c7"><i class="fas fa-concierge-bell"></i></div>
        <div>
            <div class="stat-number">{{ $totalServices }}</div>
            <div class="stat-label">Services</div>
        </div>
    </div>
</div>

{{-- Quick Actions --}}
<div class="card" style="margin-bottom:24px">
    <div class="card-header">
        <div class="card-title"><i class="fas fa-bolt" style="color:#f59e0b;margin-right:8px"></i>Quick Actions</div>
    </div>
    <div class="card-body" style="display:flex;flex-wrap:wrap;gap:12px">
        <a href="{{ route('admin.destinations.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Destination</a>
        <a href="{{ route('admin.blog.create') }}"         class="btn btn-primary"><i class="fas fa-plus"></i> New Blog Post</a>
        <a href="{{ route('admin.events.create') }}"       class="btn btn-primary"><i class="fas fa-plus"></i> Add Event</a>
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Testimonial</a>
        <a href="{{ route('admin.registrations.index') }}" class="btn btn-secondary"><i class="fas fa-users"></i> View All Registrations</a>
    </div>
</div>

{{-- Recent Registrations --}}
<div class="card">
    <div class="card-header">
        <div class="card-title"><i class="fas fa-clock" style="color:#7c3aed;margin-right:8px"></i>Recent Registrations</div>
        <a href="{{ route('admin.registrations.index') }}" class="btn btn-secondary btn-sm">View All</a>
    </div>
    <div class="table-wrap">
        @if($recentRegistrations->count())
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Country</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentRegistrations as $r)
                <tr>
                    <td style="color:#94a3b8;font-size:.8rem">#{{ $r->id }}</td>
                    <td style="font-weight:600">{{ $r->name }}</td>
                    <td>{{ $r->phone }}</td>
                    <td style="color:#7c3aed">{{ $r->email }}</td>
                    <td>{{ $r->country ?? '—' }}</td>
                    <td><span class="badge badge-{{ $r->status }}">{{ ucfirst(str_replace('_',' ',$r->status)) }}</span></td>
                    <td style="color:#94a3b8;font-size:.8rem">{{ $r->created_at->format('d M Y') }}</td>
                    <td><a href="{{ route('admin.registrations.show', $r) }}" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="empty-state"><i class="fas fa-inbox"></i>No registrations yet.</div>
        @endif
    </div>
</div>
@endsection
