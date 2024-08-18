<?php
namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\Feature;
use App\Models\TeamMember;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\GeneralSetting;



class AboutUsController extends Controller
{

    public function show()
    {
        $about = AboutUs::first();
        $features = Feature::all();
        $teamMembers = TeamMember::all();
        $settings = GeneralSetting::first();
        $contactus = Contact::all();


        return view('about', compact(['about', 'features', 'teamMembers', 'settings']));
    }
    // Display the About Us page management view
    public function index()
    {
        $about = AboutUs::first();
        $features = Feature::all();
        $teamMembers = TeamMember::all();
        $settings = GeneralSetting::first();

        return view('dashboard.about', compact('about', 'features', 'teamMembers','settings'));
    }

    // Store or update About Us content
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        'button_url' => 'nullable|string',
    ]);

    if ($request->hasFile('image')) {
        $validatedData['image'] = $request->file('image')->store('about_images', 'public');
    }

    $about = AboutUs::first();
    if ($about) {
        $about->update($validatedData);
    } else {
        AboutUs::create($validatedData);
    }
    app('App\Http\Controllers\VisitorController')->store($request);

    return redirect()->route('dashboard.about')->with('success', 'About Us updated successfully.');
}


    // Store a new feature
    public function storeFeature(Request $request)
{
    try {
        $validatedData = $request->validate([
            'icon' => 'required|string',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Feature::create($validatedData);

        return redirect()->route('dashboard.about')->with('success', 'Feature added successfully.');
    } catch (\Exception $e) {
        // Log the error message (optional)
        Log::error('Error adding feature: ' . $e->getMessage());

        // Redirect back with an error message
        return redirect()->route('dashboard.about')->with('error', 'An error occurred: ' . $e->getMessage());
    }
}


    // Delete a feature
    public function destroyFeature(Feature $feature)
    {
        $feature->delete();
        return redirect()->route('dashboard.about')->with('success', 'Feature deleted successfully.');
    }

    // Store a new team member
    public function storeTeamMember(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'designation' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        'facebook_link' => 'nullable|url',
        'twitter_link' => 'nullable|url',
        'instagram_link' => 'nullable|url',
    ]);

    if ($request->hasFile('image')) {
        $validatedData['image'] = $request->file('image')->store('team_images', 'public');
    }

    TeamMember::create($validatedData);

    return redirect()->route('dashboard.about')->with('success', 'Team member added successfully.');
}


    // Delete a team member
    public function destroyTeamMember(TeamMember $teamMember)
    {
        // Delete the image file
        if (Storage::disk('public')->exists($teamMember->image)) {
            Storage::disk('public')->delete($teamMember->image);
        }

        $teamMember->delete();
        return redirect()->route('dashboard.about')->with('success', 'Team member deleted successfully.');
    }
}
