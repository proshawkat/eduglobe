<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') — Denova Education</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpg') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap');
        *{margin:0;padding:0;box-sizing:border-box}
        :root{
            --sidebar-bg:#0f0c29;
            --sidebar-w:260px;
            --accent:#7c3aed;
            --accent-light:#8b5cf6;
            --accent-glow:rgba(124,58,237,.25);
            --topbar-h:64px;
            --text:#1e293b;
            --text-muted:#64748b;
            --border:#e2e8f0;
            --bg:#f8fafc;
            --card:#ffffff;
            --radius:12px;
            --shadow:0 2px 12px rgba(0,0,0,.06);
        }
        body{font-family:'Inter',sans-serif;background:var(--bg);color:var(--text);display:flex;min-height:100vh}
        a{text-decoration:none;color:inherit}

        /* ── Sidebar ── */
        .sidebar{
            width:var(--sidebar-w);
            background:linear-gradient(180deg,#1a0533 0%,#0f0c29 100%);
            position:fixed;top:0;left:0;height:100vh;
            display:flex;flex-direction:column;
            z-index:100;transition:transform .3s ease;
            border-right:1px solid rgba(255,255,255,.06);
        }
        .sidebar-brand{
            padding:24px 20px 20px;
            border-bottom:1px solid rgba(255,255,255,.08);
            display:flex;align-items:center;gap:12px;
        }
        .brand-icon{
            width:40px;height:40px;border-radius:10px;
            background:linear-gradient(135deg,var(--accent),#a855f7);
            display:flex;align-items:center;justify-content:center;
            font-size:1.1rem;color:#fff;flex-shrink:0;
        }
        .brand-text{font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;font-size:1rem;color:#fff;line-height:1.2}
        .brand-text span{color:#a78bfa;font-size:.75rem;font-weight:500;display:block}

        .sidebar-nav{flex:1;padding:16px 12px;overflow-y:auto}
        .nav-section-label{font-size:.65rem;font-weight:700;letter-spacing:.1em;color:rgba(255,255,255,.3);text-transform:uppercase;padding:8px 8px 6px;margin-top:8px}
        .nav-item{
            display:flex;align-items:center;gap:10px;
            padding:10px 12px;border-radius:8px;
            color:rgba(255,255,255,.65);font-size:.875rem;font-weight:500;
            transition:all .2s ease;margin-bottom:2px;cursor:pointer;
        }
        .nav-item:hover{background:rgba(255,255,255,.08);color:#fff}
        .nav-item.active{background:linear-gradient(135deg,var(--accent),#a855f7);color:#fff;box-shadow:0 4px 12px var(--accent-glow)}
        .nav-item i{width:18px;text-align:center;font-size:.9rem}
        .nav-badge{margin-left:auto;background:#ef4444;color:#fff;font-size:.65rem;font-weight:700;padding:2px 7px;border-radius:20px}

        .sidebar-footer{
            padding:16px;border-top:1px solid rgba(255,255,255,.08);
        }
        .admin-info{display:flex;align-items:center;gap:10px;margin-bottom:12px}
        .admin-avatar{
            width:36px;height:36px;border-radius:50%;
            background:linear-gradient(135deg,var(--accent),#a855f7);
            display:flex;align-items:center;justify-content:center;
            color:#fff;font-weight:700;font-size:.9rem;
        }
        .admin-name{color:#fff;font-size:.8rem;font-weight:600}
        .admin-role{color:rgba(255,255,255,.4);font-size:.7rem}
        .logout-btn{
            display:flex;align-items:center;gap:8px;width:100%;
            padding:9px 12px;border-radius:8px;background:rgba(239,68,68,.15);
            color:#fca5a5;font-size:.8rem;font-weight:500;border:none;cursor:pointer;
            transition:all .2s ease;
        }
        .logout-btn:hover{background:rgba(239,68,68,.25);color:#fff}

        /* ── Main ── */
        .main-wrap{margin-left:var(--sidebar-w);flex:1;display:flex;flex-direction:column;min-height:100vh}

        /* ── Topbar ── */
        .admin-topbar{
            height:var(--topbar-h);background:var(--card);
            border-bottom:1px solid var(--border);
            display:flex;align-items:center;justify-content:space-between;
            padding:0 28px;position:sticky;top:0;z-index:50;
            box-shadow:0 1px 8px rgba(0,0,0,.04);
        }
        .topbar-title{font-family:'Plus Jakarta Sans',sans-serif;font-size:1.1rem;font-weight:700;color:var(--text)}
        .topbar-right{display:flex;align-items:center;gap:16px}
        .topbar-btn{
            width:36px;height:36px;border-radius:8px;border:1px solid var(--border);
            background:transparent;display:flex;align-items:center;justify-content:center;
            cursor:pointer;color:var(--text-muted);font-size:.9rem;transition:all .2s;
        }
        .topbar-btn:hover{background:var(--bg);color:var(--accent)}
        .view-site-btn{
            display:flex;align-items:center;gap:6px;padding:8px 16px;border-radius:8px;
            background:linear-gradient(135deg,var(--accent),#a855f7);color:#fff;
            font-size:.8rem;font-weight:600;transition:all .2s;
        }
        .view-site-btn:hover{opacity:.9;transform:translateY(-1px)}

        /* ── Content ── */
        .admin-content{padding:28px;flex:1}

        /* ── Cards ── */
        .card{background:var(--card);border-radius:var(--radius);box-shadow:var(--shadow);border:1px solid var(--border)}
        .card-header{padding:20px 24px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between}
        .card-title{font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;font-size:1rem;color:var(--text)}
        .card-body{padding:24px}

        /* ── Stats ── */
        .stats-row{display:grid;grid-template-columns:repeat(auto-fit,minmax(160px,1fr));gap:16px;margin-bottom:24px}
        .stat-card{
            background:var(--card);border-radius:var(--radius);padding:20px;
            border:1px solid var(--border);box-shadow:var(--shadow);
            display:flex;align-items:center;gap:14px;
        }
        .stat-icon{
            width:48px;height:48px;border-radius:10px;
            display:flex;align-items:center;justify-content:center;font-size:1.2rem;flex-shrink:0;
        }
        .stat-number{font-family:'Plus Jakarta Sans',sans-serif;font-size:1.6rem;font-weight:800;color:var(--text);line-height:1}
        .stat-label{font-size:.75rem;color:var(--text-muted);margin-top:3px;font-weight:500}

        /* ── Table ── */
        .table-wrap{overflow-x:auto}
        table{width:100%;border-collapse:collapse}
        thead th{background:#f8fafc;padding:12px 16px;text-align:left;font-size:.75rem;font-weight:700;color:var(--text-muted);text-transform:uppercase;letter-spacing:.04em;border-bottom:1px solid var(--border)}
        tbody td{padding:14px 16px;border-bottom:1px solid #f1f5f9;font-size:.875rem;vertical-align:middle}
        tbody tr:last-child td{border-bottom:none}
        tbody tr:hover{background:#f8fafc}

        /* ── Buttons ── */
        .btn{display:inline-flex;align-items:center;gap:6px;padding:8px 16px;border-radius:8px;font-weight:600;font-size:.8rem;cursor:pointer;border:none;transition:all .2s;font-family:'Inter',sans-serif}
        .btn-primary{background:linear-gradient(135deg,var(--accent),#a855f7);color:#fff}
        .btn-primary:hover{opacity:.9;transform:translateY(-1px);box-shadow:0 4px 12px var(--accent-glow)}
        .btn-secondary{background:var(--bg);color:var(--text);border:1px solid var(--border)}
        .btn-secondary:hover{background:var(--border)}
        .btn-danger{background:#fef2f2;color:#dc2626;border:1px solid #fecaca}
        .btn-danger:hover{background:#dc2626;color:#fff}
        .btn-success{background:#f0fdf4;color:#16a34a;border:1px solid #bbf7d0}
        .btn-success:hover{background:#16a34a;color:#fff}
        .btn-sm{padding:6px 12px;font-size:.75rem}

        /* ── Form ── */
        .form-group{margin-bottom:18px}
        .form-label{display:block;font-size:.8rem;font-weight:600;color:var(--text-muted);margin-bottom:6px;text-transform:uppercase;letter-spacing:.04em}
        .form-control{
            width:100%;padding:10px 14px;border:1.5px solid var(--border);border-radius:8px;
            font-size:.9rem;font-family:'Inter',sans-serif;color:var(--text);background:#fff;
            transition:border-color .2s,box-shadow .2s;outline:none;
        }
        .form-control:focus{border-color:var(--accent);box-shadow:0 0 0 3px var(--accent-glow)}
        textarea.form-control{min-height:100px;resize:vertical}
        .form-row{display:grid;grid-template-columns:1fr 1fr;gap:16px}
        .form-check{display:flex;align-items:center;gap:8px;font-size:.875rem;font-weight:500}
        .form-check input[type=checkbox]{width:16px;height:16px;accent-color:var(--accent)}

        /* ── Alerts ── */
        .alert{padding:12px 16px;border-radius:8px;font-size:.875rem;margin-bottom:20px;display:flex;align-items:center;gap:8px}
        .alert-success{background:#f0fdf4;color:#15803d;border:1px solid #bbf7d0}
        .alert-error{background:#fef2f2;color:#dc2626;border:1px solid #fecaca}

        /* ── Badge ── */
        .badge{display:inline-flex;align-items:center;padding:3px 10px;border-radius:20px;font-size:.7rem;font-weight:700;letter-spacing:.02em}
        .badge-new{background:#eff6ff;color:#1d4ed8;border:1px solid #bfdbfe}
        .badge-contacted{background:#fefce8;color:#854d0e;border:1px solid #fef08a}
        .badge-in_progress{background:#f0fdf4;color:#15803d;border:1px solid #bbf7d0}
        .badge-completed{background:#f3f4f6;color:#374151;border:1px solid #d1d5db}
        .badge-active{background:#f0fdf4;color:#15803d;border:1px solid #bbf7d0}
        .badge-inactive{background:#fef2f2;color:#dc2626;border:1px solid #fecaca}

        /* ── Page Header ── */
        .page-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:24px}
        .page-title{font-family:'Plus Jakarta Sans',sans-serif;font-size:1.4rem;font-weight:800;color:var(--text)}
        .breadcrumb{font-size:.8rem;color:var(--text-muted);margin-top:2px}
        .breadcrumb span{color:var(--accent);font-weight:600}

        /* ── Empty state ── */
        .empty-state{text-align:center;padding:60px 20px;color:var(--text-muted)}
        .empty-state i{font-size:3rem;margin-bottom:16px;opacity:.3;display:block}

        /* ── Responsive ── */
        @media(max-width:768px){
            .sidebar{transform:translateX(-100%)}
            .sidebar.open{transform:translateX(0)}
            .main-wrap{margin-left:0}
            .form-row{grid-template-columns:1fr}
            .stats-row{grid-template-columns:1fr 1fr}
        }
    </style>
    @stack('styles')
</head>
<body>

{{-- Sidebar --}}
<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon"><i class="fas fa-graduation-cap"></i></div>
        <div class="brand-text">Denova Admin<span>Control Panel</span></div>
    </div>

    <nav class="sidebar-nav">
        <div class="nav-section-label">Main</div>
        <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt"></i> Dashboard
            @php $newCount = \App\Models\Registration::where('status','new')->count(); @endphp
            @if($newCount > 0)<span class="nav-badge">{{ $newCount }}</span>@endif
        </a>
        <a href="{{ route('admin.registrations.index') }}" class="nav-item {{ request()->routeIs('admin.registrations*') ? 'active' : '' }}">
            <i class="fas fa-users"></i> Registrations
        </a>

        <div class="nav-section-label">Content</div>
        <a href="{{ route('admin.destinations.index') }}" class="nav-item {{ request()->routeIs('admin.destinations*') ? 'active' : '' }}">
            <i class="fas fa-globe-asia"></i> Destinations
        </a>
        <a href="{{ route('admin.services.index') }}" class="nav-item {{ request()->routeIs('admin.services*') ? 'active' : '' }}">
            <i class="fas fa-concierge-bell"></i> Services
        </a>
        <a href="{{ route('admin.testimonials.index') }}" class="nav-item {{ request()->routeIs('admin.testimonials*') ? 'active' : '' }}">
            <i class="fas fa-quote-left"></i> Testimonials
        </a>
        <a href="{{ route('admin.events.index') }}" class="nav-item {{ request()->routeIs('admin.events*') ? 'active' : '' }}">
            <i class="fas fa-calendar-alt"></i> Events
        </a>
        <a href="{{ route('admin.blog.index') }}" class="nav-item {{ request()->routeIs('admin.blog*') ? 'active' : '' }}">
            <i class="fas fa-blog"></i> Blog Posts
        </a>
        <a href="{{ route('admin.faqs.index') }}" class="nav-item {{ request()->routeIs('admin.faqs*') ? 'active' : '' }}">
            <i class="fas fa-question-circle"></i> FAQs
        </a>

        <div class="nav-section-label">System</div>
        <a href="{{ route('admin.settings.index') }}" class="nav-item {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
            <i class="fas fa-cog"></i> Settings
        </a>
    </nav>

    <div class="sidebar-footer">
        <div class="admin-info">
            <div class="admin-avatar">{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}</div>
            <div>
                <div class="admin-name">{{ auth()->user()->name ?? 'Admin' }}</div>
                <div class="admin-role">Administrator</div>
            </div>
        </div>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</button>
        </form>
    </div>
</aside>

{{-- Main --}}
<div class="main-wrap">
    <header class="admin-topbar">
        <div style="display:flex;align-items:center;gap:12px">
            <button class="topbar-btn" onclick="document.getElementById('sidebar').classList.toggle('open')">
                <i class="fas fa-bars"></i>
            </button>
            <div class="topbar-title">@yield('page-title', 'Dashboard')</div>
        </div>
        <div class="topbar-right">
            <a href="{{ route('home') }}" target="_blank" class="view-site-btn">
                <i class="fas fa-external-link-alt"></i> View Site
            </a>
        </div>
    </header>

    <main class="admin-content">
        @if(session('success'))
        <div class="alert alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
        @endif
        @if(session('error'))
        <div class="alert alert-error"><i class="fas fa-exclamation-circle"></i> {{ session('error') }}</div>
        @endif

        @yield('content')
    </main>
</div>

@stack('scripts')
</body>
</html>
