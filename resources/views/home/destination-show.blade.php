@extends('layouts.app')
@section('title', 'Study in ' . $destination->name . ' — Denova Education')
@section('description', $destination->description)

@section('content')

@include('partials.header', ['navClass' => 'scrolled'])

{{-- HERO --}}
<section class="dest-hero-section">
    <img src="{{ $destination->image_url }}" alt="{{ $destination->name }}" class="dest-hero-img">
    <div class="dest-hero-overlay"></div>
    <div class="container dest-hero-container">
        <div class="dest-breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span class="sep">/</span>
            <a href="{{ route('home') }}#destinations">Study Abroad</a>
            <span class="sep">/</span>
            <span class="current">{{ $destination->name }}</span>
        </div>
        <div class="dest-hero-content">
            @if($destination->country_code)
            <img src="https://flagcdn.com/w20/{{ $destination->country_code }}.png" alt="{{ $destination->name }}" class="dest-hero-flag">
            @endif
            <div>
                <h1 class="dest-hero-title">Study in {{ $destination->name }}</h1>
                <p class="dest-hero-desc">{{ $destination->description }}</p>
            </div>
        </div>
    </div>
</section>

{{-- MAIN CONTENT --}}
<section class="dest-main-section">
    <div class="container">
        <div class="responsive-grid-sidebar">

            {{-- Detail Content --}}
            <div>
                <div class="dest-detail-card">
                    <h2 class="dest-detail-title">
                        @if($destination->country_code)
                        <img src="https://flagcdn.com/w20/{{ $destination->country_code }}.png" alt="{{ $destination->name }}">
                        @endif
                        Why Study in {{ $destination->name }}?
                    </h2>
                    <div class="dest-detail-body">
                        {!! nl2br(e($destination->details ?? $destination->description)) !!}
                    </div>
                </div>

                {{-- Quick Facts --}}
                <div class="dest-facts-card">
                    <h3 class="dest-facts-title">
                        @if($destination->country_code)
                        <img src="https://flagcdn.com/w20/{{ $destination->country_code }}.png" alt="{{ $destination->name }}">
                        @endif
                        Quick Facts — {{ $destination->name }}
                    </h3>
                    <div class="responsive-grid-2">
                        <div class="dest-fact-item">
                            <div class="dest-fact-label">Education System</div>
                            <div class="dest-fact-value">World-Class</div>
                        </div>
                        <div class="dest-fact-item">
                            <div class="dest-fact-label">Language</div>
                            <div class="dest-fact-value">English Medium</div>
                        </div>
                        <div class="dest-fact-item">
                            <div class="dest-fact-label">Work Rights</div>
                            <div class="dest-fact-value">Part-time allowed</div>
                        </div>
                        <div class="dest-fact-item">
                            <div class="dest-fact-label">Visa Success</div>
                            <div class="dest-fact-value highlight">96%+ Rate</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="dest-sidebar">
                {{-- Apply CTA --}}
                <div class="dest-cta-card">
                    <div class="dest-cta-icon">
                        @if($destination->country_code)
                        <img src="https://flagcdn.com/w20/{{ $destination->country_code }}.png" alt="{{ $destination->name }}">
                        @else
                        {{ $destination->flag }}
                        @endif
                    </div>
                    <h3 class="dest-cta-title">Ready to Study in {{ $destination->name }}?</h3>
                    <p class="dest-cta-desc">Get a FREE consultation with our expert counsellors today.</p>
                    <a href="{{ route('register.page') }}?country={{ urlencode($destination->name) }}" class="dest-cta-btn">
                        <i class="fas fa-calendar-check"></i>Book FREE Consultation
                    </a>
                </div>

                {{-- Other Destinations --}}
                <div class="dest-others-card">
                    <h4 class="dest-others-title">Explore Other Destinations</h4>
                    @foreach($others->take(5) as $other)
                    <a href="{{ route('study-abroad.show', $other->slug) }}" class="dest-other-link">
                        @if($other->country_code)
                        <img src="https://flagcdn.com/w20/{{ $other->country_code }}.png" alt="{{ $other->name }}">
                        @endif
                        <span class="dest-other-name">Study in {{ $other->name }}</span>
                        <i class="fas fa-chevron-right"></i>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@include('partials.footer')
@endsection
