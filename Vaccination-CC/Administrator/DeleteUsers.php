<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['role'] !== 'administrator') {
    header('Location: ../index.php');
    exit;
}
?>

<?php
include 'database.php';

function fetchUsers() {
    global $conn;
    $sql = "SELECT id, name, username, role, lastlog, status FROM users";
    $result = $conn->query($sql);
    $users = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
    }
    return $users;
}

function deleteUsers($userIds) {
    global $conn;
    $sql = "DELETE FROM users WHERE id IN (" . implode(',', array_map('intval', $userIds)) . ")";
    $conn->query($sql);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteUsers'])) {
    $userIds = $_POST['deleteUsers'];
    deleteUsers($userIds);
    header("Location: DeleteUsers.php");
    exit();
}

$users = fetchUsers();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Delete Users</title>
    <link rel="stylesheet" href="admin.css" />
  </head>
  <body>
    <div id="header"><h1>Delete Users</h1>    </div>
    <div class="navbar">
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
  <title>Delete Users</title>
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

    .delete-btn {
      padding: 6px 12px;
      background-color: #f44336;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .confirmation-message {
      display: none;
      text-align: center;
      padding: 10px;
      margin-top: 20px;
      background-color: #dff0d8;
      border: 1px solid #3c763d;
      color: #3c763d;
      border-radius: 4px;
    }

    .show-message {
      display: block;
    }
  </style>
</head>
<body>
<script>
function deleteUsers() {
    var selectedUsers = document.querySelectorAll('.delete-checkbox:checked');
    if (selectedUsers.length > 0) {
        document.getElementById('deleteForm').submit();
    } else {
        alert('Please select users to delete.');
    }
}

</script>
  <div class="container">
    <h2>Delete Users</h2>
    <table>
      <thead>
        <tr>
          <th></th>
          <th>Full Name</th>
          <th>Username</th>
          <th>Role</th>
          <th>Last Login</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <tr class="user-row">
            <form method="POST" action="" id="deleteForm">
          <td><input type="checkbox" class="delete-checkbox"></td>
            <?php foreach ($users as $user): ?>
            <tr class="user-row">
            <td><input type="checkbox" class="delete-checkbox" name="deleteUsers[]" value="<?php echo $user['id']; ?>"></td>
            <td><?php echo htmlspecialchars($user['name']); ?></td>
            <td><?php echo htmlspecialchars($user['username']); ?></td>
            <td><?php echo htmlspecialchars($user['role']); ?></td>
            <td><?php echo htmlspecialchars($user['lastlog']); ?></td>
            <td><?php echo htmlspecialchars($user['status']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tr>
      </tbody>
    </table>
    <button class="delete-btn" onclick="deleteUsers()">Delete Selected Users</button>
    <div class="confirmation-message" id="confirmationMessage">
      Users deleted successfully!
    </div>
  </div>
</form>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
  <title>Deleted Users Log</title>
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

    .log-container {
      margin-top: 20px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      max-height: 300px;
      overflow-y: auto;
    }

    .log-entry {
      margin-bottom: 8px;
      padding: 8px;
      border-bottom: 1px solid #ddd;
    }

    .log-entry:last-child {
      border-bottom: none;
    }

    .log-entry p {
      margin: 0;
    }

    .log-entry .timestamp {
      font-weight: bold;
      color: #777;
    }

    .log-entry .deleted-user {
      color: #f44336;
      font-weight: bold;
    }
  </style>
</head>
</html>


    
    
  </body>
</html>