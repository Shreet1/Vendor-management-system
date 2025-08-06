<?php
$conn = new mysqli("localhost", "root", "", "your_database");
$vendor_id = $_POST['vendor_id'];
$vehicle_type = $_POST['vehicle_type'];
$price = $_POST['price'];

$stmt = $conn->prepare("INSERT INTO replies (vendor_id, vehicle_type, price) VALUES (?, ?, ?)");
$stmt->bind_param("isd", $vendor_id, $vehicle_type, $price);
$stmt->execute();
echo "Thanks! Your quote has been recorded.";
?>
