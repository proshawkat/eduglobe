<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        return view('admin.faqs.index', ['faqs' => Faq::orderBy('order')->get()]);
    }

    public function create()
    {
        return view('admin.faqs.form', ['faq' => new Faq()]);
    }

    public function store(Request $request)
    {
        $request->validate(['question' => 'required', 'answer' => 'required']);
        Faq::create($request->all());
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ added!');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faqs.form', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate(['question' => 'required', 'answer' => 'required']);
        $faq->update($request->all());
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ updated!');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ deleted!');
    }
}
