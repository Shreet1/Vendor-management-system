<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$conn = new mysqli("sql102.infinityfree.com", "if0_39429648", "SxSajOIeFAZSQa", "if0_39429648_new_logistics");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get vendor_id from URL
$vendor_id = isset($_GET['vendor_id']) ? intval($_GET['vendor_id']) : 0;
$specific_route = $_GET['specific_route'] ?? '';

if ($vendor_id === 0) {
    die("Invalid vendor ID.");
}

// Check if link has expired (over 48 hours old)
$stmt = $conn->prepare("SELECT r.created_at, v.route, v.vehicle_type FROM replies r JOIN vendors v ON r.vendor_id = v.id WHERE r.vendor_id = ?");
$stmt->bind_param("i", $vendor_id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    die("Reply link not found or vendor missing.");
}

// Check 48-hour expiry
$created_at = new DateTime($data['created_at']);
$now = new DateTime();
$interval = $created_at->diff($now);

if ($interval->days >= 2 || ($interval->days === 1 && $interval->h >= 24)) {
    die("⛔ This reply link has expired. Please contact dispatch.");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $price = floatval($_POST['price']);
    $company_name = trim($_POST['company_name']);

    // Update reply with price and company name
    $update = $conn->prepare("UPDATE replies SET price = ?, company_name = ?, specific_route = ? WHERE vendor_id = ?");
    $update->bind_param("dssi", $price, $company_name, $specific_route, $vendor_id);

    if ($update->execute()) {
        echo "<p>✅ Thank you! Your price has been submitted.</p>";
    } else {
        echo "<p>❌ Failed to save reply. Please try again.</p>";
    }
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Submit Rental Quote</title>
</head>
<body>
    <h2>Submit Price Quote</h2>
    <p>You are quoting for route <strong><?= htmlspecialchars($specific_route) ?></strong> with vehicle type <strong><?= htmlspecialchars($data['vehicle_type']) ?></strong>.</p>

    <form method="post">
        <input type="hidden" name="specific_route" value="<?= htmlspecialchars($specific_route) ?>">

        <label for="price">Your Price (₹):</label><br>
        <input type="number" name="price" id="price" step="0.01" required><br><br>

        <label for="company_name">Company Name:</label><br>
        <input type="text" name="company_name" id="company_name" required><br><br>

        <button type="submit">Submit Quote</button>
    </form>
</body>
</html>