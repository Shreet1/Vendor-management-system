<?php
$conn = new mysqli("localhost", "root", "", "your_database");
$stmt = $conn->prepare("INSERT INTO vendors (name, location, whatsapp, route, vehicle_type) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $_POST['name'], $_POST['location'], $_POST['whatsapp'], $_POST['route'], $_POST['vehicle_type']);
$stmt->execute();
echo "Vendor added successfully";
?>
