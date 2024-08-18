<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Carousel;
use App\Models\Feature;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Models\Contact;



class HomeController extends Controller
{
    public function index()
    {

        $settings = GeneralSetting::first();

        $carousels = Carousel::all();
        $contacts = Contact::all();
        $about = AboutUs::first();
        $features = Feature::all();
        $teamMembers = TeamMember::all();
        $settings = GeneralSetting::first();
        $contactus = Contact::all();
        
        

        return view('home', compact(['carousels','settings','contacts','about','features','teamMembers',"contactus"]));
    }
}
