<?php
// app/Http/Controllers/GeneralSettingController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralSetting;

class GeneralSettingController extends Controller
{
    public function index()
    {
        $settings = GeneralSetting::first();
        return view('dashboard.generals', compact('settings'));
    }

    public function update(Request $request)
{
    $validatedData = $request->validate([
        'website_name' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'tags' => 'nullable|string',
        'phone' => 'nullable|string|max:255',
        'address' => 'nullable|string',
        'email' => 'nullable|string|email|max:255',
        'facebook_link' => 'nullable|url|max:255',
        'youtube_link' => 'nullable|url|max:255',
        'instagram_link' => 'nullable|url|max:255',
        'linkedin_link' => 'nullable|url|max:255',
        'google_map_key' => 'nullable|string|max:255',
        'logo' => 'nullable|image|mimes:png|max:2048', // Add validation for the logo
    ]);

    // Debugging step 1
    // dd($request->all());

    $settings = GeneralSetting::first();

    if ($request->hasFile('logo')) {
        // Handle the logo upload
        if ($settings && $settings->logo && file_exists(public_path($settings->logo))) {
            unlink(public_path($settings->logo)); // Remove the old logo
        }

        $logoName = time() . '.' . $request->logo->extension();
        $request->logo->move(public_path('logos'), $logoName);
        $validatedData['logo'] = 'logos/' . $logoName;
    }

    if ($settings) {
        $settings->update($validatedData);
    } else {
        GeneralSetting::create($validatedData);
    }

    return redirect()->route('dashboard.generals')->with('success', 'Settings updated successfully.');
}


}
