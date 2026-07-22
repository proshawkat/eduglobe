<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'phone'       => 'required|string|max:20',
            'email'       => 'required|email|max:255',
            'country'     => 'nullable|string|max:100',
            'study_level' => 'nullable|string|max:100',
            'message'     => 'nullable|string|max:2000',
        ]);

        Registration::create($validated);

        return redirect()->back()
            ->with('success', 'Your application has been submitted successfully! Our counsellor will contact you within 24 hours.');
    }
}
