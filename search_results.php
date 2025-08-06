<?php
$conn = new mysqli("localhost", "root", "", "mylogisticsdb");

// get form data
$route = $_POST['route'];
$vehicle_type = $_POST['vehicle_type'];

// find matching vendors
$stmt = $conn->prepare("SELECT * FROM vendors WHERE route LIKE ? AND vehicle_type LIKE ?");
$route_pattern = "%$route%";
$vehicle_type_pattern = "%$vehicle_type%";
$stmt->bind_param("ss", $route_pattern, $vehicle_type_pattern);
$stmt->execute();
$result = $stmt->get_result();

// display results
echo "<h2>Matching Vendors</h2>";
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "Name: {$row['name']}<br>";
    echo "Location: {$row['location']}<br>";
    echo "Whatsapp: {$row['whatsapp']}<br>";
    echo "Route: {$row['route']}<br>";
    echo "Vehicle: {$row['vehicle_type']}<br>";
    echo "<a href='send_whatsapp.php?vendor_id={$row['id']}'>Send Whatsapp</a><br><hr>";
  }
} else {
  echo "No vendors found for your criteria.";
}
?>

