<!DOCTYPE html>
<html>
<head>
    <title>New Contact Form Submission</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #eaeaea; border-radius: 5px;">
        <h2 style="color: #1a202c; border-bottom: 2px solid #22d3ee; padding-bottom: 10px;">New Contact Form Submission</h2>
        
        <p><strong>Name:</strong> {{ $contactData['name'] }}</p>
        <p><strong>Email:</strong> {{ $contactData['email'] }}</p>
        
        <h3 style="margin-top: 30px;">Message:</h3>
        <div style="background: #f8f9fa; padding: 15px; border-radius: 4px; white-space: pre-wrap;">{{ $contactData['message'] }}</div>
        
        <p style="margin-top: 40px; font-size: 0.9em; color: #666;">
            This email was sent from the Amal Advisory contact form. You can reply directly to this email to reach the sender.
        </p>
    </div>
</body>
</html>
