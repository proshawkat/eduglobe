<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index()
    {
        return view('admin.destinations.index', ['destinations' => Destination::orderBy('order')->get()]);
    }

    public function create()
    {
        return view('admin.destinations.form', ['destination' => new Destination()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'flag'        => 'required|string|max:10',
            'description' => 'required|string',
            'image_url'   => 'required|url',
            'order'       => 'nullable|integer',
        ]);
        Destination::create($request->all());
        return redirect()->route('admin.destinations.index')->with('success', 'Destination added successfully!');
    }

    public function edit(Destination $destination)
    {
        return view('admin.destinations.form', compact('destination'));
    }

    public function update(Request $request, Destination $destination)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'flag'        => 'required|string|max:10',
            'description' => 'required|string',
            'image_url'   => 'required|url',
            'order'       => 'nullable|integer',
        ]);
        $destination->update($request->all());
        return redirect()->route('admin.destinations.index')->with('success', 'Destination updated successfully!');
    }

    public function destroy(Destination $destination)
    {
        $destination->delete();
        return redirect()->route('admin.destinations.index')->with('success', 'Destination deleted!');
    }
}
