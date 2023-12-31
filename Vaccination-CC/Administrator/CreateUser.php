<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $conn->real_escape_string($_POST['username']);
    $pass = $conn->real_escape_string($_POST['password']);
    $role = $conn->real_escape_string($_POST['user_role']);
    $name = $conn->real_escape_string($_POST['fullName']);

    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password, role, name) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $user, $hashed_password, $role, $name);

    if ($stmt->execute()) {
        header("Location: {$_SERVER['HTTP_REFERER']}");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

?>