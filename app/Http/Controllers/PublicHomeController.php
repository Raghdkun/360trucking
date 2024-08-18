<?php
namespace App\Http\Controllers;

use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class PublicHomeController extends Controller
{
    public function index()
    {
        // Fetch general settings from the database
        $settings = GeneralSetting::first();

        return view('welcome', compact('settings'));
    }
}
