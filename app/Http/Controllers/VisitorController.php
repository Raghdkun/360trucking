<?php

namespace App\Http\Controllers;

use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Illuminate\Support\Facades\Http;

class VisitorController extends Controller
{
    public function index()
    {
        $visitors = Visitor::latest()->paginate(10);
        $settings = GeneralSetting::first();

        return view('dashboard.visitors.index', compact('visitors','settings'));
    }

    public function store(Request $request)
    {
        $ipAddress = $request->ip();
        $userAgent = $request->header('User-Agent');
        $referrer = $request->header('Referer');
        $url = $request->url();

        // Optionally, you can use an external API to get location details based on IP
        $locationData = $this->getLocationData($ipAddress);

        Visitor::create([
            'ip_address' => $ipAddress,
            'user_agent' => $userAgent,
            'referrer' => $referrer,
            'country' => $locationData['country'] ?? null,
            'city' => $locationData['city'] ?? null,
            'url' => $url,
            'visited_at' => now(),
        ]);

        return response()->json(['success' => true]);
    }

    private function getLocationData($ip)
    {
        // Here you can use an IP geolocation service API to get location data
        // For example: http://ip-api.com/json/{ip}
        $response = Http::get("http://ip-api.com/json/{$ip}");
        return $response->json();
    }
}
