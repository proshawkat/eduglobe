<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        return view('admin.testimonials.index', ['testimonials' => Testimonial::orderBy('order')->get()]);
    }

    public function create()
    {
        return view('admin.testimonials.form', ['testimonial' => new Testimonial()]);
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required', 'university' => 'required', 'text' => 'required', 'initial' => 'required|max:3']);
        Testimonial::create($request->all());
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial added!');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.form', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate(['name' => 'required', 'university' => 'required', 'text' => 'required', 'initial' => 'required|max:3']);
        $testimonial->update($request->all());
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated!');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted!');
    }
}
