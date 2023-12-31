<?php
include 'database.php';

if (isset($_GET['id'])) {
    $vaccineId = $_GET['id'];

    $sql = "DELETE FROM vaccines WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $vaccineId);

    if ($stmt->execute()) {
        echo "Vaccine deleted successfully.";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "No vaccine ID provided for deletion.";
}

header("Location: DeleteVaccine.php");
?>
