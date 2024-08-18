<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class ServicePageController extends Controller
{
    public function index()
    {
        $settings = GeneralSetting::first();
        $services = Service::all();

        return view('services', compact('settings', 'services'));
    }
}
