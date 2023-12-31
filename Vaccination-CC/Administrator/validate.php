<?php

// var_dump($_POST);
// exit;

session_start();
include 'database.php';

$role = $_POST['user_role'] ?? '';
$user = $_POST['username'] ?? '';
$pass = $_POST['password'] ?? '';

$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND role = ?");
$stmt->bind_param("ss", $user, $role);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    if (password_verify($pass, $row['password'])) {

        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];

        switch ($row['role']) {
            case 'administrator':
                header('Location: Dashboard.php');
                break;
            case 'inventory_manager':
                header('Location: ../Inventory_Managers/Dashboard.php');
                break;
            case 'dispatcher':
                header('Location: ../Dispatchers/Dashboard.php');
                break;
            case 'staff':
                header('Location: ../Staff/Dashboard.php');
                break;
            default:
                header('Location: ../index.php?error=roleerror');
                break;
        }
        exit;
    } else {
        header('Location: ../index.php?error=invalidcredentials');
        exit;
    }
} else {
    header('Location: ../index.php?error=usernamenotfound');
    exit;
}

$stmt->close();

$conn->close();
?>