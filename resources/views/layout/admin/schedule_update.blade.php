<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Schedule</title>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="icon" href="{{ asset('images/Logo.png') }}" type="image/x-icon">
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

    h2 {
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
      <form action="/admin/schedule/update" method="POST">
        @csrf <!-- Include this line if using Laravel's CSRF protection -->
        <h2>Update Schedule</h2>
        <a href="/schedule-dashboard">Back</a>
        <input type="hidden" name="id" value="{{ $data['id'] }}">

        <label for="service_type">Service Type:</label>
            <select id="service_type" name="service_type" required>
                @foreach ($services as $service)
                    <option value="{{ $service->type }}" @if ($data['service']['type'] === $service->type) selected @endif>
                        {{ $service->type }}
                    </option>
                @endforeach
            </select>
        <label for="date">Date:</label>
        <input type="text" id="date" value="{{ $data['date'] }}" name="date" class="datepicker" required>

        <label for="status">Status:</label>
        <input type="text" id="status" value="{{ $data['status'] }}" name="status" required><br>
        <br>  
    @if ($errors->has('date'))
        <div class="alert alert-danger">
            {{ $errors->first('date') }}
        </div>
    @endif

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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>
</html>
<script>
    $(function () {
        $(".datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
    });

    // $("form").submit(function () {
    //     var selectedDate = new Date($("#date").val());
    //     var currentDate = new Date();

    //     if (selectedDate < currentDate) {
    //         alert("Make sure to update a schedule that is not in the past month.");
    //         return false;
    //     }
    // });
</script>