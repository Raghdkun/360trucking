<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::all();
        return view('dashboard.features.index', compact('features'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|string',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Feature::create($request->all());

        return redirect()->back()->with('success', 'Feature added successfully.');
    }

    public function destroy(Feature $feature)
    {
        $feature->delete();
        return redirect()->back()->with('success', 'Feature deleted successfully.');
    }
}
