<?php
// Replace this in files like: search_results.php, submit_reply.php, add_vendor.php, etc.

$conn = new mysqli(
    "sql102.infinityfree.com",   // ✅ Hostname
    "if0_39429648",              // ✅ Username
    "SxSajOIeFAZSQa",            // 🔒 Replace with your actual password
    "if0_39429648_new_logistics" // ✅ Database name
);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$size = $_POST['size'];
$weight = $_POST['weight'];
$route = $_POST['route'];
$vehicle_type = $_POST['vehicle_type'];
$specific_route = $_POST['specific_route'];

$stmt = $conn->prepare("SELECT * FROM vendors WHERE route LIKE ? AND vehicle_type LIKE ?");
$route_pattern = "%$route%";
$vehicle_type_pattern = "%$vehicle_type%";
$stmt->bind_param("ss", $route_pattern, $vehicle_type_pattern);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Search Results</title>
</head>
<body>

<h2>Matching Vendors</h2>

<!-- ✅ Send to All Button -->
<form method="post" action="send_bulk_whatsapp.php">
  <input type="hidden" name="route" value="<?= htmlspecialchars($route) ?>">
  <input type="hidden" name="vehicle_type" value="<?= htmlspecialchars($vehicle_type) ?>">
  <input type="hidden" name="size" value="<?= htmlspecialchars($size) ?>">
  <input type="hidden" name="weight" value="<?= htmlspecialchars($weight) ?>">
  <input type="hidden" name="specific_route" value="<?= htmlspecialchars($specific_route) ?>">
  <button type="submit">📨 Send WhatsApp to All</button>
</form>

<br>

<?php
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "Name: {$row['name']}<br>";
    echo "Location: {$row['location']}<br>";
    echo "Whatsapp: {$row['whatsapp']}<br>";
    echo "Route: {$row['route']}<br>";
    echo "Vehicle: {$row['vehicle_type']}<br>";
    echo "<a href='send_whatsapp.php?vendor_id={$row['id']}&size=" . urlencode($size) . "&weight=" . urlencode($weight) . "&specific_route=" . urlencode($specific_route) . "'>Send WhatsApp</a><br><hr>";
  }
} else {
  echo "No vendors found for your criteria.";
}
?>

</body>
</html>
