<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\GeneralSetting;


class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $settings = GeneralSetting::first();

        return view('dashboard.profile.index', compact('user','settings'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
    
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'about' => 'nullable|string',
            'company' => 'nullable|string|max:255',
            'job' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'twitter' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Check if a file is uploaded
        if ($request->hasFile('profile_image')) {
            // Ensure the file is valid
            if ($request->file('profile_image')->isValid()) {
                $imageName = time() . '.' . $request->profile_image->extension();
                $request->profile_image->move(public_path('images/profiles'), $imageName);
                $validatedData['profile_image'] = 'images/profiles/' . $imageName;
            } else {
                return redirect()->back()->withErrors(['profile_image' => 'The uploaded file is not valid.']);
            }
        }
    
        // Update the user data
        $user->update($validatedData);
    
        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }
    
    // php artisan storage:link


    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->route('profile.show')->with('error', 'Current password is incorrect.');
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('profile.show')->with('success', 'Password changed successfully.');
    }
}
