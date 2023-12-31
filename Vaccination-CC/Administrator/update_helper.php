<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['vaccine_id'];
    $name = $_POST['vaccine_name'];
    $unit = $_POST['vaccine_unit'];
    $price = $_POST['vaccine_price'];
    $manufacturer = $_POST['vaccine_manufacturer'];
    $vtype = $_POST['vaccine_type'];
    $diseases = $_POST['vaccine_diseases'];
    $mdate = $_POST['manufacturing_date'];
    $expdate = $_POST['expire_date'];
    $bnumber = $_POST['batch_number'];
    $stemp = $_POST['storage_temperature'];

    $sql = "UPDATE vaccines 
            SET name = ?,
                manufacturer = ?,
                mdate = ?,
                expdate = ?, 
                bnumber = ?, 
                stemp = ?, 
                unit = ?, 
                price = ?, 
                vtype = ?, 
                diseases = ? 
            WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssiissi", $name, $manufacturer, $mdate, $expdate, $bnumber, $stemp, $unit, $price, $vtype, $diseases, $id);

    if ($stmt->execute()) {
        header("Location: {$_SERVER['HTTP_REFERER']}");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>