<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string'
        ]);

        // Cybersecurity: Sanitize inputs to prevent XSS (Cross-Site Scripting) injection in your email client
        $validated['name'] = strip_tags($validated['name']);
        $validated['message'] = strip_tags($validated['message']);

        // Send the email to the business address
        \Illuminate\Support\Facades\Mail::to('seth@amaladvisory.com')->send(new \App\Mail\ContactMail($validated));

        return response()->json([
            'success' => true,
            'message' => 'Thank you for reaching out. We will get back to you shortly.'
        ]);
    }
}
