<?php
$conn = new mysqli("localhost", "root", "", "your_database");
$result = $conn->query("SELECT replies.*, vendors.name FROM replies JOIN vendors ON replies.vendor_id=vendors.id");

echo "<h2>Vendor Quotes</h2>";
while($row = $result->fetch_assoc()) {
  echo "Vendor: {$row['name']}<br>";
  echo "Vehicle: {$row['vehicle_type']}<br>";
  echo "Price: {$row['price']}<br>";
  echo "Time: {$row['reply_time']}<br><hr>";
}
?>
