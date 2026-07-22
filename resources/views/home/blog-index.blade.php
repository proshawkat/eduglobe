@extends('layouts.app')
@section('title', 'Blog & News — Denova Education')
@section('description', 'Expert guides, study abroad tips, visa advice and university news from Denova Education.')

@section('content')

@include('partials.header', ['navClass' => 'scrolled'])

{{-- PAGE HERO --}}
<section class="blog-hero-section">
    <div class="container blog-hero-container">
        <span class="blog-hero-badge">
            <i class="fas fa-blog"></i>Latest Insights
        </span>
        <h1 class="blog-hero-title">News & Blog</h1>
        <p class="blog-hero-desc">Expert advice, visa guides, university rankings and tips to help you make informed decisions about studying abroad.</p>

        {{-- Tag Filter --}}
        @if($tags->count())
        <div class="blog-tag-filter">
            <a href="{{ route('blog.index') }}"
               class="blog-tag-btn {{ !$activeTag ? 'active' : '' }}">
                All Posts
            </a>
            @foreach($tags as $tag)
            <a href="{{ route('blog.index', ['tag' => $tag]) }}"
               class="blog-tag-btn {{ $activeTag === $tag ? 'active' : '' }}">
                {{ $tag }}
            </a>
            @endforeach
        </div>
        @endif
    </div>
</section>

{{-- BLOG GRID --}}
<section class="blog-main-section">
    <div class="container">

        @if($posts->count())

        {{-- Featured Post (first one) --}}
        @php $featured = $posts->first(); @endphp
        <a href="{{ route('blog.show', $featured->slug) }}" class="featured-post-grid">
            <div class="featured-post-img-wrapper">
                <img src="{{ $featured->image_url }}" alt="{{ $featured->title }}" class="featured-post-img">
            </div>
            <div class="featured-post-content">
                <div class="featured-post-meta">
                    <span class="featured-post-tag">{{ $featured->tag }}</span>
                    <span class="featured-post-time"><i class="far fa-clock"></i>{{ $featured->read_time }} min read</span>
                </div>
                <h2 class="featured-post-title">{{ $featured->title }}</h2>
                <p class="featured-post-excerpt">{{ $featured->excerpt }}</p>
                <div class="featured-post-footer">
                    <span class="featured-post-date"><i class="far fa-calendar"></i>{{ $featured->published_at?->format('F j, Y') }}</span>
                    <span class="featured-post-readmore">Read More <i class="fas fa-arrow-right"></i></span>
                </div>
            </div>
        </a>

        {{-- Rest of posts grid --}}
        @if($posts->count() > 1)
        <div class="blog-grid">
            @foreach($posts->skip(1) as $post)
            <a href="{{ route('blog.show', $post->slug) }}" class="blog-card" style="display:block;color:inherit;text-decoration:none">
                <div class="blog-img">
                    <img src="{{ $post->image_url }}" alt="{{ $post->title }}">
                </div>
                <div class="blog-body">
                    <span class="blog-tag">{{ $post->tag }}</span>
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->excerpt }}</p>
                    <div class="blog-meta">
                        <span><i class="far fa-calendar"></i> {{ $post->published_at?->format('M j, Y') }}</span>
                        <span><i class="far fa-clock"></i> {{ $post->read_time }} min read</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        @endif

        {{-- Pagination --}}
        @if($posts->hasPages())
        <div class="blog-pagination">
            {{ $posts->appends(['tag' => $activeTag])->links() }}
        </div>
        @endif

        @else
        <div class="blog-empty-state">
            <i class="fas fa-blog blog-empty-icon"></i>
            <p class="blog-empty-text">No blog posts found{{ $activeTag ? " for tag: $activeTag" : '' }}.</p>
            @if($activeTag)
            <a href="{{ route('blog.index') }}" class="blog-empty-link">View all posts</a>
            @endif
        </div>
        @endif
    </div>
</section>

{{-- CTA STRIP --}}
<section class="blog-cta-section">
    <div class="container">
        <h2 class="blog-cta-title">Ready to Start Your Study Abroad Journey?</h2>
        <p class="blog-cta-desc">Book a FREE consultation with our experts today.</p>
        <a href="{{ route('register.page') }}" class="btn btn-primary blog-cta-btn">
            <i class="fas fa-calendar-check"></i> Book FREE Consultation
        </a>
    </div>
</section>

@include('partials.footer')

@endsection


