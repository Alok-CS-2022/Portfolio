<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->get();
        return view('admin.messages.index', compact('messages'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000',
        ]);

        $contactMessage = ContactMessage::create($validated);

        try {
            Mail::raw(
                "New contact form submission\n\n" .
                "Name: {$validated['name']}\n" .
                "Email: {$validated['email']}\n\n" .
                "Message:\n{$validated['message']}",
                function ($mail) use ($validated) {
                    $mail->to(config('mail.from.address'))
                         ->subject('New Contact Form Submission')
                         ->replyTo($validated['email'], $validated['name']);
                }
            );
        } catch (\Exception $e) {
            report($e);
        }

        return back()->with('success', 'Thanks for reaching out! I\'ll get back to you soon.');
    }
}
