<?php
$servername = "localhost";
$username = "root";
$password = "root1230";
$dbname = "vaccine_inventory";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
