<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function index()
    {
        return view('admin.universities.index', [
            'universities' => University::orderBy('order')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.universities.form', ['university' => new University()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'logo_url' => 'nullable|url|max:500',
            'country'  => 'nullable|string|max:100',
            'order'    => 'nullable|integer|min:0',
        ]);

        University::create([
            'name'      => $request->name,
            'logo_url'  => $request->logo_url,
            'country'   => $request->country,
            'order'     => $request->order ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.universities.index')->with('success', 'University added!');
    }

    public function edit(University $university)
    {
        return view('admin.universities.form', compact('university'));
    }

    public function update(Request $request, University $university)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'logo_url' => 'nullable|url|max:500',
            'country'  => 'nullable|string|max:100',
            'order'    => 'nullable|integer|min:0',
        ]);

        $university->update([
            'name'      => $request->name,
            'logo_url'  => $request->logo_url,
            'country'   => $request->country,
            'order'     => $request->order ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.universities.index')->with('success', 'University updated!');
    }

    public function destroy(University $university)
    {
        $university->delete();
        return redirect()->route('admin.universities.index')->with('success', 'University deleted!');
    }
}
