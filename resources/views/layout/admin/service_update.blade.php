<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Service</title>
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
      box-shadow: 0 3px 7px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      color: #726767;
    }

    label {
      margin-top: 10px;
      color: #FF7C03;
      font-weight: 600;
      margin-bottom: 50px;

    }

    input{
      width: 96%;
      padding: 8px;
      margin-top: 5px;
      border: 1px solid #000;
      border-radius: 4px;
      color: #FF7C03;
      outline: none;
    }
    select{
      width: 99%;
      padding: 8px;
      margin-top: 5px;
      border: 1px solid #000;
      border-radius: 4px;
      color: #FF7C03;
      outline: none;
    }
    textarea {
      width: 96%;
      padding: 8px;
      margin-top: 5px;
      border: 1px solid #000;
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
      <form action="/admin/service/update/" method="POST">
        @csrf <!-- Include this line if using Laravel's CSRF protection -->
        <h2>Update Service</h2>
        <a href="/service-dashboard">Back</a>
        <input type="hidden" name="id" value="{{ $data['id'] }}">
        <label for="type">Type:</label>
        <input type="text" id="type" value="{{ $data['type'] }}" name="type" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required>{{ $data['description'] }}</textarea>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
        <option value="Active" {{ $data['status'] === 'Active' ? 'selected' : '' }}>Active</option>
        <option value="Inactive" {{ $data['status'] === 'Inactive' ? 'selected' : '' }}>Inactive</option>
    </select><br>
        <br>
        @if ($errors->has('description'))
        <div class="alert alert-danger">
            {{ $errors->first('description') }}
        </div>
    @endif
    <br>
        <button type="submit">Submit</button>
      </form>
    </div>
  </div>
</body>

</html>