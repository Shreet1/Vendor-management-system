<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$conn = new mysqli(
    "sql102.infinityfree.com",   // ✅ Hostname
    "if0_39429648",              // ✅ Username
    "SxSajOIeFAZSQa",        // 🔒 Replace with your actual password
    "if0_39429648_new_logistics"     // ✅ Database name
);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// collect data
$name = $_POST['name'];
$location = $_POST['location'];
$whatsapp = $_POST['whatsapp'];
$route = $_POST['route'];
$vehicle_type = $_POST['vehicle_type'];

// insert
$stmt = $conn->prepare("INSERT INTO vendors (name, location, whatsapp, route, vehicle_type) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $location, $whatsapp, $route, $vehicle_type);
if ($stmt->execute()) {
    echo "Vendor added successfully! <a href='add_vendor.php'>Add another</a> or <a href='search.php'>Search Vendors</a>";
} else {
    echo "Error: " . $stmt->error;
}
?>

