<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;
use App\Models\GeneralSetting;
use App\Models\Log;

class DashboardController extends Controller
{
    public function index()
    {
        $settings = GeneralSetting::first();

        $carousels = Carousel::all();
        $logs = Log::all(); 
        return view('dashboard.home', compact(['carousels', 'settings','logs']));
    }
}
