<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Recalls</title>
    <link rel="stylesheet" href="admin.css" />
  </head>
  <body>
    <div id="header"><h1>Recalls</h1>    </div>
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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Recalls - Dispatcher</title>
  <link rel="stylesheet" href="admin.css">
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
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h1, h2 {
      text-align: center;
      color: #444;
      margin-bottom: 30px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 30px;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
      font-weight: bold;
    }

    /* Section Styles */
    .section {
      background-color: #f9f9f9;
      padding: 20px;
      border-radius: 8px;
      margin-bottom: 30px;
    }

    /* Specific Styles for Components */
    .recall-details p {
      margin-bottom: 10px;
    }

    /* Form Elements and Buttons */
    select,
    textarea {
      width: calc(100% - 22px);
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 4px;
      border: 1px solid #ccc;
      font-size: 14px;
    }

    textarea {
      height: 100px;
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
  </style>
</head>
<body>
  <div class="container">
    <h1>Recall Management - Dispatcher</h1>

    <!-- Navbar -->
    <div class="navbar">
      <a href="#dashboard">Dashboard</a>
      <a href="#recalls">Recalls</a>
      <a href="#alerts">Safety Alerts</a>
      <a href="#messaging">Messaging</a>
      <a href="#settings">Settings</a>
    </div>

    <!-- Recall Listing Table -->
    <table>
      <thead>
        <tr>
          <th>Recall ID</th>
          <th>Product Name</th>
          <th>Recall Date</th>
          <th>Reason</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <!-- Replace with actual recall data -->
        <!-- <tr>
          <td>1</td>
          <td>Product A</td>
          <td>2023-11-01</td>
          <td>Quality Issue</td>
          <td>Ongoing</td>
        </tr> -->
      </tbody>
    </table>

    <!-- Recall Details Section -->
    <div class="section recall-details">
      <h2>Recall Details</h2>
      <!-- Display recall details here -->
    </div>

    <!-- Update Recall Status Section -->
    <div class="section update-recall-status">
      <h2>Update Recall Status</h2>
      <!-- Update recall status form -->
      <form>
        <label for="status">Select Status:</label>
        <select id="status">
          <option value="ongoing">Ongoing</option>
          <option value="resolved">Resolved</option>
          <option value="closed">Closed</option>
        </select>
        <label for="comments">Add Notes/Comments:</label>
        <textarea id="comments" placeholder="Add notes or comments"></textarea>
        <input type="submit" value="Update Status">
      </form>
    </div>

    <!-- Communication Features Section -->
    <div class="section communication-features">
      <h2>Communication Features</h2>
      <!-- Messaging functionality -->
      <textarea placeholder="Compose message to stakeholders"></textarea>
      <input type="submit" value="Send Message">
      <!-- Email templates -->
      <select>
        <option value="template1">Template 1</option>
        <option value="template2">Template 2</option>
      </select>
      <input type="submit" value="Send Template">
    </div>

    <!-- Recall History Section -->
    <div class="section recall-history">
      <h2>Recall History</h2>
      <!-- Show recall history -->
      <input type="search" placeholder="Search past recalls">
      <table>
        <!-- Past recalls history table -->
        <!-- Add actual past recall data -->
      </table>
    </div>

    <!-- Reporting and Analytics Section -->
    <div class="section reporting-analytics">
      <h2>Reporting and Analytics</h2>
      <!-- Generate reports or analytics -->
      <p>Recall Frequency Report</p>
      <p>Recall Severity Analytics</p>
    </div>

    <!-- Settings or Preferences Section -->
    <div class="section settings-preferences">
      <h2>Settings or Preferences</h2>
      <!-- Manage settings or preferences -->
      <label for="notifications">Notification Preferences:</label>
      <select id="notifications">
        <option value="email">Email</option>
        <option value="sms">SMS</option>
      </select>
      <label for="user-access">User Access Levels:</label>
      <select id="user-access">
        <option value="admin">Admin</option>
        <option value="dispatcher">Dispatcher</option>
      </select>
    </div>
  </div>
</body>
</html>


    
    
  </body>
</html>