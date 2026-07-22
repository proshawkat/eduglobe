<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — Denova Education</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@700;800&display=swap');
        *{margin:0;padding:0;box-sizing:border-box}
        body{font-family:'Inter',sans-serif;min-height:100vh;display:flex;align-items:center;justify-content:center;
            background:linear-gradient(135deg,#0f0c29 0%,#302b63 50%,#24243e 100%);position:relative;overflow:hidden}
        body::before{content:'';position:absolute;inset:0;
            background:radial-gradient(circle at 20% 50%,rgba(124,58,237,.15) 0%,transparent 50%),
                       radial-gradient(circle at 80% 20%,rgba(168,85,247,.1) 0%,transparent 50%);
        }
        .login-wrap{
            background:rgba(255,255,255,.97);border-radius:20px;padding:48px 44px;
            width:100%;max-width:420px;position:relative;z-index:1;
            box-shadow:0 24px 80px rgba(0,0,0,.4);
        }
        .login-brand{text-align:center;margin-bottom:32px}
        .brand-icon{
            width:60px;height:60px;border-radius:16px;margin:0 auto 14px;
            background:linear-gradient(135deg,#7c3aed,#a855f7);
            display:flex;align-items:center;justify-content:center;font-size:1.5rem;color:#fff;
            box-shadow:0 8px 24px rgba(124,58,237,.3);
        }
        .brand-title{font-family:'Plus Jakarta Sans',sans-serif;font-size:1.4rem;font-weight:800;color:#1e293b}
        .brand-sub{font-size:.85rem;color:#64748b;margin-top:4px}
        .form-group{margin-bottom:18px}
        .form-label{display:block;font-size:.8rem;font-weight:700;color:#374151;margin-bottom:6px;letter-spacing:.03em;text-transform:uppercase}
        .input-wrap{position:relative}
        .input-icon{position:absolute;left:14px;top:50%;transform:translateY(-50%);color:#94a3b8;font-size:.9rem}
        .form-control{
            width:100%;padding:11px 14px 11px 40px;
            border:1.5px solid #e2e8f0;border-radius:10px;font-size:.9rem;
            color:#1e293b;background:#f8fafc;outline:none;transition:all .2s;
        }
        .form-control:focus{border-color:#7c3aed;background:#fff;box-shadow:0 0 0 3px rgba(124,58,237,.12)}
        .form-error{color:#dc2626;font-size:.78rem;margin-top:5px}
        .btn-login{
            width:100%;padding:13px;border-radius:10px;border:none;cursor:pointer;
            background:linear-gradient(135deg,#7c3aed,#a855f7);color:#fff;
            font-size:.95rem;font-weight:700;font-family:'Plus Jakarta Sans',sans-serif;
            transition:all .2s;margin-top:8px;
            box-shadow:0 4px 16px rgba(124,58,237,.35);
        }
        .btn-login:hover{opacity:.92;transform:translateY(-1px);box-shadow:0 6px 20px rgba(124,58,237,.45)}
        .back-link{text-align:center;margin-top:20px;font-size:.82rem;color:#64748b}
        .back-link a{color:#7c3aed;font-weight:600}
        .remember-row{display:flex;align-items:center;gap:8px;font-size:.82rem;color:#374151;margin-bottom:4px}
        .remember-row input{accent-color:#7c3aed}
    </style>
</head>
<body>
<div class="login-wrap">
    <div class="login-brand">
        <div class="brand-icon"><i class="fas fa-graduation-cap"></i></div>
        <div class="brand-title">Admin Panel</div>
        <div class="brand-sub">Denova Education Control Center</div>
    </div>

    @if($errors->any())
    <div style="background:#fef2f2;border:1px solid #fecaca;color:#dc2626;padding:12px 14px;border-radius:8px;font-size:.82rem;margin-bottom:18px;display:flex;align-items:center;gap:8px">
        <i class="fas fa-exclamation-circle"></i> {{ $errors->first() }}
    </div>
    @endif

    <form action="{{ route('admin.login.post') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="form-label">Email Address</label>
            <div class="input-wrap">
                <i class="fas fa-envelope input-icon"></i>
                <input type="email" name="email" class="form-control" placeholder="admin@denova.com" value="{{ old('email') }}" required autofocus>
            </div>
            @error('email')<div class="form-error">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label class="form-label">Password</label>
            <div class="input-wrap">
                <i class="fas fa-lock input-icon"></i>
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
            </div>
        </div>
        <div class="remember-row">
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember me</label>
        </div>
        <button type="submit" class="btn-login"><i class="fas fa-sign-in-alt" style="margin-right:8px"></i>Sign In</button>
    </form>

    <div class="back-link">
        <a href="{{ route('home') }}"><i class="fas fa-arrow-left" style="margin-right:4px"></i>Back to Website</a>
    </div>
</div>
</body>
</html>
