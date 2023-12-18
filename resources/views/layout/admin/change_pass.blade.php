<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link href="{{ asset('sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/Logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Change Password</title>
</head>
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
      margin: auto;
    }
    .form-container {
      width: 90%;
      max-width: 500px;
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      text-align:center;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .form-container h2 {
    color: #FF7C03;

    }

    label {
      margin-top: 10px;
      color: #FF7C03;
      font-weight: bold;
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

    #passwordForm {
    display: grid;
    gap: 10px;
    text-align: left;
    }

    #passwordForm input[type="password"] {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        outline: none;

    }

    #passwordForm button[type="submit"] {
        background-color: #FF7C03;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    #passwordForm button[type="submit"]:hover {
        background-color: #F8AF5B;
    }   
    .unique-button {
        background-color: #FF7C03;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .unique-button:hover {
        background-color: #FF7C03;
    }
    .password-container {
    position: relative;
    }

    .toggle-password {
        position: absolute;
        right: 25px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #F8AF5B;
    }
    .cancel-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #FF7C03;
    color: white;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
    } 
    .cancel-button:hover{
        color:white;
        background:#F8AF5B;
    }


    .error-message {
    color: red;
    font-size: 14px;
    margin-top: 5px;
}
    
</style>
<body>
<div class="container">
    <div class="form-container">
    <h2>Change Password</h2>
    <form id="passwordForm" action="{{ route('change-password') }}" method="POST">
    @csrf
    <label for="old_password">Old Password:</label>
    <div class="password-container">
        <input type="password" name="old_password" id="oldPassword">
        <i class="toggle-password fas fa-eye" id="toggleOldPassword"></i>
    </div>

    <label for="password">New Password:</label>
    <div class="password-container">
        <input type="password" name="password" id="newPassword">
        <i class="toggle-password fas fa-eye" id="toggleNewPassword"></i>
    </div>

    <label for="password_confirmation">Confirm Password:</label>
    <div class="password-container">
        <input type="password" name="password_confirmation" id="confirmPassword">
        <i class="toggle-password fas fa-eye" id="toggleConfirmPassword"></i>
    </div>
    <button type="submit" id="unique-button">Save</button>
    <a href="/appointment-dashboard" class="cancel-button"  id="unique-button"  >Cancel</a>
</form>
</div>  
  </div>
    <script src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/admin_js/changepass.js') }}"></script>
</body>
</html>