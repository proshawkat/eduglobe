<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Event;
use App\Models\BlogPost;
use App\Models\Faq;
use App\Models\Registration;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalRegistrations'  => Registration::count(),
            'newRegistrations'    => Registration::where('status', 'new')->count(),
            'totalDestinations'   => Destination::count(),
            'totalServices'       => Service::count(),
            'totalBlogPosts'      => BlogPost::count(),
            'totalTestimonials'   => Testimonial::count(),
            'totalEvents'         => Event::count(),
            'totalFaqs'           => Faq::count(),
            'recentRegistrations' => Registration::latest()->take(10)->get(),
        ]);
    }
}
