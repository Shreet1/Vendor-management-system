<?php
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

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
$route = $_POST['route'];
$vehicle_type = $_POST['vehicle_type'];
$size = $_POST['size'];
$weight = $_POST['weight'];

// Twilio config
$sid = 'AC0dac7aed65a913d25eb2fa8a89c3df93';
$token = 'b7c4503a9c633152d5ce048635c00a88';
$twilio = new Client($sid, $token);

$ngrok_base_url = "https://5c3bf646d465.ngrok-free.app/Premier_logistics/submit_reply.php";

// Get all matching vendors
$stmt = $conn->prepare("SELECT * FROM vendors WHERE route LIKE ? AND vehicle_type LIKE ?");
$pattern_route = "%$route%";
$pattern_type = "%$vehicle_type%";
$stmt->bind_param("ss", $pattern_route, $pattern_type);
$stmt->execute();
$result = $stmt->get_result();

echo "<h2>Sending WhatsApp messages to matching vendors...</h2>";

while ($vendor = $result->fetch_assoc()) {
    $vendor_id = $vendor['id'];
    $link = $ngrok_base_url . "?vendor_id=$vendor_id&size=" . urlencode($size) . "&weight=" . urlencode($weight);

    $message_body = "Hello {$vendor['name']}, this is Premier Logistics.

We are requesting a quote for a *{$vendor['vehicle_type']}* on *{$vendor['route']}*.
Size: *$size*  
Weight Capacity: *$weight*

Please submit your quote here: $link";

    try {
        $twilio->messages->create(
            "whatsapp:" . $vendor['whatsapp'],
            [
                "from" => "whatsapp:+14155238886", // Twilio sandbox number
                "body" => $message_body
            ]
        );
        echo "✅ Message sent to: {$vendor['name']} ({$vendor['whatsapp']})<br>";
    } catch (Exception $e) {
        echo "❌ Failed to send to {$vendor['name']} ({$vendor['whatsapp']}): " . $e->getMessage() . "<br>";
    }
}
?>
