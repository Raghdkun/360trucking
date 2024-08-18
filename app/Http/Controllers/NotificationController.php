<?php
namespace App\Http\Controllers;

use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Auth::user()->notifications()->latest()->paginate(10);
        $settings = GeneralSetting::first();

        return view('dashboard.notifications.index', compact('notifications','settings'));
    }

    public function markAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();

        return response()->json(['success' => true]);
    }

    public function show($id)
    {
        $notification = Auth::user()->notifications()->findOrFail($id);

        // Mark the notification as read
        if (!$notification->is_read) {
            $notification->update(['is_read' => true]);
        }

        // Redirect to the notification's URL
        return redirect($notification->url);
    }
}
