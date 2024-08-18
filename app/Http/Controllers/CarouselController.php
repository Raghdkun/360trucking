<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CarouselController extends Controller
{
    public function index()
    {
        $settings = GeneralSetting::first();

        $carousels = Carousel::all();
        return view('dashboard.home', compact(['carousels', 'settings']));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'button_url' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $carousel = DB::table('carousels')->where('id', $id)->first();
    
        $updatedData = $request->only(['title', 'description', 'button_text', 'button_url']);
    
        // Handle the image upload
        if ($request->hasFile('image')) {
            // Delete the old image if necessary
            if (file_exists(public_path($carousel->image))) {
                unlink(public_path($carousel->image));
            }
    
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('carousel'), $imageName);
            $updatedData['image'] = 'carousel/' . $imageName;
        }
    
        $updated = DB::table('carousels')->where('id', $id)->update($updatedData);
    
        if ($updated) {
            return redirect()->route('dashboard.home')->with('success', 'Slide updated successfully.');
        } else {
            return redirect()->route('dashboard.home')->with('error', 'Failed to update slide.');
        }
    }
    


    public function store()
    {
        $settings = GeneralSetting::first();

        return view('carousel.create', compact('settings'));

    }

    public function destroy($id)
    {
        $carousel = Carousel::findOrFail($id);
        $carousel->delete();

        return redirect()->back()->with('success', 'slide removed successfully!');
    }

}
