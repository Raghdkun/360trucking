<?php
namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;


class ServiceController extends Controller
{
    public function show($slug)
{
    $settings = GeneralSetting::first();
    $service = Service::where('slug', $slug)->firstOrFail();

    return view('services.show', compact('service', 'settings'));
}

    public function index()
    
    {
        $services = Service::all();
        $settings = GeneralSetting::first();
        return view('dashboard.services.index', compact('services', 'settings'));
    }

    public function create()
    {
        // Pass 'service' as null when creating a new service
        return view('dashboard.services.form', ['service' => null]);
    }

    public function edit(Service $service)
    {
        return view('dashboard.services.edit', compact('service'));
    }


    public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'content' => 'nullable|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'button_url' => 'required|string',
    ]);

    // Handle the file upload
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/services'), $imageName);
        $validatedData['image'] = 'images/services/' . $imageName;
    }

    Service::create($validatedData);

    return redirect()->route('dashboard.services.index')->with('success', 'Service added successfully.');
}

public function update(Request $request, Service $service)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'content' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'button_url' => 'required|string',
    ]);

    // Handle the file upload
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/services'), $imageName);
        $validatedData['image'] = 'images/services/' . $imageName;
    }

    $service->update($validatedData);

    return redirect()->route('dashboard.services.index')->with('success', 'Service updated successfully.');
}

public function destroy(Service $service)
{
    $service->delete();
    return redirect()->route('dashboard.services.index')->with('success', 'Service deleted successfully.');
}

}
