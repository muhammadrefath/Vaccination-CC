<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['role'] !== 'dispatcher') {
    header('Location: ../index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="admin.css" />
  </head>
  <body>
    <div id="header"><h1>Dashboard</h1>    </div>
    <div class="navbar">
      
      <a href="#news">Dashboard</a>
      <a href="#news">Recalls</a>
      <a href="#news">Safety Alerts</a>
      <a href="#news">Messaging</a>
      <a href="#news">Settings</a>

    </div>

    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dispatcher Dashboard</title>
  <style>
    /* CSS styles for the Dispatcher Dashboard */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
      color: #333;
    }

    .dashboard {
      max-width: 1200px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      color: #444;
      margin-bottom: 30px;
    }

    .tiles {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
      gap: 20px;
    }

    .tile {
      width: 300px;
      padding: 20px;
      background-color: #007bff;
      color: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
      text-align: center;
      transition: transform 0.3s ease-in-out;
    }

    .tile:hover {
      transform: translateY(-5px);
    }

    .tile h2 {
      margin-bottom: 10px;
    }

    .tile p {
      font-size: 16px;
      opacity: 0.8;
    }
  </style>
</head>
<body>
  <div class="dashboard">
    <h1>Dispatcher Dashboard</h1>

    <div class="tiles">
      <div class="tile">
        <h2>Recalls</h2>
        <p>Manage vaccine recalls</p>
      </div>

      <div class="tile">
        <h2>Safety Alerts</h2>
        <p>Distribute safety alerts</p>
      </div>

      <div class="tile">
        <h2>Messaging</h2>
        <p>Communicate with stakeholders</p>
      </div>

      <div class="tile">
        <h2>Settings</h2>
        <p>Manage preferences</p>
      </div>
    </div>
  </div>
</body>
</html>

    
    
  </body>
</html>