<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Safety Alerts</title>
    <link rel="stylesheet" href="admin.css" />
  </head>
  <body>
    <div id="header"><h1>Safety Alerts</h1>    </div>
    <div class="navbar">
      <a href="#dashboard">Dashboard</a>
      <a href="#recalls">Recalls</a>
      <a href="#alerts">Safety Alerts</a>
      <a href="#messaging">Messaging</a>
      <a href="#settings">Settings</a>


    </div>

    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Security Alerts - Dispatcher</title>
  <style>
    /* General Styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #f5f5f5;
      color: #333;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }

    h1 {
      text-align: center;
      color: #444;
      margin-bottom: 30px;
    }

    /* Alert Listing Styles */
    .alert-list {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 30px;
    }

    .alert-item {
      border-bottom: 1px solid #ddd;
      padding: 10px;
      cursor: pointer;
    }

    .alert-item:hover {
      background-color: #f9f9f9;
    }

    .alert-details {
      display: none;
      padding: 10px;
      margin-top: 10px;
      background-color: #f9f9f9;
      border-radius: 8px;
    }

    .alert-details.active {
      display: block;
    }

    /* Communication Section Styles */
    .communication {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 30px;
    }

    textarea {
      width: calc(100% - 22px);
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 4px;
      border: 1px solid #ccc;
      font-size: 14px;
      resize: vertical;
    }

    input[type="submit"] {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
    }

    /* Alert History Styles */
    .alert-history {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 30px;
    }

    input[type="search"] {
      width: calc(100% - 22px);
      padding: 10px;
      border-radius: 4px;
      border: 1px solid #ccc;
      font-size: 14px;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Security Alerts</h1>

    <!-- Alert Listing Section -->
    <div class="alert-list">
      <div class="alert-item" onclick="showAlertDetails(1)">
        Alert #1 - Security Breach (High) - 2023-11-25
      </div>
      <div class="alert-details" id="alert1Details">
        <p>Affected Systems: System A, System B</p>
        <p>Potential Risks: Data Leakage</p>
        <p>Actions Taken: Investigation initiated</p>
        <p>Severity: High</p>
      </div>

      <!-- More alert items can be added -->
    </div>

    <!-- Communication Section -->
    <div class="communication">
      <h2>Communication Features</h2>
      <textarea placeholder="Compose message to stakeholders"></textarea>
      <input type="submit" value="Send Message">
    </div>

    <!-- Alert History Section -->
    <div class="alert-history">
      <h2>Alert History</h2>
      <input type="search" placeholder="Search past alerts">
      <div class="alert-item">
        Alert #1 - Security Breach (Resolved) - 2023-11-20
      </div>
      <!-- More past alert items can be added -->
    </div>
  </div>

  <script>
    function showAlertDetails(alertId) {
      const alertDetails = document.getElementById(`alert${alertId}Details`);
      alertDetails.classList.toggle('active');
    }
  </script>
</body>
</html>

    
    
  </body>
</html>