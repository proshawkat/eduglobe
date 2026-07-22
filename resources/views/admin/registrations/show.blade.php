@extends('layouts.admin')
@section('page-title', 'Registration Detail')
@section('content')
<div class="page-header">
    <div>
        <div class="page-title">Registration #{{ $registration->id }}</div>
        <div class="breadcrumb"><a href="{{ route('admin.registrations.index') }}" style="color:#7c3aed">Registrations</a> / <span>Detail</span></div>
    </div>
    <a href="{{ route('admin.registrations.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
</div>

<div style="display:grid;grid-template-columns:1fr 340px;gap:20px;align-items:start">
    {{-- Main Info --}}
    <div class="card">
        <div class="card-header"><div class="card-title"><i class="fas fa-user" style="color:#7c3aed;margin-right:8px"></i>Student Information</div></div>
        <div class="card-body">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px">
                <div>
                    <div style="font-size:.75rem;font-weight:700;color:#94a3b8;text-transform:uppercase;margin-bottom:4px">Full Name</div>
                    <div style="font-weight:600;font-size:1rem">{{ $registration->name }}</div>
                </div>
                <div>
                    <div style="font-size:.75rem;font-weight:700;color:#94a3b8;text-transform:uppercase;margin-bottom:4px">Phone</div>
                    <div style="font-weight:600">{{ $registration->phone }}</div>
                </div>
                <div>
                    <div style="font-size:.75rem;font-weight:700;color:#94a3b8;text-transform:uppercase;margin-bottom:4px">Email</div>
                    <div style="color:#7c3aed;font-weight:600">{{ $registration->email }}</div>
                </div>
                <div>
                    <div style="font-size:.75rem;font-weight:700;color:#94a3b8;text-transform:uppercase;margin-bottom:4px">Preferred Country</div>
                    <div style="font-weight:600">{{ $registration->country ?? 'Not specified' }}</div>
                </div>
                <div>
                    <div style="font-size:.75rem;font-weight:700;color:#94a3b8;text-transform:uppercase;margin-bottom:4px">Study Level</div>
                    <div style="font-weight:600">{{ $registration->study_level ?? 'Not specified' }}</div>
                </div>
                <div>
                    <div style="font-size:.75rem;font-weight:700;color:#94a3b8;text-transform:uppercase;margin-bottom:4px">Submitted On</div>
                    <div style="font-weight:600">{{ $registration->created_at->format('d M Y, h:i A') }}</div>
                </div>
            </div>
            @if($registration->message)
            <div style="margin-top:20px;padding:16px;background:#f8fafc;border-radius:8px;border:1px solid #e2e8f0">
                <div style="font-size:.75rem;font-weight:700;color:#94a3b8;text-transform:uppercase;margin-bottom:8px">Message</div>
                <p style="font-size:.9rem;color:#374151;line-height:1.7">{{ $registration->message }}</p>
            </div>
            @endif
        </div>
    </div>

    {{-- Status Update --}}
    <div class="card">
        <div class="card-header"><div class="card-title"><i class="fas fa-tasks" style="color:#7c3aed;margin-right:8px"></i>Update Status</div></div>
        <div class="card-body">
            <div style="margin-bottom:16px">
                <span class="badge badge-{{ $registration->status }}" style="font-size:.85rem;padding:6px 14px">
                    Current: {{ ucfirst(str_replace('_',' ',$registration->status)) }}
                </span>
            </div>
            <form action="{{ route('admin.registrations.updateStatus', $registration) }}" method="POST">
                @csrf @method('PATCH')
                <div class="form-group">
                    <label class="form-label">Change Status</label>
                    <select name="status" class="form-control">
                        <option value="new"         {{ $registration->status === 'new'         ? 'selected' : '' }}>🔵 New</option>
                        <option value="contacted"   {{ $registration->status === 'contacted'   ? 'selected' : '' }}>🟡 Contacted</option>
                        <option value="in_progress" {{ $registration->status === 'in_progress' ? 'selected' : '' }}>🟢 In Progress</option>
                        <option value="completed"   {{ $registration->status === 'completed'   ? 'selected' : '' }}>✅ Completed</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center"><i class="fas fa-save"></i> Update Status</button>
            </form>
            <div style="margin-top:16px;padding-top:16px;border-top:1px solid #e2e8f0">
                <a href="tel:{{ $registration->phone }}" class="btn btn-success" style="width:100%;justify-content:center;margin-bottom:8px"><i class="fas fa-phone"></i> Call Now</a>
                <a href="mailto:{{ $registration->email }}" class="btn btn-secondary" style="width:100%;justify-content:center"><i class="fas fa-envelope"></i> Send Email</a>
            </div>
        </div>
    </div>
</div>
@endsection
