<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $contactData['subject'] ?? 'New Contact Form Submission' }}</title>
</head>
<body style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; line-height: 1.6; color: #2d3748; background-color: #f7fafc; padding: 25px 15px;">
    <div style="max-width: 600px; margin: 0 auto; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
        <div style="background-color: #100e0b; padding: 24px 28px; border-bottom: 3px solid #d97706;">
            <span style="color: #e5a43b; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; display: block; margin-bottom: 6px;">Amal Advisory · Nairobi</span>
            <h1 style="color: #f8f6f0; font-size: 20px; margin: 0; font-weight: 600;">
                {{ $contactData['subject'] ?? 'New Contact Submission' }}
            </h1>
        </div>

        <div style="padding: 28px;">
            <table style="width: 100%; border-collapse: collapse; margin-bottom: 24px;">
                <tr>
                    <td style="padding: 8px 0; color: #718096; width: 140px; font-size: 14px;"><strong>Name:</strong></td>
                    <td style="padding: 8px 0; color: #1a202c; font-size: 15px; font-weight: 600;">{{ $contactData['name'] }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px 0; color: #718096; font-size: 14px;"><strong>Email:</strong></td>
                    <td style="padding: 8px 0; color: #d97706; font-size: 15px;"><a href="mailto:{{ $contactData['email'] }}" style="color: #d97706; text-decoration: none;">{{ $contactData['email'] }}</a></td>
                </tr>
                @if(!empty($contactData['organization']) && $contactData['organization'] !== 'Not provided')
                <tr>
                    <td style="padding: 8px 0; color: #718096; font-size: 14px;"><strong>Organization:</strong></td>
                    <td style="padding: 8px 0; color: #1a202c; font-size: 15px;">{{ $contactData['organization'] }}</td>
                </tr>
                @endif
                @if(!empty($contactData['organization_type']) && $contactData['organization_type'] !== 'Not specified')
                <tr>
                    <td style="padding: 8px 0; color: #718096; font-size: 14px;"><strong>Organization Type:</strong></td>
                    <td style="padding: 8px 0; color: #1a202c; font-size: 15px;">{{ $contactData['organization_type'] }}</td>
                </tr>
                @endif
                @if(!empty($contactData['help_needed']) && $contactData['help_needed'] !== 'Not specified')
                <tr>
                    <td style="padding: 8px 0; color: #718096; font-size: 14px;"><strong>Help Needed:</strong></td>
                    <td style="padding: 8px 0; color: #1a202c; font-size: 15px; font-weight: 600;">{{ $contactData['help_needed'] }}</td>
                </tr>
                @endif
                @if(!empty($contactData['timeline']) && $contactData['timeline'] !== 'Not specified')
                <tr>
                    <td style="padding: 8px 0; color: #718096; font-size: 14px;"><strong>Timeline:</strong></td>
                    <td style="padding: 8px 0; color: #1a202c; font-size: 15px;">{{ $contactData['timeline'] }}</td>
                </tr>
                @endif
                @if(!empty($contactData['whatsapp']) && $contactData['whatsapp'] !== 'Not provided')
                <tr>
                    <td style="padding: 8px 0; color: #718096; font-size: 14px;"><strong>WhatsApp:</strong></td>
                    <td style="padding: 8px 0; color: #1a202c; font-size: 15px;">{{ $contactData['whatsapp'] }}</td>
                </tr>
                @endif
            </table>

            <h3 style="font-size: 14px; text-transform: uppercase; letter-spacing: 0.08em; color: #4a5568; margin: 24px 0 10px; border-top: 1px solid #edf2f7; padding-top: 18px;">
                Message / Background Context
            </h3>
            <div style="background: #fdfaf4; border-left: 3px solid #d97706; padding: 16px 18px; border-radius: 4px; font-size: 15px; line-height: 1.7; color: #2d3748; white-space: pre-wrap;">{{ $contactData['message'] }}</div>
        </div>

        <div style="background-color: #f7fafc; padding: 18px 28px; border-top: 1px solid #edf2f7; font-size: 13px; color: #718096;">
            This enquiry was submitted from <a href="https://amaladvisory.com/contact" style="color: #718096;">amaladvisory.com/contact</a>. You can reply directly to this email to reach <strong>{{ $contactData['name'] }}</strong>.
        </div>
    </div>
</body>
</html>
