<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function edit()
    {
        $settings = SiteSetting::pluck('value', 'key');
        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'linkedin_url' => 'nullable|url|max:255',
            'github_url' => 'nullable|url|max:255',
            'email' => 'nullable|email|max:255',
            'cv' => 'nullable|file|mimes:pdf|max:10240',
            'photo' => 'nullable|image|max:4096',
        ]);

        $fields = ['name', 'title', 'bio', 'linkedin_url', 'github_url', 'email'];

        foreach ($fields as $field) {
            SiteSetting::set($field, $request->input($field));
        }

        if ($request->hasFile('cv')) {
            $old = SiteSetting::get('cv_path');
            if ($old) Storage::disk('public')->delete($old);
            $path = $request->file('cv')->store('cv', 'public');
            SiteSetting::set('cv_path', $path);
        }

        if ($request->hasFile('photo')) {
            $old = SiteSetting::get('photo_path');
            if ($old) Storage::disk('public')->delete($old);
            $path = $request->file('photo')->store('photos', 'public');
            SiteSetting::set('photo_path', $path);
        }

        return redirect()->route('admin.settings.edit')->with('success', 'Settings updated successfully.');
    }
}
