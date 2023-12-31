<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['role'] !== 'staff') {
    header('Location: ../index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Administer Vaccines</title>
    <link rel="stylesheet" href="admin.css" />
  </head>
  <body>
    <div id="header"><h1>Administer Vaccines</h1>    </div>
    <div class="navbar">
      <a href="file:///C:/Users/moinu/OneDrive/Desktop/dbms/Admin.html"><i class="fa fa-fw fa-home"></i>Dashboard</a>
    
      
      <a href="#news">Request Vaccine</a>
      <a href="#news">Administer Vaccines</a>
      <a href="#news">Inventory Status</a>
      <a href="#news">Scan Lots</a>
      <a href="#news">History/Logs</a>
      <a href="#news">Profile</a>

      


    </div>
    

    <!DOCTYPE html>
<html>
<head>
  <title>Administer Vaccines - Staff</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #f5f5f5;
      color: #333;
    }

    h1, h2 {
      text-align: center;
      color: #444;
    }

    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
      max-width: 400px;
      margin: 20px auto;
    }

    form label {
      display: block;
      margin-bottom: 8px;
      color: #666;
    }

    form input[type="text"],
    form input[type="number"],
    form select,
    form input[type="submit"] {
      width: calc(100% - 20px);
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
    }

    form input[type="submit"] {
      background-color: #4caf50;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    form input[type="submit"]:hover {
      background-color: #45a049;
    }

    #confirmation-message {
      background-color: #4caf50;
      color: #fff;
      padding: 15px 20px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      text-align: center;
      display: none;
      max-width: 400px;
      margin: 20px auto;
    }
  </style>
</head>
<body>
  <h1>Administer Vaccines</h1>

  <!-- Patient Information Form -->
  <form id="patient-info-form">
    <h2>Patient Information</h2>
    <label for="patient-name">Patient Name:</label>
    <input type="text" id="patient-name" name="patient-name" required>

    <label for="age">Age:</label>
    <input type="number" id="age" name="age" required>

    <label for="gender">Gender:</label>
    <select id="gender" name="gender">
      <option value="male">Male</option>
      <option value="female">Female</option>
      <option value="other">Other</option>
    </select>

    <label for="vaccine-selection">Select Vaccine:</label>
    <select id="vaccine-selection" name="vaccine-selection">
      <!-- Populate options dynamically from available inventory -->
      <option value="vaccine1">Vaccine A</option>
      <option value="vaccine2">Vaccine B</option>
    </select>

    <label for="dosage-amount">Dosage Amount:</label>
    <input type="number" id="dosage-amount" name="dosage-amount" required>

    <input type="submit" value="Administer">
  </form>

  <!-- Confirmation/Success Message -->
  <div id="confirmation-message">
    <p>Administered successfully!</p>
  </div>

  <script>
    // JavaScript code for handling form submission and vaccine administration
    const form = document.getElementById('patient-info-form');
    const confirmationMessage = document.getElementById('confirmation-message');

    form.addEventListener('submit', function(event) {
      event.preventDefault(); // Prevent default form submission

      // Get form data
      const formData = new FormData(form);
      const data = {};
      for (const [key, value] of formData.entries()) {
        data[key] = value;
      }

      // Process the administration (here you might send it to a server-side script)
      // For this example, just displaying a confirmation message
      confirmationMessage.style.display = 'block';
      form.reset(); // Reset form fields
      setTimeout(function() {
        confirmationMessage.style.display = 'none'; // Hide confirmation after a few seconds
      }, 3000);
    });
  </script>
</body>
</html>

    
  </body>
</html>