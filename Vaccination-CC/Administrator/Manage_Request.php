<?php
include 'database.php';

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['role'] !== 'administrator') {
    header('Location: ../index.php');
    exit;
}

function getCurrentUserName($conn) {
    $userId = $_SESSION['user_id'];
    $sql = "SELECT name FROM users WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        return $row['name'];
    } else {
        return "Unknown User";
    }
}

function getAllVaccineRequests($conn) {
    $sql = "SELECT * FROM pending_vaccine";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result;
    } else {
        return [];
    }
}

function approveRequest($conn, $requestId) {
    $sql = "UPDATE pending_vaccine SET status='Approved' WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $requestId);
    $stmt->execute();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['approve'])) {
    $requestId = $_POST['request_id'];
    approveRequest($conn, $requestId);
    // Optionally, redirect to AddVaccineScreen.php
    header("Location: AddVaccineScreen.php?request_id=" . $requestId);
    // exit;
}

function rejectRequest($conn, $requestId) {
    $sql = "UPDATE pending_vaccine SET status='Rejected' WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $requestId);
    $stmt->execute();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reject'])) {
    $requestId = $_POST['request_id'];
    rejectRequest($conn, $requestId);
}

$vaccineRequests = getAllVaccineRequests($conn);
$requestUser = getCurrentUserName($conn)
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Vaccine Request</title>
    <link rel="stylesheet" href="admin.css" />
  </head>
  <body>
    <div id="header"><h1>Vaccine Request</h1>    </div>
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
  <title>Vaccine Request - Inventory Manager</title>
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
    <h2>Vaccine Requests</h2>
    <table>
      <thead>
        <tr>
          <th>Vaccine Name</th>
          <th>Quantity Requested</th>
          <th>Status</th>
          <th>Requester Contact</th>
          <th>Actions</th>
        </tr>
      </thead>
<tbody>
  <?php foreach ($vaccineRequests as $request): ?>
    <tr>
      <td><?php echo htmlspecialchars($request['vname']); ?></td>
      <td><?php echo htmlspecialchars($request['quantity']); ?></td>
      <td><?php echo htmlspecialchars($request['status']); ?></td>
      <td><?php echo htmlspecialchars($request['contact']); ?></td>
      <td>

        <form method="POST" action="">
          <input type="hidden" name="request_id" value="<?php echo $request['id']; ?>">
          <input type="submit" name="approve" value="Approve" class="btn-approve">
          <input type="hidden" name="request_id" value="<?php echo $request['id']; ?>">
          <input type="submit" name="reject" value="Reject" class="btn-reject">
        </form>
      </td>
    </tr>
  <?php endforeach; ?>
</tbody>
    </table>

    <h3>Request History</h3>
    <table>
      <thead>
        <tr>
          <th>Managed By</th>
          <th>Vaccine Name</th>
          <th>Quantity</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <?php foreach ($vaccineRequests as $history): ?>
        <td><?php echo $requestUser; ?></td>
        <td><?php echo htmlspecialchars($history['vname']); ?></td>
        <td><?php echo htmlspecialchars($history['quantity']); ?></td>
        <td><?php echo htmlspecialchars($history['status']); ?></td>
      </tr>
    <?php endforeach; ?>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>

    
  </body>
</html>