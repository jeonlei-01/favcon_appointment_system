<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create New Schedule</title>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
     <form action="/admin/schedule/create/info" method="POST">
        @csrf 
        <h2>Create New Schedule</h2>
        <a href="/schedule-dashboard">Back</a>
        <label for="service_id">Service Type:</label>
        <select id="service_id" name="service_id" required>
        @foreach($services as $service)
            <option value="{{ $service->id }}">{{ $service->type }}</option>
        @endforeach
    </select>
        <label for="date">Date:</label>
        <input type="text" autocomplete="off" id="date" class="datepicker" name="date" required>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
        <option value="Available">Available</option>
    </select>
        <br>
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
    //         alert("Make sure to create a schedule that is not in the past month.");
    //         return false;
    //     }
    // });
    @if ($errors->any())
        // Combine all error messages into a single string
        var errorMessage = @json($errors->all());

        // Display the error messages
        displayErrors(errorMessage);

        // Reload the page after 5 seconds
        setTimeout(function () {
            location.reload();
        }, 5000); // 5000 milliseconds (5 seconds)
    @endif

    function displayErrors(messages) {
        var errorContainer = document.getElementById('error-messages');
        var errorList = document.createElement('ul');

        // Create list items for each error message
        messages.forEach(function (message) {
            var listItem = document.createElement('li');
            listItem.textContent = message;
            errorList.appendChild(listItem);
        });

        // Display the error messages
        errorContainer.appendChild(errorList);
        errorContainer.style.display = 'block';
    }
</script>

