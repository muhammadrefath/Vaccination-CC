<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['role'] !== 'inventory_manager') {
    header('Location: ../index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Delete Vaccine</title>
    <link rel="stylesheet" href="admin.css" />
  </head>
  <body>
    <div id="header"><h1>Delete Vaccine</h1>    </div>
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
          <a href="show_vaccines_inventory.php">Show Vaccines</a>
          <a href="Manage_Request.php">Manage Requests</a>
          
        </div>
      </div>
      <a href="../Administrator/logout.php">Log Out</a>



    </div>

    <!DOCTYPE html>
    <html>
    <head>
      <title>Delete Vaccine</title>
      <style>
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
        input[type="number"],
        select,
        textarea {
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
      </style>
    </head>
    <body>

<?php
include 'database.php';

$sql = "SELECT id, name FROM vaccines";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Vaccine</title>
</head>
<body>
    <h2>Delete Vaccine</h2>
    
    <?php
    if ($result->num_rows > 0) {
        echo "<center>";
        echo "<table>";
        echo "<tr><th>Vaccine Name</th><th>Action</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td><a href='delete_process_vaccine.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No vaccines available";
    }
    ?>
    </center>

    </body>
    </html>