<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {
        $query = Registration::latest();

        if ($request->status && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        return view('admin.registrations.index', [
            'registrations' => $query->paginate(15),
            'filter'        => $request->status ?? 'all',
        ]);
    }

    public function show(Registration $registration)
    {
        return view('admin.registrations.show', compact('registration'));
    }

    public function updateStatus(Request $request, Registration $registration)
    {
        $request->validate(['status' => 'required|in:new,contacted,in_progress,completed']);
        $registration->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'Status updated!');
    }

    public function destroy(Registration $registration)
    {
        $registration->delete();
        return redirect()->route('admin.registrations.index')->with('success', 'Registration deleted!');
    }
}
