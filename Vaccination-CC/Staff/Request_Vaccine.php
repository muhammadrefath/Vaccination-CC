<?php
include 'database.php';

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['role'] !== 'staff') {
    header('Location: ../index.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vname = $_POST['vaccine-name'];
    $quantity = $_POST['quantity'];
    $priority = $_POST['priority'];
    $rname = $_POST['requester-name'];
    $contact = $_POST['contact'];
    $xdate = $_POST['date-needed'];
    $status = $_POST['status'];



    $sql = "INSERT INTO pending_vaccine (vname, quantity, priority, rname, contact, xdate, status) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisssss", $vname, $quantity, $priority, $rname, $contact, $xdate, $status);

    if ($stmt->execute()) {
        header("Location: {$_SERVER['HTTP_REFERER']}");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Request Vaccine</title>
    <link rel="stylesheet" href="admin.css" />
  </head>
  <body>
    <div id="header"><h1>Request Vaccine</h1>    </div>
    <div class="navbar">
      <a href="Dashboard.php"></i>Dashboard</a>
    
      
      <a href="Request_Vaccine.php">Request Vaccine</a>
      <!-- <a href="Administrator_Vaccine.php">Administrator Vaccines</a> -->


    </div>

      


    </div>


    
    
    
  </body>
</html>

<!DOCTYPE html>
<html>
<head>
  <title>Request Vaccine - Staff</title>
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
    form input[type="date"],
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

    #inventory,
    #history,
    #confirmation-message {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
      max-width: 800px;
      margin: 20px auto;
    }

    #inventory h2,
    #history h2 {
      color: #444;
      margin-bottom: 15px;
    }

    #confirmation-message {
      background-color: #4caf50;
      color: #fff;
      padding: 15px 20px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      text-align: center;
    }
  </style>
</head>
<body>

<script>
function showAlert() {
    alert('Vaccine Request Submitted');
}
</script>

  <h1>Request Vaccine</h1>

  <!-- Form for Vaccine Request -->
  <form id="vaccine-request-form" method="POST" action="">
    <h2>Request Form</h2>
    <input type="hidden" id="status" name="status" value="Pending">
    <label for="vaccine-name">Vaccine Name:</label>
    <input type="text" id="vaccine-name" name="vaccine-name" required>

    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" name="quantity" required>

    <label for="priority">Priority Level:</label>
    <select id="priority" name="priority">
      <option value="high">High</option>
      <option value="medium">Medium</option>
      <option value="low">Low</option>
    </select>

    <label for="requester-name">Requester's Name:</label>
    <input type="text" id="requester-name" name="requester-name" required>

    <label for="contact">Contact Details:</label>
    <input type="text" id="contact" name="contact" required>

    <label for="date-needed">Date Needed:</label>
    <input type="date" id="date-needed" name="date-needed" required>

    <input type="submit" value="Submit" onclick="showAlert()">
  </form>

<?php
include 'database.php';

function getCurrentRequests($conn) {
  $sql = "SELECT * FROM pending_vaccine ORDER BY id DESC";
  $result = $conn->query($sql);

  $requests = array();
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $requests[] = $row;
    }
  }
  return $requests;
}

$requests = getCurrentRequests($conn);
?>
<div id="history">
    <h2>Request History</h2>
    <?php foreach($requests as $request): ?>
        <p>Request ID: <?php echo htmlspecialchars($request['id']); ?> - <?php echo htmlspecialchars($request['vname']); ?>: <?php echo htmlspecialchars($request['quantity']); ?> doses (<?php echo htmlspecialchars($request['status']); ?>)</p>
    <?php endforeach; ?>
</div>
</body>
</html>
  
    
    
    
