@extends('layouts.app')
@section('title', $post->title . ' — Denova Education')
@section('description', $post->excerpt)

@section('content')

@include('partials.header', ['navClass' => 'scrolled'])

{{-- HERO --}}
<section style="position:relative;height:420px;overflow:hidden;margin-top:70px">
    <img src="{{ $post->image_url }}" alt="{{ $post->title }}"
         style="width:100%;height:100%;object-fit:cover;display:block">
    <div style="position:absolute;inset:0;background:linear-gradient(to bottom,rgba(15,12,41,.2) 0%,rgba(15,12,41,.8) 100%)"></div>
    <div class="container" style="position:absolute;bottom:0;left:50%;transform:translateX(-50%);width:100%;padding-bottom:40px">
        <div style="display:flex;align-items:center;gap:8px;margin-bottom:12px">
            <a href="{{ route('home') }}" style="color:rgba(255,255,255,.6);font-size:.8rem">Home</a>
            <span style="color:rgba(255,255,255,.3)">/</span>
            <a href="{{ route('home') }}#blog" style="color:rgba(255,255,255,.6);font-size:.8rem">Blog</a>
            <span style="color:rgba(255,255,255,.3)">/</span>
            <span style="color:rgba(255,255,255,.7);font-size:.8rem">{{ Str::limit($post->title, 40) }}</span>
        </div>
        <span style="background:rgba(124,58,237,.85);color:#fff;padding:4px 14px;border-radius:20px;font-size:.75rem;font-weight:700;display:inline-block;margin-bottom:12px">{{ $post->tag }}</span>
        <h1 style="color:#fff;font-size:clamp(1.4rem,3.5vw,2.2rem);font-weight:800;line-height:1.3;max-width:700px">{{ $post->title }}</h1>
        <div style="display:flex;gap:20px;margin-top:14px;color:rgba(255,255,255,.65);font-size:.8rem">
            <span><i class="far fa-calendar" style="margin-right:5px"></i>{{ $post->published_at?->format('F j, Y') }}</span>
            <span><i class="far fa-clock" style="margin-right:5px"></i>{{ $post->read_time }} min read</span>
        </div>
    </div>
</section>

{{-- MAIN CONTENT --}}
<section style="padding:60px 0;background:#f8fafc">
    <div class="container">
        <div class="responsive-grid-sidebar-blog">

            {{-- Article --}}
            <div>
                <div style="background:#fff;border-radius:16px;padding:40px;box-shadow:0 4px 24px rgba(48,0,102,.08);border:1px solid #e2e8f0">
                    {{-- Excerpt --}}
                    <p style="font-size:1.05rem;color:#4b5563;line-height:1.8;border-left:4px solid #7c3aed;padding-left:18px;margin-bottom:28px;font-style:italic">
                        {{ $post->excerpt }}
                    </p>
                    {{-- Content --}}
                    <div style="line-height:1.85;color:#374151;font-size:.95rem" class="blog-content">
                        @if($post->content)
                            {!! $post->content !!}
                        @else
                            <p>{{ $post->excerpt }}</p>
                        @endif
                    </div>
                </div>

            </div>

            {{-- Sidebar --}}
            <div style="position:sticky;top:90px">
                {{-- CTA --}}
                <div style="background:linear-gradient(135deg,#7c3aed,#a855f7);border-radius:16px;padding:24px;color:#fff;text-align:center;margin-bottom:20px;box-shadow:0 8px 24px rgba(124,58,237,.35)">
                    <div style="font-size:2rem;margin-bottom:8px">🎓</div>
                    <h3 style="font-size:1rem;font-weight:800;margin-bottom:8px">Ready to Study Abroad?</h3>
                    <p style="font-size:.82rem;opacity:.85;margin-bottom:18px">Book a FREE consultation and start your journey today.</p>
                    <a href="{{ route('register.page') }}"
                       style="display:block;background:#fff;color:#7c3aed;padding:10px 20px;border-radius:8px;font-weight:700;font-size:.875rem"
                       onmouseover="this.style.background='#f3f4f6'" onmouseout="this.style.background='#fff'">
                        <i class="fas fa-calendar-check" style="margin-right:6px"></i>Book FREE Consultation
                    </a>
                </div>

                {{-- Related Posts --}}
                @if($related->count())
                <div style="background:#fff;border-radius:16px;padding:20px;box-shadow:0 4px 24px rgba(48,0,102,.08);border:1px solid #e2e8f0">
                    <h4 style="font-size:.9rem;font-weight:700;margin-bottom:16px;color:#1e293b">More Articles</h4>
                    @foreach($related as $r)
                    <a href="{{ route('blog.show', $r->slug) }}"
                       style="display:flex;gap:12px;padding:10px;border-radius:8px;transition:background .2s;margin-bottom:4px;text-decoration:none"
                       onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
                        <img src="{{ $r->image_url }}" alt="{{ $r->title }}"
                             style="width:60px;height:50px;object-fit:cover;border-radius:6px;flex-shrink:0">
                        <div>
                            <span style="font-size:.65rem;background:#eff6ff;color:#1d4ed8;padding:2px 8px;border-radius:10px;font-weight:700">{{ $r->tag }}</span>
                            <div style="font-size:.8rem;font-weight:600;color:#1e293b;margin-top:4px;line-height:1.4">{{ Str::limit($r->title, 55) }}</div>
                            <div style="font-size:.7rem;color:#94a3b8;margin-top:3px"><i class="far fa-clock"></i> {{ $r->read_time }} min read</div>
                        </div>
                    </a>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@include('partials.footer')

@endsection

@push('styles')
<style>
.blog-content h2{font-size:1.3rem;font-weight:700;color:#1e293b;margin:24px 0 12px;padding-bottom:8px;border-bottom:2px solid #e2e8f0}
.blog-content h3{font-size:1.1rem;font-weight:700;color:#1e293b;margin:20px 0 10px}
.blog-content p{margin-bottom:16px;line-height:1.85}
.blog-content ul,.blog-content ol{padding-left:24px;margin-bottom:16px}
.blog-content li{margin-bottom:8px;line-height:1.7}
.blog-content strong{color:#1e293b}
</style>
@endpush
