<?php
include 'database.php';

if(isset($_GET['vaccineId'])) {
    $vaccineId = $_GET['vaccineId'];

    $sql = "SELECT * FROM vaccines WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $vaccineId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(array('error' => 'No data found'));
    }

    $stmt->close();
    $conn->close();
}
?>
