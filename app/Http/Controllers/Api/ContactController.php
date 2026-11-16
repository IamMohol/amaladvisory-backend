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
            'organization' => 'nullable|string|max:255',
            'organization_type' => 'nullable|string|max:255',
            'help_needed' => 'nullable|string|max:255',
            'timeline' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:50',
            'inquiry_type' => 'nullable|string|in:client,partnership',
            'message' => 'required|string'
        ]);

        $inquiryType = $request->input('inquiry_type', 'client');
        $subjectPrefix = $inquiryType === 'partnership' ? '[Partnership & Collaboration]' : '[Client Enquiry]';

        $data = [
            'name' => strip_tags($validated['name']),
            'email' => $validated['email'],
            'organization' => strip_tags($validated['organization'] ?? 'Not provided'),
            'organization_type' => strip_tags($validated['organization_type'] ?? 'Not specified'),
            'help_needed' => strip_tags($validated['help_needed'] ?? 'Not specified'),
            'timeline' => strip_tags($validated['timeline'] ?? 'Not specified'),
            'whatsapp' => strip_tags($validated['whatsapp'] ?? 'Not provided'),
            'inquiry_type' => $inquiryType,
            'message' => strip_tags($validated['message']),
            'subject' => "{$subjectPrefix} Submission from " . strip_tags($validated['name'])
        ];

        // Send the email to the business address
        \Illuminate\Support\Facades\Mail::to('seth@amaladvisory.com')->send(new \App\Mail\ContactMail($data));

        return response()->json([
            'success' => true,
            'message' => 'Thank you for reaching out. We will get back to you within two business days.'
        ]);
    }
}
