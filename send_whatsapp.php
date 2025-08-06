<?php
require __DIR__ . '/vendor/autoload.php'; // install with composer require twilio/sdk
use Twilio\Rest\Client;

$vendor_id = $_GET['vendor_id'];
$conn = new mysqli("localhost", "root", "", "your_database");

$vendor = $conn->query("SELECT * FROM vendors WHERE id=$vendor_id")->fetch_assoc();

$sid = 'your_twilio_sid';
$token = 'your_twilio_token';
$twilio = new Client($sid, $token);

$vendor_number = $vendor['whatsapp'];  // e.g. whatsapp:+919999999999
$message_body = "Hello {$vendor['name']}, please submit your price quote for {$vendor['vehicle_type']} on the route {$vendor['route']}.
Click to reply: https://yourwebsite.com/submit_reply.php?vendor_id=$vendor_id";

$message = $twilio->messages->create(
    "whatsapp:".$vendor_number,
    [
        "from" => "whatsapp:+14155238886", // Twilio sandbox number
        "body" => $message_body
    ]
);
echo "Message sent!";
?>
