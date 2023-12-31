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
    <title>Edit Users</title>
    <link rel="stylesheet" href="admin.css" />
  </head>
  <body>
    <div id="header"><h1>Edit Users</h1>    </div>
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
  <title>Edit Users</title>
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
    function fetchuserData(uid) {
        if (uid == "") {
            return;
        }

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var userData = JSON.parse(this.responseText);
                document.getElementById("user_id").value = uid;
                document.getElementById("user").value = userData.username || '';
                document.getElementById("pass").value = userData.password || '';
                document.getElementById("user_role").value = userData.role || '';
                document.getElementById("fullName").value = userData.name || '';
            }
        };
        xhttp.open("GET", "fetch_user_data.php?uid=" + uid, true);
        xhttp.send();
    }

    function showAlert() {
        alert('User data updated successfully!');
    }
    </script>
    
  <div class="container">
    <h2>Edit Users</h2>
    <form method="POST" action="edit_user_helper.php">
      <input type="hidden" id="user_id" name="user_id">
      <label for="users_list">Select users to update:</label>
      <select id="users_list" name="users_list" onchange="fetchuserData(this.value)">
        <?php
        include 'database.php';
        $sql = "SELECT id, username, password, role, name FROM users";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $uid = $row['id'];
                $userRole = $row['username'];
                echo "<option value=\"$uid\">$userRole</option>";
            }
        } else {
            echo "<option value=\"\">No users available</option>";
        }

        $conn->close();
        ?>
      </select>

      <label for="user">Username:</label>
      <input type="text" id="user" name="user" required>

      <label for="pass">Password:</label>
      <input type="password" id="pass" name="pass" required>

      <label for="user_role">Role:</label>
      <select id="user_role" name="user_role">
        <option value="administrator">Administrator</option>
        <option value="inventory_manager">Inventory Manager</option>
        <option value="dispatcher">Dispatcher</option>
        <option value="staff">Staff</option>
      </select>

      <label for="fullName">Full Name:</label>
      <input type="text" id="fullName" name="fullName" required>

      <input type="submit" value="Submit" onclick="showAlert()">
    </form>
  </div>
</html>

    
    
  </body>
</html>