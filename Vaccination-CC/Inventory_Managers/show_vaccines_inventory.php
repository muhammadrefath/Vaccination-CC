<?php
include 'database.php';

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['role'] !== 'inventory_manager') {
    header('Location: ../index.php');
    exit;
}

function getAllVaccineData($conn) {
    $sql = "SELECT * FROM vaccines";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result;
    } else {
        return [];
    }
}


$vaccineDatas = getAllVaccineData($conn);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Vaccine Data</title>
    <link rel="stylesheet" href="admin.css" />
  </head>
  <body>
    <div id="header"><h1>Vaccine Data</h1>    </div>
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
  <title>Vaccine Data</title>
  <style>
    /* Basic styling for the page */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    .container {
      width: 80%;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    input[type="text"],
    select {
      width: calc(100% - 18px);
      padding: 8px;
      margin-bottom: 10px;
      border-radius: 4px;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    .btn-approve,
    .btn-reject,
    .btn-fulfill {
      padding: 6px 12px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .btn-approve {
      background-color: #5cb85c;
      color: white;
    }

    .btn-reject {
      background-color: #d9534f;
      color: white;
    }

    .btn-fulfill {
      background-color: #428bca;
      color: white;
    }

    .notification {
      margin-bottom: 20px;
      padding: 10px;
      border-radius: 4px;
    }

    .notification.pending {
      background-color: #f0ad4e;
      color: white;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Vaccine Data</h2>
    <table>
      <thead>
        <tr>
          <th>Vaccine Name</th>
          <th>Unit</th>
          <th>Price</th>
          <th>Manufacturer</th>
          <th>Type</th>
          <th>Diseases</th>
          <th>Manufacturing Date</th>
          <th>Expiration Date</th>
          <th>Batch Number</th>
          <th>Storage Temperature</th>
        </tr>
      </thead>
<tbody>
  <?php foreach ($vaccineDatas as $datas): ?>
    <tr>
      <td><?php echo htmlspecialchars($datas['name']); ?></td>
      <td><?php echo htmlspecialchars($datas['unit']); ?></td>
      <td><?php echo htmlspecialchars($datas['price']); ?></td>
      <td><?php echo htmlspecialchars($datas['manufacturer']); ?></td>
      <td><?php echo htmlspecialchars($datas['vtype']); ?></td>
      <td><?php echo htmlspecialchars($datas['diseases']); ?></td>
      <td><?php echo htmlspecialchars($datas['mdate']); ?></td>
      <td><?php echo htmlspecialchars($datas['expdate']); ?></td>
      <td><?php echo htmlspecialchars($datas['bnumber']); ?></td>
      <td><?php echo htmlspecialchars($datas['stemp']); ?></td>
      </td>
    </tr>
  <?php endforeach; ?>
</tbody>
  </body>
</html>