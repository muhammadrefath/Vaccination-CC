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
    <title>Dashboard</title>
    <link rel="stylesheet" href="admin.css" />
  </head>
  <body>
    <div id="header"><h1>Dashboard</h1>    </div>
    <div class="navbar">
      <a href="Dashboard.php"></i>Dashboard</a>
    
      
      <a href="Request_Vaccine.php">Request Vaccine</a>
      <!-- <a href="Administrator_Vaccine.php">Administrator Vaccines</a> -->


    </div>


    <!DOCTYPE html>
<html>
<head>
  <title>Vaccine Staff Dashboard</title>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    .dashboard-container {
      width: 90%;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1, h2 {
      text-align: center;
      color: #333;
    }

    .summary {
      margin-bottom: 20px;
      text-align: center;
    }

    .summary p {
      margin: 5px 0;
    }

    .charts-container {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      flex-wrap: wrap;
    }

    .chart {
      width: 45%;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }

    .progress-bar {
      width: 100%;
      height: 20px;
      background-color: #ddd;
      border-radius: 10px;
      margin-bottom: 10px;
      overflow: hidden;
    }

    .progress-bar-inner {
      height: 100%;
      background-color: #4caf50;
      width: 50%; /* Change width dynamically based on progress */
    }

    /* Additional styling can be added based on your design preferences */
    /* Customize styles as needed */
  </style>
</head>
<body>
  <div class="dashboard-container">
    <h1>Vaccine Staff Dashboard</h1>

    <!-- Summary Overview -->
    <div class="summary">
      <h2>Summary Overview</h2>
      <p>Pending Requests: 10</p>
      <p>Administered Vaccines: 50</p>
      <p>Available Inventory: 200 doses</p>
    </div>

    <div class="charts-container">
      <div class="chart" id="pie-chart-container">
        <h2>Pie Chart</h2>
      </div>

      <div class="chart" id="bar-graph-container">
        <h2>Bar Graph</h2>
      </div>

      <div class="chart" id="scatter-graph-container">
        <h2>Scatter Graph</h2>
      </div>
    </div>

    <div class="progress-bar">
      <div class="progress-bar-inner"></div>
    </div>

    <div class="notifications">
      <h2>Notifications</h2>
      <p>Low stock alert: COVID-19 vaccine</p>
    </div>

    <div class="profile">
      <h2>Profile</h2>
      <p>Name: John Doe</p>
      <p>Email: johndoe@example.com</p>
      <a href="#">Edit Profile</a>
    </div>
  </div>

  <script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawCharts);

    function drawCharts() {
      var pieData = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Work', 8],
        ['Eat', 2],
        ['Commute', 2],
        ['Sleep', 8],
        ['Other', 4]
      ]);

      var pieOptions = {
        title: 'Daily Activities',
        is3D: true,
        width: '100%',
        height: '300'
      };

      // Draw the Pie Chart
      var pieChart = new google.visualization.PieChart(document.getElementById('pie-chart-container'));
      pieChart.draw(pieData, pieOptions);

      // Sample data for Bar Graph
      var barData = google.visualization.arrayToDataTable([
        ['Year', 'Sales', 'Expenses'],
        ['2014', 1000, 400],
        ['2015', 1170, 460],
        ['2016', 660, 1120],
        ['2017', 1030, 540]
      ]);

      // Options for Bar Graph
      var barOptions = {
        title: 'Company Performance',
        chartArea: {width: '50%'},
        colors: ['#4caf50', '#f44336'],
        hAxis: {
          title: 'Year',
          minValue: 0
        },
        vAxis: {
          title: 'Amount'
        },
        width: '100%',
        height: '300'
      };

      // Draw the Bar Graph
      var barChart = new google.visualization.BarChart(document.getElementById('bar-graph-container'));
      barChart.draw(barData, barOptions);

      // Sample data for Scatter Graph
      var scatterData = google.visualization.arrayToDataTable([
        ['Age', 'Weight'],
        [8, 12],
        [4, 5.5],
        [11, 14],
        [4, 5],
        [3, 3.5],
        [6.5, 7]
      ]);

      // Options for Scatter Graph
      var scatterOptions = {
        title: 'Age vs. Weight comparison',
        hAxis: {title: 'Age', minValue: 0, maxValue: 15},
        vAxis: {title: 'Weight', minValue: 0, maxValue: 15},
        legend: 'none',
        width: '100%',
        height: '300'
      };

      // Draw the Scatter Graph
      var scatterChart = new google.visualization.ScatterChart(document.getElementById('scatter-graph-container'));
      scatterChart.draw(scatterData, scatterOptions);
    }
  </script>
</body>
</html>




    

  </body>
</html>

