@extends('layouts.app')
@section('title', 'Register Now — Denova Education')
@section('description', 'Register with Denova Education for a free consultation. We guide you through every step of studying abroad.')

@section('content')

@include('partials.header', ['navClass' => 'scrolled'])

{{-- PAGE HERO --}}
<section class="register-hero-section">
    <div class="container register-hero-container">
        <span class="register-hero-badge">Free Consultation</span>
        <h1 class="register-hero-title">Register With Us Today</h1>
        <p class="register-hero-desc">Fill out the form below and our expert counsellor will contact you within 24 hours. Consultation is 100% FREE.</p>
    </div>
</section>

{{-- MAIN CONTENT --}}
<section class="register-main-section">
    <div class="container">

        @if(session('success'))
        <div class="register-success-msg">
            <i class="fas fa-check-circle"></i>{{ session('success') }}
        </div>
        @endif

        <div class="register-grid">

            {{-- Registration Form --}}
            <div class="register-form-card">
                <h2 class="register-form-title">Start Your Application</h2>
                <p class="register-form-desc">Our counsellor will review your profile and contact you.</p>

                <form action="{{ route('register.store') }}" method="POST">
                    @csrf
                    <div class="responsive-grid-2">
                        <div>
                            <label class="register-label">Full Name *</label>
                            <input type="text" name="name" placeholder="Your full name" value="{{ old('name') }}" required class="register-input">
                            @error('name')<span class="register-error">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label class="register-label">Phone *</label>
                            <input type="tel" name="phone" placeholder="+880 1XXX-XXXXXX" value="{{ old('phone') }}" required class="register-input">
                        </div>
                    </div>
                    <div class="register-form-group">
                        <label class="register-label">Email *</label>
                        <input type="email" name="email" placeholder="your@email.com" value="{{ old('email') }}" required class="register-input">
                        @error('email')<span class="register-error">{{ $message }}</span>@enderror
                    </div>
                    <div class="responsive-grid-2 register-form-group">
                        <div>
                            <label class="register-label">Preferred Country</label>
                            <select name="country" class="register-input">
                                <option value="">Select Country</option>
                                @foreach($destinations as $d)
                                <option value="{{ $d->name }}" {{ old('country') == $d->name ? 'selected' : '' }}>{{ $d->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="register-label">Study Level</label>
                            <select name="study_level" class="register-input">
                                <option value="">Select Level</option>
                                <option value="Bachelor's" {{ old('study_level') == "Bachelor's" ? 'selected' : '' }}>Bachelor's</option>
                                <option value="Master's"   {{ old('study_level') == "Master's"   ? 'selected' : '' }}>Master's</option>
                                <option value="PhD"        {{ old('study_level') == "PhD"        ? 'selected' : '' }}>PhD</option>
                                <option value="Diploma"    {{ old('study_level') == "Diploma"    ? 'selected' : '' }}>Diploma</option>
                            </select>
                        </div>
                    </div>
                    <div class="register-form-group">
                        <label class="register-label">Message</label>
                        <textarea name="message" rows="4" placeholder="Tell us about your study plans and goals..." class="register-input register-textarea">{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="register-submit-btn">
                        <i class="fas fa-paper-plane"></i> Submit Application
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>
@include('partials.footer')
@endsection


