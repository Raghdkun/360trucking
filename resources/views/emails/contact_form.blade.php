<!-- resources/views/emails/contact_form.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .email-container {
            width: 100%;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            max-width: 600px;
            margin: 0 auto;
        }
        .email-header {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .email-content {
            padding: 20px;
        }
        .email-footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #888;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #ffffff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Contact Form Submission</h1>
        </div>
        <div class="email-content">
            <p>Dear {{ $contact->name }},</p>
            <p>Thank you for reaching out to us. We have received your message and will get back to you shortly.</p>
            <p><strong>Details of your submission:</strong></p>
            <ul>
                <li><strong>Name:</strong> {{ $contact->name }}</li>
                <li><strong>Email:</strong> {{ $contact->email }}</li>
                <li><strong>Subject:</strong> {{ $contact->subject }}</li>
                <li><strong>Message:</strong> {{ $contact->message }}</li>
            </ul>
            <p>If you have any further questions, feel free to <a href="mailto:support@example.com">contact us</a>.</p>
            <a href="https://example.com" class="button">Visit Our Website</a>
        </div>
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
