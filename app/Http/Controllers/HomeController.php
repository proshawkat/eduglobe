<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Event;
use App\Models\BlogPost;
use App\Models\Faq;
use App\Models\Setting;
use App\Models\University;

class HomeController extends Controller
{
    // ─── Homepage ────────────────────────────────────────────────────────────
    public function index()
    {
        return view('home.index', [
            'destinations'  => Destination::active()->whereNotNull('slug')->get(),
            'services'      => Service::active()->get(),
            'testimonials'  => Testimonial::active()->get(),
            'events'        => Event::active()->get(),
            'blogs'         => BlogPost::active()->take(3)->get(),
            'faqs'          => Faq::active()->get(),
            'settings'      => Setting::pluck('value', 'key'),
            'universities'  => University::active()->get(),
        ]);
    }

    // ─── Dedicated Register Now Page ─────────────────────────────────────────
    public function registerNow()
    {
        return view('home.register', [
            'destinations' => Destination::active()->whereNotNull('slug')->get(),
            'settings'     => Setting::pluck('value', 'key'),
        ]);
    }

    // ─── Destination Detail Page ─────────────────────────────────────────────
    public function showDestination(string $slug)
    {
        $destination  = Destination::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $others       = Destination::active()->where('slug', '!=', $slug)->take(4)->get();
        $settings     = Setting::pluck('value', 'key');
        $destinations = Destination::active()->whereNotNull('slug')->get();
        return view('home.destination-show', compact('destination', 'others', 'settings', 'destinations'));
    }

    // ─── Blog Listing Page ────────────────────────────────────────────────────
    public function showBlogIndex(\Illuminate\Http\Request $request)
    {
        $activeTag = $request->query('tag');
        $query     = BlogPost::active();

        if ($activeTag) {
            $query->where('tag', $activeTag);
        }

        $posts        = $query->latest('published_at')->paginate(9);
        $tags         = BlogPost::active()->distinct()->orderBy('tag')->pluck('tag');
        $destinations = Destination::active()->whereNotNull('slug')->get();
        $settings     = Setting::pluck('value', 'key');

        return view('home.blog-index', compact('posts', 'tags', 'activeTag', 'destinations', 'settings'));
    }

    // ─── Blog Detail Page ─────────────────────────────────────────────────────
    public function showBlog(string $slug)
    {
        $post         = BlogPost::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $related      = BlogPost::active()->where('slug', '!=', $slug)->take(3)->get();
        $settings     = Setting::pluck('value', 'key');
        $destinations = Destination::active()->whereNotNull('slug')->get();
        return view('home.blog-show', compact('post', 'related', 'settings', 'destinations'));
    }
}
