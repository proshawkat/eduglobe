{{-- FOOTER --}}
<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-about">
                <div class="logo" style="margin-bottom:16px">
                    <img src="{{ asset('public/images/logo.jpg') }}" alt="Denova Education" class="logo-img">
                </div>
                <p>Denova Education is a leading study abroad agency in Bangladesh, guiding students toward a better life abroad through expert higher education consultancy since 2006.</p>
                <div class="footer-socials">
                    <a href="{{ $settings['facebook'] ?? '#' }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ $settings['instagram'] ?? '#' }}" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="{{ $settings['whatsapp'] ?? '#' }}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
            <div class="footer-links">
                <h4>Study Destinations</h4>
                @foreach($destinations as $d)
                <a href="{{ route('study-abroad.show', $d->slug) }}" style="display:inline-flex; align-items:center; gap:6px;">
                    @if($d->country_code)<img src="https://flagcdn.com/w20/{{ $d->country_code }}.png" alt="{{ $d->name }}" style="border-radius:2px">@endif {{ $d->name }}
                </a>
                @endforeach
            </div>
            <div class="footer-links">
                <h4>Quick Links</h4>
                <a href="#about">About Us</a>
                <a href="#services">Our Services</a>
                <a href="#scholarships">Scholarships</a>
                <a href="{{ route('blog.index') }}">Blog</a>
                <a href="#events">Events</a>
                <a href="#faq">FAQ</a>
                <a href="#registernow">Contact Us</a>
            </div>
            <div class="footer-contact">
                <h4>Head Office</h4>
                <div class="item"><span>📍</span><span>{{ $settings['address'] ?? '21/4/A, Zigatola, Dhanmondi, Dhaka, Bangladesh, 1209' }}</span></div>
                <div class="item"><span>📞</span><span>{{ $settings['phone'] ?? '+880 1339-883805' }}</span></div>
                <div class="item"><span>✉️</span><span>{{ $settings['email'] ?? 'info@denovaeducation.com' }}</span></div>
                <div class="item"><span>🕐</span><span>{{ $settings['hours'] ?? 'Sat-Thu: 10AM - 6:30PM' }}</span></div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Denova Education. All Rights Reserved.</p>
        </div>
    </div>
</footer>

{{-- WHATSAPP FLOAT --}}
<a href="{{ $settings['whatsapp'] ?? 'https://wa.me/8801339883805' }}?text=Hi! I'd like to know about studying abroad." class="whatsapp-float" target="_blank">
    <i class="fab fa-whatsapp"></i>
</a>
