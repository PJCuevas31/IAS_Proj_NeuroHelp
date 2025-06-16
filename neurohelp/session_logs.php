<?php
require 'db.php';
$user_id = 1; // For testing only

$key = "securekey12345678";
$iv = "1234567891011121";
$data = $_POST['message'];

$encrypted = openssl_encrypt($data, "AES-128-CTR", $key, 0, $iv);
$stmt = $conn->prepare("INSERT INTO session_logs (user_id, message) VALUES (?, ?)");
$stmt->execute([$user_id, $encrypted]);

echo "Message saved securely.";
?>