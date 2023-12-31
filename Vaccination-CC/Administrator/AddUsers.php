<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['role'] !== 'administrator') {
    header('Location: ../index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Add Users</title>
    <link rel="stylesheet" href="admin.css" />
  </head>
  <body>
    <div id="header"><h1>Add Users</h1>    </div>
    <div class="navbar">
      <a href="Dashboard.php"><i class="fa fa-fw fa-home"></i>Dashboard</a>
    
      
      <div class="dropdown">
        <button class="dropbtn"><b>Vaccine Management</b>
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="AddVaccineScreen.php">Add vaccine </a>
          <a href="UpdateVaccine.php">Update Vaccine</a>
          <a href="DeleteVaccine.php">Delete Vaccine</a>
          <a href="show_vaccines_admin.php">Show Vaccines</a>
          <a href="Manage_Request.php">Manage Requests</a>
          
        </div>
      </div>
      
      <div class="dropdown">
        <button class="dropbtn"><b>Users</b>
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="AddUsers.php">Add User </a>
          <a href="EditUser.php">Update Users</a>
          <a href="DeleteUsers.php">Delete User</a>
          
        </div>
        
      </div>
      <a href="logout.php">Log Out</a>



    </div>


    <!DOCTYPE html>
<html>
<head>
  <title>Add Users</title>
  <style>
    /* Basic styling for the form */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    .container {
      width: 50%;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
    }

    form {
      max-width: 500px;
      margin: 0 auto;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    select {
      width: calc(100% - 18px);
      padding: 8px;
      margin-bottom: 10px;
      border-radius: 4px;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    .confirmation-message {
      display: none;
      text-align: center;
      padding: 10px;
      margin-top: 20px;
      background-color: #dff0d8;
      border: 1px solid #3c763d;
      color: #3c763d;
      border-radius: 4px;
    }

    .show-message {
      display: block;
    }
  </style>
</head>
<body>
  <script>
        function showAlert() {
            alert('New user added successfully!');
        }
    </script>
    
  <div class="container">
    <h2>Add Users</h2>
    <form method="POST" action="CreateUser.php">
      <label for="fullName">Full Name:</label>
      <input type="text" id="fullName" name="fullName" required>

      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>

      <label for="user_role">Role:</label>
      <select id="user_role" name="user_role">
        <option value="administrator">Administrator</option>
        <option value="inventory_manager">Inventory Manager</option>
        <option value="dispatcher">Dispatcher</option>
        <option value="staff">Staff</option>
      </select>

      <input type="submit" value="Add User" onclick="showAlert()">
    </form>
  </div>
</html>

    
    
  </body>
</html>