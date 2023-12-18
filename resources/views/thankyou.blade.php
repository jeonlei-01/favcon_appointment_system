<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Appointment Status</title>
    <style>
        body, h1, h2, p {
            margin: 0;
            padding: 0;
            background-color: white;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: white;
        }

        /* Container styles */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
        }

        /* Header styles */
        .header {
            background-color: #f5f5f5;
            padding: 10px;
        }

        /* Content styles */
        .content {
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
        }

        /* Footer styles */
        .footer {
            background-color: #f5f5f5;
            padding: 10px;
            text-align: center;
        }

        /* Link styles */
        a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Appointment Status</h2>
        </div>

        <div class="content">
            @if ($status === 'Approved')
                <h2>Your Appointment has been Approved</h2>
                <br>
                <p>I hope this message finds you well. Your appointment is confirmed. We're excited to serve you on the scheduled Date and Time.</p>
                <br>
                <p>Thank you for choosing us. We are excited to serve you and provide you with the best possible experience.</p>
                <br>
                <p>See you soon!</p>
            @elseif ($status === 'Rejected')
                <h2>Appointment Rejected</h2>
                <br>
                <p>I hope this email finds you well. We regret to inform you that, unfortunately, we are unable to accept your appointment request at this time.</p>
                <br>
                <p>We appreciate your interest and time. If you have questions or seek alternatives, please reach out. We're here to help.</p>
            @else
                <h2>Thank You! Your Appointment Status</h2>
                <p>Your appointment status is: {{ $status }}</p>
            @endif
        </div>

        <div class="footer">
            <p>For any inquiries, please contact us at <a href="fjporras04@gmail.com">fjporras04@gmail.com</a></p>
        </div>
    </div>
</body>
</html>

