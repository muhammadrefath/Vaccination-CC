<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['role'] !== 'administrator') {
    header('Location: ../index.php');
    exit;
}

include 'database.php';

// Live vaccines
$live = "SELECT COUNT(unit) FROM vaccines WHERE vtype = 'live_attenuated'";
$liveRes = $conn->query($live);
$liveRow = $liveRes->fetch_row();
$total_live_attenuated = $liveRow[0];


// inactive vaccines
$inactive = "SELECT COUNT(unit) FROM vaccines WHERE vtype = 'inactivated'";
$inactiveRes = $conn->query($inactive);
$inactiveRow = $inactiveRes->fetch_row();
$total_inactive = $inactiveRow[0];


// subunit vaccines
$subunit = "SELECT COUNT(unit) FROM vaccines WHERE vtype = 'subunit'";
$subunitRes = $conn->query($subunit);
$subunitRow = $subunitRes->fetch_row();
$total_subunit = $subunitRow[0];


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
      <a href="Dashboard.php"><i class="fa fa-fw fa-home"></i>Dashboard</a>
    
      
      <div class="dropdown">
        <button class="dropbtn"><b>Vaccine Management</b>
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="AddVaccineScreen.php">Add vaccine </a>
          <a href="UpdateVaccine.php">Update Vaccine</a>
          <a href="DeleteVaccine.php">Delete Vaccine</a>
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
  
  <!-- Load the Google Charts -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <style>
    .chart-container {
      display: flex;
      justify-content: space-between;
    }
    .left-chart {
      width: 50%;
      float: left;
    }
    .right-chart {
      width: 50%;
      float: right;
    }
  </style>
</head>
<body>

  <div class="chart-container">
    <!-- Left-aligned Line Chart -->
    <div class="left-chart" id="line-chart"></div>

    <!-- Right-aligned Pie Chart -->
    <div class="right-chart" id="pie-chart"></div>
  </div>

  <script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawCharts);

    function drawCharts() {
      drawLineChart();
      drawPieChart();
    }

    function drawLineChart() {
      var data = new google.visualization.DataTable();
      data.addColumn('date', 'Date');
      data.addColumn('number', 'Vaccination Coverage');

      // Add your data to the DataTable (replace with your actual data)
      data.addRows([
        [new Date(2023, 0, 1), 75],
        [new Date(2023, 1, 1), 80],
        [new Date(2023, 2, 1), 85],
        // Add more data points as needed
      ]);

      var options = {
        title: 'Vaccination Coverage Rates Over Time',
        curveType: 'function',
        legend: { position: 'bottom' },
        width: '100%',
        height: 400
      };

      var chart = new google.visualization.LineChart(document.getElementById('line-chart'));
      chart.draw(data, options);
    }

    function drawPieChart() {
      var data = google.visualization.arrayToDataTable([
        ['Vaccine Types', 'Unit'],
        ['Live Attenuated', <?php echo $total_live_attenuated; ?>],
        ['Subunit', <?php echo $total_subunit;?>],
        ['Inactive', <?php echo $total_inactive;?>],
        // Add more age groups and data as needed
      ]);

      var options = {
        title: 'Vaccine Status',
        width: '100%',
        height: 400
      };

      var chart = new google.visualization.PieChart(document.getElementById('pie-chart'));
      chart.draw(data, options);
    }
  </script>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
  <title>Vaccination Statistics</title>
  <!-- Load the Google Charts -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <style>
    .chart-container {
      display: flex;
      justify-content: space-between;
    }
    .left-chart {
      width: 50%;
      float: left;
    }
    .right-chart {
      width: 50%;
      float: right;
    }
  </style>
</head>
<body>
  <h1>Vaccination Statistics</h1>

  <div class="chart-container">
    <!-- Left-aligned Segmented Bar Chart -->
    <div class="left-chart" id="segmented-bar-chart"></div>

    <!-- Right-aligned Progress Bar Chart -->
    <div class="right-chart" id="progress-bar-chart"></div>
  </div>

  <script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawCharts);

    function drawCharts() {
      drawSegmentedBarChart();
      drawProgressBarChart();
    }

    function drawSegmentedBarChart() {
      var data = google.visualization.arrayToDataTable([
        ['Demographic', 'Male', 'Female', 'Other'],
        ['Ethnicity', 60, 75, 45],
        ['Socioeconomic Status', 80, 65, 55],
        // Add more demographics and data as needed
      ]);

      var options = {
        title: 'Vaccination Rates by Demographics',
        width: '100%',
        height: 400,
        isStacked: true,
        legend: { position: 'top' }
      };

      var chart = new google.visualization.ColumnChart(document.getElementById('segmented-bar-chart'));
      chart.draw(data, options);
    }

    function drawProgressBarChart() {
      var data = google.visualization.arrayToDataTable([
        ['Label', 'Percentage'],
        ['Completed Vaccination', 85],
      ]);

      var options = {
        title: 'Progress of Full Vaccination Schedule',
        width: '100%',
        height: 400,
        colors: ['#4CAF50'],
        legend: { position: 'none' },
        hAxis: {
          minValue: 0,
          maxValue: 100,
          ticks: [0, 25, 50, 75, 100]
        }
      };

      var chart = new google.visualization.BarChart(document.getElementById('progress-bar-chart'));
      chart.draw(data, options);
    }
  </script>
</body>
</html>





    