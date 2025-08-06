<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connect to database
$conn = new mysqli("sql102.infinityfree.com", "if0_39429648", "SxSajOIeFAZSQa", "if0_39429648_new_logistics");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get all replies, join with vendor info
$sql = "SELECT r.price, r.company_name, r.specific_route, v.name AS vendor_name, v.vehicle_type 
        FROM replies r 
        JOIN vendors v ON r.vendor_id = v.id 
        ORDER BY r.specific_route ASC, r.price ASC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $current_route = '';

    while ($row = $result->fetch_assoc()) {
        if ($row['specific_route'] !== $current_route) {
            $current_route = $row['specific_route'];
            echo "<h2>Route: " . htmlspecialchars($current_route) . "</h2>";
        }

        echo "<strong>Vendor:</strong> " . htmlspecialchars($row['vendor_name']) . "<br>";
        echo "<strong>Vehicle:</strong> " . htmlspecialchars($row['vehicle_type']) . "<br>";
        echo "<strong>Company:</strong> " . htmlspecialchars($row['company_name']) . "<br>";
        echo "<strong>Price:</strong> ₹" . htmlspecialchars($row['price']) . "<br><hr>";
    }
} else {
    echo "No quotes found.";
}

$conn->close();
?>
