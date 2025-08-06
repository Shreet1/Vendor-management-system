<?php

$size = $_GET['size'] ?? 'N/A';
$weight = $_GET['weight'] ?? 'N/A';
$specific_route = $_GET['specific_route'] ?? 'N/A';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

use Twilio\Rest\Client;

$conn = new mysqli(
    "sql102.infinityfree.com",
    "if0_39429648",
    "SxSajOIeFAZSQa",
    "if0_39429648_new_logistics"
);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$vendor_id = $_GET['vendor_id'] ?? null;
if (!$vendor_id) {
    die("Vendor ID missing.");
}

$vendor = $conn->query("SELECT * FROM vendors WHERE id=$vendor_id")->fetch_assoc();
if (!$vendor) {
    die("Vendor not found.");
}

$sid = 'AC0dac7aed65a913d25eb2fa8a89c3df93';
$token = 'b7c4503a9c633152d5ce048635c00a88';
$twilio = new Client($sid, $token);

$vendor_number = "whatsapp:" . $vendor['whatsapp'];

$link = "https://5c3bf646d465.ngrok-free.app/Premier_logistics/submit_reply.php?vendor_id=$vendor_id&size=" . urlencode($size) . "&weight=" . urlencode($weight) . "&specific_route=" . urlencode($specific_route);

$message_body = "Hello {$vendor['name']}, this is Premier Logistics.

We are requesting a quote for a *{$vendor['vehicle_type']}* on the route: *$specific_route*.

Size: *$size*  
Weight Capacity: *$weight*

Please submit your quote here: $link";

try {
    $message = $twilio->messages->create(
        $vendor_number,
        [
            "from" => "whatsapp:+14155238886",
            "body" => $message_body
        ]
    );
    echo "Message sent successfully!";
} catch (Exception $e) {
    echo "Error sending: " . $e->getMessage();
}
?>
