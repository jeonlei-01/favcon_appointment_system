<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Time Slot</title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
  <link rel="icon" href="{{ asset('images/Logo.png') }}" type="image/x-icon">
  <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  <style>
    body {
      background: linear-gradient(to right, #F8AF5B, #f8f6f2);
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 20px;
    }

    .form-container {
      width: 90%;
      max-width: 500px;
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    h3 {
      text-align: center;
      color: #726767;
    }

    label {
      margin-top: 10px;
      color: #FF7C03;
      font-weight: 600;
    }

    input {
      width: 96%;
      padding: 8px;
      margin-top: 5px;
      border: 1px solid #F8AF5B;
      border-radius: 4px;
      color: #FF7C03;
      outline: none;

    }
    select {
      width: 99.8%;
      padding: 8px;
      margin-top: 5px;
      border: 1px solid #F8AF5B;
      border-radius: 4px;
      color: #FF7C03;
      outline: none;

    }

    textarea {
      width: 96%;
      padding: 8px;
      margin-top: 5px;
      border: 1px solid #F8AF5B;
      border-radius: 4px;
      color: #FF7C03;
      outline: none;
    }

    button {
      width: 100%;
      padding: 10px;
      background-color: #FF7C03;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    a {
      display: block;
      text-align: center;
      margin-top: 10px;
      color: #FF7C03;
      text-decoration: none;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="form-container">
    <form action="{{ route('admin.timeslot') }}" method="POST">
    @csrf <!-- Include this line if using Laravel's CSRF protection -->
    <h3>Update Timeslot</h3>
    <a href="/timeslot-dashboard">Back</a>
    <input type="hidden" name="id" value="{{ $data['id'] }}">

    <label for="service_id">Service:</label>
    <input type="text" id="service_id" name="service_id" value="{{ $data['schedule']['service']['type'] }}" readonly>

    <label for="date">Date:</label>
    <select id="schedule_id" name="schedule_id" required>
        @foreach ($dates as $date)
            <option value="{{ $date->id }}" @if ($data['schedule']['id'] === $date->id) selected @endif>
                {{ $date->date }}
            </option>
        @endforeach
    </select>


        <label for="start_time">Start Time:</label>
        <input type="text" id="start_time" value="{{ $data['start_time'] }}" name="start_time" class="starttime" required>

        <label for="end_time">End Time:</label>
        <input type="text" id="end_time" value="{{ $data['end_time'] }}" name="end_time" class="endtime" required>

        <label for="status">Status:</label>
        <input type="text" id="status" value="{{ $data['status'] }}" name="status" required><br>
        <br>

            @if ($errors->has('error'))
        <div class="alert alert-danger">
            {{ $errors->first('error') }}
        </div>
    @endif
    <br>
        <button type="submit">Submit</button>
      </form>
    </div>
  </div>
</body>
</html>
<script>
$(document).ready(function () {
    $('#service_id').on('change', function () {
        const selectedService = $(this).val();
        const $dateSelect = $('#schedule_id');

        // Send an AJAX request to get dates based on the selected service
        fetch(`/get-dates/${selectedService}`)
            .then((response) => response.json())
            .then((data) => {
                // Clear previous options
                $dateSelect.empty();

                // Append new options based on the retrieved data
                data.forEach((date) => {
                    $dateSelect.append(`<option value="${date.id}">${date.date}</option>`);
                });
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    });

    const startTimeInput = $('.starttime');
    const endTimeInput = $('#end_time');
    
    startTimeInput.timepicker({
        timeFormat: 'hh:mm p',
        interval: 60,
        scrollbar: true,
        change: function(time) {
            const startTime = moment(time, 'hh:mm A');
            const endTime = startTime.clone().add(45, 'minutes');
            endTimeInput.val(endTime.format('hh:mm A'));
        }
    });
});
</script>