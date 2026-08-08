<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'phone'     => 'required|string|max:30',
            'uk_phone'  => 'nullable|string|max:30',
            'email'     => 'required|email',
            'address'   => 'required|string|max:500',
            'uk_address'=> 'nullable|string|max:500',
            'hours'     => 'required|string|max:200',
            'facebook'  => 'nullable|url',
            'instagram' => 'nullable|url',
            'whatsapp'  => 'nullable|url',
            'stat_students_target' => 'nullable|numeric',
            'stat_students_suffix' => 'nullable|string|max:5',
            'stat_universities_target' => 'nullable|numeric',
            'stat_universities_suffix' => 'nullable|string|max:5',
            'stat_visa_target' => 'nullable|numeric',
            'stat_visa_suffix' => 'nullable|string|max:5',
            'stat_experience_target' => 'nullable|numeric',
            'stat_experience_suffix' => 'nullable|string|max:5',
            'stat_countries_target' => 'nullable|numeric',
            'stat_countries_suffix' => 'nullable|string|max:5',
        ]);

        foreach ($request->except('_token', '_method') as $key => $value) {
            Setting::set($key, $value);
        }

        return redirect()->back()->with('success', 'Settings saved successfully!');
    }
}
