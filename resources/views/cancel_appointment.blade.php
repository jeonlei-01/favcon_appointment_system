<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>>New Appointment Notification</title>
    <style>
        body {
            margin: 0;
            padding: 0;
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
        p {
            font-size: 15px;
            margin-top: 10px;
        }

        /* Header styles */
        .header {
            background-color: #F8AF5B;
            padding: 10px;
        }

        /* Content styles */
        .content {
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
        }
        .footer {
            background-color: #F8AF5B;
            padding: 10px;
            text-align: center;
        }
        a {
            color: #F8AF5B;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container">
        <div class="header">
            <h3>Hello, {{ $appointment->name }}</h3>
            <p>This is your current appointment:</p>
        </div>
    <div class="content">
    <p><strong>Name:</strong> {{ $appointment->name }}</p>
    <p><strong>Email:</strong> {{ $appointment->email }}</p>
    <p><strong>Service:</strong> {{ $appointment->service->type }}</p>
    <p><strong>Date:</strong> {{ $appointment->schedule->date }}</p>
    <p><strong>Time:</strong> {{ $appointment->timeslot->start_time }} - {{ $appointment->timeslot->end_time }}</p>
    <p><strong>Address:</strong> {{ $appointment->address }}</p>
    <p><strong>Contact Number:</strong> {{ $appointment->phone_no }}</p>
        <br><br>
    <div class="footer">
    <p>Click <a href="{{ route('appointments.cancel', ['id' => $appointment->id]) }}">here</a> to <b>Cancel</b> your appointment request.</p>
        </div>
    </div> 
</body>
</html>