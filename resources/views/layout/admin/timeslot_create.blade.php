<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create New Time Slot</title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
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

    input{
      width: 96%;
      padding: 8px;
      margin-top: 5px;
      border: 1px solid #F8AF5B;
      border-radius: 4px;
      color: #FF7C03;
      outline: none;

    }
    select{
      width: 100%;
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
        <form action="/admin/timeslot/create/info" method="POST">
            @csrf <!-- Include this line if using Laravel's CSRF protection -->
            <h3>Create New Timeslot</h3>
            <a href="/timeslot-dashboard">Back</a>

          <label for="service_id">Service:</label>
           <select id="service_id" name="service_id" required>
          <option>Select Service:</option>
              @foreach($services as $service)
                  <option value="{{ $service->id }}">{{ $service->type }}</option>
              @endforeach
          </select>

          <label for="date">Date:</label>
          <select id="schedule_id" name="schedule_id" required>

          </select>
            <label for="start_time">Start Time:</label>
            <input type="text" autocomplete="off" id="start_time" name="start_time" class="starttime" required>

            <label for="end_time">End Time:</label>
            <input type="text" autocomplete="off" id="end_time" name="end_time" class="endtime" required>

            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="Available">Available</option>
            </select>
            <br>
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
	
        fetch(`/get-dates/${selectedService}`)
            .then((response) => response.json())
            .then((data) => {
                // Clear previous options
                $dateSelect.empty();

                // Append new options based on the retrieved data
                data.forEach((schedule) => {
    $dateSelect.append(`<option value="${schedule.id}">${schedule.date}</option>`);
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