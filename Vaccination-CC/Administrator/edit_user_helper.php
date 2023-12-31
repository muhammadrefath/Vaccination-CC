<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['user_id'];
    $name = $conn->real_escape_string($_POST['fullName']);
    $user = $conn->real_escape_string($_POST['user']);
    $pass = $conn->real_escape_string($_POST['pass']);
    $role = $conn->real_escape_string($_POST['user_role']);
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    $sql = "UPDATE users 
            SET name = ?,
                username = ?,
                password = ?,
                role = ?
            WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $name, $user, $hashed_password, $role, $id);

    if ($stmt->execute()) {
        header("Location: {$_SERVER['HTTP_REFERER']}");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>