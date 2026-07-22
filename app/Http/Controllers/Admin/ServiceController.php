<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('admin.services.index', ['services' => Service::orderBy('order')->get()]);
    }

    public function create()
    {
        return view('admin.services.form', ['service' => new Service()]);
    }

    public function store(Request $request)
    {
        $request->validate(['icon' => 'required', 'title' => 'required', 'description' => 'required']);
        Service::create($request->all());
        return redirect()->route('admin.services.index')->with('success', 'Service added successfully!');
    }

    public function edit(Service $service)
    {
        return view('admin.services.form', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate(['icon' => 'required', 'title' => 'required', 'description' => 'required']);
        $service->update($request->all());
        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully!');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted!');
    }
}
