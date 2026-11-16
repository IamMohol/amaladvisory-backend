<?php

namespace Tests\Feature;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    public function test_client_enquiry_submits_successfully()
    {
        Mail::fake();

        $payload = [
            'name' => 'Wanjiku Mwangi',
            'email' => 'wanjiku@example.org',
            'organization' => 'East Africa Impact Initiative',
            'organization_type' => 'Nonprofit or NGO',
            'help_needed' => 'A Theory of Change or strategy',
            'timeline' => 'Within a month',
            'whatsapp' => '+254700000000',
            'inquiry_type' => 'client',
            'message' => 'We are preparing for a new funding round and need to align our leadership team.'
        ];

        $response = $this->postJson('/api/contact', $payload);

        $response->assertStatus(200)
                 ->assertJson([
                     'success' => true,
                 ]);

        Mail::assertSent(ContactMail::class, function ($mail) use ($payload) {
            return $mail->hasTo('seth@amaladvisory.com') &&
                   $mail->contactData['name'] === $payload['name'] &&
                   $mail->contactData['email'] === $payload['email'] &&
                   $mail->contactData['inquiry_type'] === 'client';
        });
    }

    public function test_partnership_note_submits_successfully()
    {
        Mail::fake();

        $payload = [
            'name' => 'David Ochieng',
            'email' => 'david@associates.org',
            'organization' => 'Global Evaluation Associates',
            'inquiry_type' => 'partnership',
            'message' => 'Exploring an associate role and joint bids on regional MEL tenders.'
        ];

        $response = $this->postJson('/api/contact', $payload);

        $response->assertStatus(200)
                 ->assertJson([
                     'success' => true,
                 ]);

        Mail::assertSent(ContactMail::class, function ($mail) use ($payload) {
            return $mail->hasTo('seth@amaladvisory.com') &&
                   str_contains($mail->contactData['subject'], '[Partnership & Collaboration]');
        });
    }

    public function test_validation_fails_when_required_fields_missing()
    {
        $response = $this->postJson('/api/contact', []);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name', 'email', 'message']);
    }
}

