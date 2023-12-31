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
    <title>Update Vaccine</title>
    <link rel="stylesheet" href="admin.css" />
  </head>
  <body>
    <div id="header"><h1>Update Vaccine</h1>    </div>
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
      <title>Update Vaccine</title>
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

    <script>
    function fetchVaccineData(vaccineId) {
        if (vaccineId == "") {
            return;
        }

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var vaccineData = JSON.parse(this.responseText);
                document.getElementById("vaccine_id").value = vaccineId;
                document.getElementById("vaccine_name").value = vaccineData.name || '';
                document.getElementById("vaccine_manufacturer").value = vaccineData.manufacturer || '';
                document.getElementById("manufacturing_date").value = vaccineData.mdate || '';
                document.getElementById("expire_date").value = vaccineData.expdate || '';
                document.getElementById("batch_number").value = vaccineData.bnumber || '';
                document.getElementById("storage_temperature").value = vaccineData.stemp || '';
                document.getElementById("vaccine_unit").value = vaccineData.unit || '';
                document.getElementById("vaccine_price").value = vaccineData.price || '';
                document.getElementById("vaccine_type").value = vaccineData.vtype || '';
                document.getElementById("vaccine_diseases").value = vaccineData.diseases || '';
            }
        };
        xhttp.open("GET", "fetch_vaccine_data.php?vaccineId=" + vaccineId, true);
        xhttp.send();
    }

    function showAlert() {
        alert('Vaccine data updated successfully!');
    }
    </script>

      <div class="container">
        <h2>Update Vaccine</h2>
        <form action="update_helper.php" method="POST">
          <label for="vaccine_list">Select Vaccine to Update:</label>
          <select id="vaccine_list" name="vaccine_list" onchange="fetchVaccineData(this.value)">
            <?php
            include 'database.php';
            $sql = "SELECT id, name, unit, price, manufacturer, vtype, mdate, diseases, expdate, bnumber, stemp FROM vaccines";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $vaccineId = $row['id'];
                    $vaccineName = $row['name'];
                    echo "<option value=\"$vaccineId\">$vaccineName</option>";
                }
            } else {
                echo "<option value=\"\">No vaccines available</option>";
            }

            $conn->close();
            ?>
          </select>
          <input type="hidden" id="vaccine_id" name="vaccine_id">
          <label for="vaccine_name">Vaccine Name:</label>
          <input type="text" id="vaccine_name" name="vaccine_name" required>

          <label for="vaccine_manufacturer">Manufacturer:</label>
          <input type="text" id="vaccine_manufacturer" name="vaccine_manufacturer" required>

          <label for="manufacturing_date">Manufacturing Date:</label>
          <input type="date" id="manufacturing_date" name="manufacturing_date" required>

          <label for="expire_date">Expiration Date:</label>
          <input type="date" id="expire_date" name="expire_date" required>

          <label for="batch_number">Batch Number:</label>
          <input type="text" id="batch_number" name="batch_number" required>

          <label for="storage_temperature">Storage Temperature (&#176;
    C):</label>
          <input type="text" id="storage_temperature" name="storage_temperature" required>

          <label for="vaccine_unit">Unit:</label>
          <input id="vaccine_unit" type="number" name="vaccine_unit">

          <label for="vaccine_price">Price:</label>
          <input id="vaccine_price" type="number" name="vaccine_price">

          <label for="vaccine_type">Vaccine Type:</label>
          <select id="vaccine_type" name="vaccine_type">
            <option value="live_attenuated">Live Attenuated</option>
            <option value="inactivated">Inactivated</option>
            <option value="subunit">Subunit</option>
          </select>

          <label for="vaccine_diseases">Target Diseases:</label>
          <input type="text" id="vaccine_diseases" name="vaccine_diseases" required>
    
          <input type="submit" value="Update Vaccine" onclick="showAlert()">
        </form>
      </div>
    </body>
    </html>