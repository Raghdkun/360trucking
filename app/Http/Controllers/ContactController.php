<?php
namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        $contact = Contact::create($validatedData);

        // Send email with fake content
        // Mail::raw('This is a placeholder email content.', function ($message) use ($contact) {
        //     $message->to($contact->email)
        //             ->subject('Contact Form Submission');
        // });
        Mail::to($contact->email)->send(new ContactFormMail($contact));
        $userId = Auth::id();

        Notification::create([
            'user_id' => Auth::id(), // Assuming you want to notify the currently authenticated user
            'type' => 'New Contact Submission',
            'title' => 'New Contact Form Submission',
            'message' => 'A new contact form submission has been made by ' . $contact->name . '.',
            'url' => route('dashboard.contact', $contact->id), // Assuming you have a route to view the contact details
            'notifiable_type' => User::class,
            'notifiable_id' => Auth::id(),
        ]);


        return redirect()->route('message')->with([
            'success' => true,
            'title' => 'Booking Successful',
            'header' => 'Meeting Booked',
            'message' => 'Your meeting has been booked successfully. We will contact you soon with more details.',
            'breadcrumb' => 'Booking Confirmation'
        ]);    }
}
