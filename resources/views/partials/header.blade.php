{{-- TOP BAR --}}
<div class="topbar">
    <div class="container">
        <div class="topbar-left">
            <a href="tel:{{ $settings['phone'] ?? '+880 1339-883805' }}"><i class="fas fa-phone"></i> {{ $settings['phone'] ?? '+880 1339-883805' }}</a>
            <a href="mailto:{{ $settings['email'] ?? 'info@denovaeducation.com' }}"><i class="fas fa-envelope"></i>{{ $settings['email'] ?? 'info@denovaeducation.com' }}</a>
        </div>
        <div class="topbar-right">
            <a href="{{ $settings['facebook'] ?? '#' }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="{{ $settings['instagram'] ?? '#' }}" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="{{ $settings['whatsapp'] ?? '#' }}" target="_blank"><i class="fab fa-whatsapp"></i></a>
        </div>
    </div>
</div>

{{-- NAVBAR --}}
<nav class="navbar {{ $navClass ?? '' }}" id="navbar">
    <div class="nav-container">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('public/images/logo.jpg') }}" alt="Denova Education" class="logo-img">
            <!-- <div class="logo-text">Denova<span>Education</span></div> -->
        </a>
        <ul class="nav-links" id="navLinks">
            <li><a href="{{ request()->routeIs('home') ? '#hero' : route('home') }}">Home</a></li>
            <li>
                <a href="#">Study Abroad <i class="fas fa-chevron-down" style="font-size:.65rem"></i></a>
                <div class="dropdown">
                    @foreach($destinations ?? [] as $d)
                        <a href="{{ route('study-abroad.show', $d->slug) }}" style="display:inline-flex; align-items:center; gap:6px; {{ (isset($destination) && $d->slug === $destination->slug) ? 'color:var(--accent);font-weight:700' : '' }}">
                            @if($d->country_code)<img src="https://flagcdn.com/w20/{{ $d->country_code }}.png" alt="{{ $d->name }}" style="border-radius:2px">@endif Study in {{ $d->name }}
                        </a>
                    @endforeach
                </div>
            </li>
            <li><a href="{{ request()->routeIs('home') ? '#services' : route('home') . '#services' }}">Services</a></li>
            <li><a href="{{ request()->routeIs('home') ? '#about' : route('home') . '#about' }}">About</a></li>
            <li><a href="{{ route('blog.index') }}" {!! request()->routeIs('blog.*') ? 'style="color:var(--accent);font-weight:700"' : '' !!}>Blog</a></li>
            <li><a href="{{ request()->routeIs('home') ? '#registernow' : route('register.page') }}">Contact</a></li>
            <li class="nav-cta"><a href="{{ route('register.page') }}" class="btn btn-primary" style="color: #fff;padding:10px 24px;font-size:.85rem">Register Now</a></li>
        </ul>
        <div class="hamburger" id="hamburger">
            <span></span><span></span><span></span>
        </div>
    </div>
</nav>
