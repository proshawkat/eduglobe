@extends('layouts.app')

@section('title', 'Denova Education | Best Study Abroad Consultants in Bangladesh')

@section('content')

@include('partials.header')

{{-- HERO SECTION --}}
<section class="hero" id="hero">
    <div class="hero-bg">
        <div class="hero-slide active">
            <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=1600&q=80" alt="Students Study">
        </div>
        <div class="hero-slide">
            <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=1600&q=80" alt="University Campus">
        </div>
        <div class="hero-slide">
            <img src="https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?w=1600&q=80" alt="Graduation Day">
        </div>
    </div>
    <div class="container">
        <div class="hero-content">
            <h1>Your Dream of <span>Studying Abroad</span> Starts Here</h1>
            <p>Expert guidance from application to arrival. We've helped thousands of students secure admissions at top universities worldwide.</p>
            <div class="hero-btns">
                    <a href="{{ route('register.page') }}" class="btn btn-primary"><i class="fas fa-calendar-check"></i> Book FREE Consultation</a>
                    <a href="#destinations" class="btn btn-outline"><i class="fas fa-globe"></i> Explore Destinations</a>
            </div>
        </div>
    </div>
    <div class="hero-indicators">
        <span class="active"></span><span></span><span></span>
    </div>
</section>

{{-- STATS SECTION --}}
<section class="stats">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number" data-target="15000" data-suffix="+">0</div>
                <div class="stat-label">Students Placed</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="500" data-suffix="+">0</div>
                <div class="stat-label">Partner Universities</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="96.5" data-suffix="%">0</div>
                <div class="stat-label">Visa Success Rate</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="18" data-suffix="+">0</div>
                <div class="stat-label">Years Experience</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="11" data-suffix="">0</div>
                <div class="stat-label">Countries</div>
            </div>
        </div>
    </div>
</section>

{{-- ABOUT SECTION --}}
<section class="about" id="about">
    <div class="container">
        <div class="about-grid">
            <div class="about-img">
                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=800&q=80" alt="About Us">
                <div class="about-badge">Since 2006</div>
            </div>
            <div class="about-text">
                <span class="section-tag">Who We Are</span>
                <h2 class="section-title">Your Trusted Study Abroad Partner</h2>
                <p>Denova Education is one of the leading education consultancy firms in Bangladesh, helping students achieve their dreams of studying abroad since 2006.</p>
                <p>As a government-registered and ICEF-accredited agency, we partner with 500+ renowned universities across 11 countries to offer personalized guidance for every student.</p>
                <div class="about-features">
                    <div class="about-feature"><div class="icon"><i class="fas fa-check"></i></div> ICEF Accredited</div>
                    <div class="about-feature"><div class="icon"><i class="fas fa-check"></i></div> Govt. Registered</div>
                    <div class="about-feature"><div class="icon"><i class="fas fa-check"></i></div> Free Counselling</div>
                    <div class="about-feature"><div class="icon"><i class="fas fa-check"></i></div> Visa Experts</div>
                </div>
                <a href="#registernow" class="btn btn-dark"><i class="fas fa-arrow-right"></i> Learn More</a>
            </div>
        </div>
    </div>
</section>

{{-- DESTINATIONS --}}
<section class="destinations" id="destinations">
    <div class="container">
        <div class="text-center">
            <span class="section-tag">Study Destinations</span>
            <h2 class="section-title">Choose Your Dream Destination</h2>
            <p class="section-subtitle">We partner with top universities across the globe. Pick a destination and start your journey.</p>
        </div>
        <div class="dest-grid">
            @foreach($destinations as $d)
            <div class="dest-card">
                <div class="dest-card-img" onclick="toggleDestCard(this)">
                    <img src="{{ $d->image_url }}" alt="{{ $d->name }}">
                    @if($d->country_code)
                    <span class="flag"><img src="https://flagcdn.com/w20/{{ $d->country_code }}.png" alt="{{ $d->name }}" style="border-radius:3px;box-shadow:0 2px 6px rgba(0,0,0,.3)"></span>
                    @else
                    <span class="flag">{{ $d->flag }}</span>
                    @endif
                    <div class="dest-card-overlay-title">
                        <h3>
                            @if($d->country_code)<img src="https://flagcdn.com/w20/{{ $d->country_code }}.png" alt="" style="vertical-align:middle;margin-right:6px;border-radius:2px">@else{{ $d->flag }}@endif
                            {{ $d->name }}
                        </h3>
                        <i class="fas fa-chevron-down dest-chevron"></i>
                    </div>
                </div>
                <div class="dest-card-body">
                    <h3>
                        @if($d->country_code)<img src="https://flagcdn.com/w20/{{ $d->country_code }}.png" alt="" style="vertical-align:middle;margin-right:6px;border-radius:2px">@endif
                        {{ $d->name }}
                    </h3>
                    <p>{{ $d->description }}</p>
                    <a href="{{ route('study-abroad.show', $d->slug) }}" class="dest-link">Explore <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- SERVICES --}}
<section class="services" id="services">
    <div class="container">
        <div class="text-center">
            <span class="section-tag">Our Services</span>
            <h2 class="section-title">End-to-End Support for Your Journey</h2>
            <p class="section-subtitle">From your first consultation to landing at your dream university, we handle everything.</p>
        </div>
        <div class="services-grid">
            @foreach($services as $s)
            <div class="service-card">
                <div class="service-icon"><i class="fas {{ $s->icon }}"></i></div>
                <h3>{{ $s->title }}</h3>
                <p>{{ $s->description }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- PROCESS --}}
<section class="process" id="process">
    <div class="container">
        <div class="text-center">
            <span class="section-tag">How It Works</span>
            <h2 class="section-title">Your Journey in 4 Simple Steps</h2>
            <p class="section-subtitle">We make the entire process smooth and stress-free from start to finish.</p>
        </div>
        <div class="process-grid">
            <div class="process-step"><div class="step-num">1</div><h3>Free Counselling</h3><p>Meet our experts to assess your goals, eligibility, and budget for studying abroad.</p></div>
            <div class="process-step"><div class="step-num">2</div><h3>University Application</h3><p>We help you select the best university and handle the entire application process.</p></div>
            <div class="process-step"><div class="step-num">3</div><h3>Visa Approval</h3><p>Complete visa support including documentation, mock interviews, and submission.</p></div>
            <div class="process-step"><div class="step-num">4</div><h3>Fly & Settle</h3><p>Pre-departure briefing, airport assistance, and accommodation support at destination.</p></div>
        </div>
    </div>
</section>

{{-- UNIVERSITIES --}}
<section class="universities">
    <div class="container">
        <div class="text-center">
            <span class="section-tag">Our Partners</span>
            <h2 class="section-title">500+ Partner Universities Worldwide</h2>
        </div>
    </div>
    <div class="uni-track">
        <div class="uni-slider">
            @php
                $unis = ['University of Oxford','University of Melbourne','University of Toronto','Harvard University','University of Auckland','MIT','Cambridge','McGill University','University of Sydney','Monash University','UCL London','York University','La Trobe University','University of Alberta','University of Windsor','CQU Australia','Griffith University','University of Hull'];
            @endphp
            @foreach(array_merge($unis, $unis) as $u)
            <div class="uni-logo">{{ $u }}</div>
            @endforeach
        </div>
    </div>
</section>

{{-- TESTIMONIALS --}}
<section class="testimonials" id="testimonials">
    <div class="container">
        <div class="text-center">
            <span class="section-tag">Student Stories</span>
            <h2 class="section-title">What Our Students Say</h2>
            <p class="section-subtitle">Hear from students who achieved their dreams through our guidance.</p>
        </div>
        <div class="test-slider">
            <div class="test-track">
                @php $chunks = $testimonials->chunk(3); @endphp
                @foreach($chunks as $chunk)
                <div class="test-card">
                    @foreach($chunk as $t)
                    <div class="test-item">
                        <div class="test-stars">★★★★★</div>
                        <p>"{{ $t->text }}"</p>
                        <div class="test-author">
                            <div class="test-avatar">{{ $t->initial }}</div>
                            <div class="test-info">
                                <h4>{{ $t->name }}</h4>
                                <span>{{ $t->university }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
        <div class="test-nav">
            <button class="test-prev"><i class="fas fa-chevron-left"></i></button>
            <button class="test-next"><i class="fas fa-chevron-right"></i></button>
        </div>
    </div>
</section>

{{-- SCHOLARSHIPS --}}
<section class="scholarships" id="scholarships">
    <div class="container">
        <div class="text-center">
            <span class="section-tag">Financial Aid</span>
            <h2 class="section-title">Scholarship & Funding Opportunities</h2>
            <p class="section-subtitle">Discover ways to fund your studies with various scholarships available for international students.</p>
        </div>
        <div class="scholar-grid">
            <div class="scholar-card"><div class="scholar-icon">🏛️</div><h3>Country-Specific Scholarships</h3><p>Government-funded scholarships from UK, Australia, Canada, and other countries specifically for Bangladeshi students.</p></div>
            <div class="scholar-card"><div class="scholar-icon">🏆</div><h3>Merit-Based Scholarships</h3><p>Awards for outstanding academic performance and extracurricular achievements from partner universities worldwide.</p></div>
            <div class="scholar-card"><div class="scholar-icon">🎓</div><h3>Fully Funded Scholarships</h3><p>Secure your studies with scholarships that cover full tuition, living expenses, and travel costs for deserving students.</p></div>
        </div>
    </div>
</section>

{{-- EVENTS --}}
<section class="events" id="events">
    <div class="container">
        <div class="text-center">
            <span class="section-tag">Upcoming Events</span>
            <h2 class="section-title">Meet Us at Our Next Event</h2>
            <p class="section-subtitle">Join our education expos, spot assessments, and counselling sessions.</p>
        </div>
        <div class="events-grid">
            @foreach($events as $e)
            <div class="event-card">
                <div class="event-date-bar">
                    <span class="day">{{ $e->event_date->format('d') }}</span>
                    <span class="month-year">{{ $e->event_date->format('M') }}<br>{{ $e->event_date->format('Y') }}</span>
                </div>
                <div class="event-body">
                    <h3>{{ $e->title }}</h3>
                    <p>{{ $e->description }}</p>
                    <a href="{{ route('register.page') }}" class="btn btn-primary">Register Now</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- BLOG --}}
<section class="blog" id="blog">
    <div class="container">
        <div class="text-center">
            <span class="section-tag">Latest Insights</span>
            <h2 class="section-title">News & Blog</h2>
            <p class="section-subtitle">Expert advice, trends, and guides to help you make informed decisions.</p>
        </div>
        <div class="blog-grid">
            @foreach($blogs as $b)
            <a href="{{ route('blog.show', $b->slug) }}" class="blog-card" style="display:block;color:inherit;text-decoration:none">
                <div class="blog-img">
                    <img src="{{ $b->image_url }}" alt="{{ $b->title }}">
                </div>
                <div class="blog-body">
                    <span class="blog-tag">{{ $b->tag }}</span>
                    <h3>{{ $b->title }}</h3>
                    <p>{{ $b->excerpt }}</p>
                    <div class="blog-meta">
                        <span><i class="far fa-calendar"></i> {{ $b->published_at?->format('M j, Y') }}</span>
                        <span><i class="far fa-clock"></i> {{ $b->read_time }} min read</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <div style="text-align:center; margin-top:40px;">
            <a href="{{ route('blog.index') }}" class="btn btn-outline" style="padding: 10px 24px; font-weight: 600;">View All Posts <i class="fas fa-arrow-right" style="margin-left:5px"></i></a>
        </div>
    </div>
</section>

{{-- FAQ --}}
<section class="faq" id="faq">
    <div class="container">
        <div class="text-center">
            <span class="section-tag">FAQ</span>
            <h2 class="section-title">Frequently Asked Questions</h2>
            <p class="section-subtitle">Find answers to common questions about studying abroad.</p>
        </div>
        <div class="faq-list">
            @foreach($faqs as $f)
            <div class="faq-item">
                <div class="faq-q">
                    <span>{{ $f->question }}</span>
                    <span class="icon"><i class="fas fa-chevron-down"></i></span>
                </div>
                <div class="faq-a">
                    <div class="faq-a-inner">{{ $f->answer }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="cta-section">
    <div class="container">
        <h2>Ready to Start Your Journey?</h2>
        <p>Book a free consultation with our expert counsellors and take the first step towards your dream university.</p>
        <a href="#registernow" class="btn btn-primary" style="font-size:1.05rem;padding:16px 40px">
            <i class="fas fa-calendar-check"></i> Book FREE Consultation
        </a>
    </div>
</section>

{{-- CONTACT / REGISTRATION --}}
<section class="contact" id="registernow">
    <div class="container">
        @if(session('success'))
        <div style="background:#d1fae5;border:1px solid #6ee7b7;color:#065f46;padding:16px 24px;border-radius:12px;margin-bottom:24px;font-weight:600;text-align:center;">
            <i class="fas fa-check-circle" style="margin-right:8px;"></i>{{ session('success') }}
        </div>
        @endif

        <div class="contact-grid" style="align-items:stretch">
            {{-- Google Map — stretches to match contact-info height --}}
            <div style="display:flex;flex-direction:column">
                <div style="border-radius:16px;overflow:hidden;box-shadow:0 4px 24px rgba(48,0,102,.08);border:1px solid #e2e8f0;flex:1;min-height:300px">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.4217!2d90.3718!3d23.7473!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b9007d5aef25%3A0x5b2e2df1e1c9c22a!2sZigatola%2C%20Dhanmondi%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1690000000000"
                        width="100%"
                        height="100%"
                        style="border:0;display:block;min-height:300px"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Denova Education Office Location">
                    </iframe>
                </div>
            </div>

            <div class="contact-info">
                <span class="section-tag">Get In Touch</span>
                <h2 class="section-title" style="font-size:1.8rem">Let's Start Your Journey</h2>
                <p>Visit us at any of our offices or reach out online. We're here to help you every step of the way.</p>
                <div class="info-item">
                    <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div><h4>Dhanmondi Office</h4><p>{{ $settings['address'] ?? '21/4/A, Zigatola, Dhanmondi, Dhaka' }}</p></div>
                </div>
                <div class="info-item">
                    <div class="info-icon"><i class="fas fa-phone"></i></div>
                    <div><h4>Phone</h4><p>{{ $settings['phone'] ?? '+880 1339-883805' }}</p></div>
                </div>
                <div class="info-item">
                    <div class="info-icon"><i class="fas fa-envelope"></i></div>
                    <div><h4>Email</h4><p>{{ $settings['email'] ?? 'info@denovaeducation.com' }}</p></div>
                </div>
                <div class="info-item">
                    <div class="info-icon"><i class="fas fa-clock"></i></div>
                    <div><h4>Working Hours</h4><p>{{ $settings['hours'] ?? 'Saturday - Thursday: 10 AM - 6:30 PM' }}</p></div>
                </div>
                <div style="margin-top:20px">
                    <a href="{{ route('register.page') }}" class="btn btn-primary" style="margin-right:10px"><i class="fas fa-calendar-check"></i> Book Free Consultation</a>
                    <a href="{{ $settings['whatsapp'] ?? 'https://wa.me/8801339883805' }}" target="_blank" class="btn btn-outline" style="background:transparent;border:2px solid #25d366;color:#25d366"><i class="fab fa-whatsapp"></i> WhatsApp</a>
                </div>
            </div>
        </div>
    </div>
</section>

@include('partials.footer')

@endsection
