<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Appointment Notification</title>
    <style>

body, h1 {
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
    </style>
</head>
<body>
<div class="container">
        <div class="header">
            <h3>Hello Admin,</h3>
            <p>A new appointment request has been <b>Cancelled</b>:</p>
        </div>
    <div class="content">
    <p><strong>Name:</strong> {{ $appointment->name }}</p>
    <p><strong>Email:</strong> {{ $appointment->email }}</p>
    <p><strong>Service:</strong> {{ $appointment->service->type }}</p>
    <p><strong>Date:</strong> {{ $appointment->schedule->date }}</p>
    <p><strong>Time:</strong> {{ $appointment->timeslot->start_time }} - {{ $appointment->timeslot->end_time }}</p>
    <p><strong>Address:</strong> {{ $appointment->address }}</p>
    <p><strong>Contact Number:</strong> {{ $appointment->phone_no }}</p>
    <p><strong>Status:</strong> {{ $appointment->status }}</p>
        <br><br>
    </div> 
</body>
</html>