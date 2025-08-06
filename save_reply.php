<?php
// Replace this in files like: search_results.php, submit_reply.php, add_vendor.php, etc.

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
$vendor_id = $_POST['vendor_id'];
$vehicle_type = $_POST['vehicle_type'];
$price = $_POST['price'];

$stmt = $conn->prepare("INSERT INTO replies (vendor_id, vehicle_type, price) VALUES (?, ?, ?)");
$stmt->bind_param("isd", $vendor_id, $vehicle_type, $price);
$stmt->execute();
echo "Thanks! Your quote has been recorded.";
?>
