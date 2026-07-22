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
            'email'     => 'required|email',
            'address'   => 'required|string|max:500',
            'hours'     => 'required|string|max:200',
            'facebook'  => 'nullable|url',
            'instagram' => 'nullable|url',
            'whatsapp'  => 'nullable|url',
        ]);

        foreach ($request->except('_token', '_method') as $key => $value) {
            Setting::set($key, $value);
        }

        return redirect()->back()->with('success', 'Settings saved successfully!');
    }
}
