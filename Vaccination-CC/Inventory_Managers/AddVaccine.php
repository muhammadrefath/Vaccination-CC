<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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



    $sql = "INSERT INTO vaccines (name, unit, price, manufacturer, vtype, diseases, mdate, expdate, bnumber, stemp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siisssssss", $name, $unit, $price, $manufacturer, $vtype, $diseases, $mdate, $expdate, $bnumber, $stemp);

    if ($stmt->execute()) {
        header("Location: {$_SERVER['HTTP_REFERER']}");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>