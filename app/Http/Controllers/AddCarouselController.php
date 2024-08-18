<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;
use App\Models\GeneralSetting;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;




class AddCarouselController extends Controller
{


    public function create(Request $request)
{
    try {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'button_url' => 'nullable|url|max:255',
            'image' => 'required|file|max:2048',
        ]);

        // Handle the image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('carousel'), $imageName);
            $validatedData['image'] = 'carousel/' . $imageName;
        }

        // Insert the data into the carousels table
        $inserted = DB::table('carousels')->insert($validatedData);

        if ($inserted) {
            // Log the action to the database
            Log::create([
                'user_id' => Auth::id(),
                'action' => 'User created a new carousel slide titled: ' . $validatedData['title'],
            ]);

            return redirect()->route('dashboard.home')->with('success', 'Slide added successfully.');
        } else {
            return redirect()->route('dashboard.home')->with('error', 'Failed to add slide.');
        }
    } catch (\Exception $e) {
        // Log the error action
        Log::create([
            'user_id' => Auth::id(),
            'action' => 'User failed to create a carousel slide. Error: ' . $e->getMessage(),
        ]);

        return redirect()->route('dashboard.home')->with('error', 'An error occurred: ' . $e->getMessage());
    }
}
    
}
