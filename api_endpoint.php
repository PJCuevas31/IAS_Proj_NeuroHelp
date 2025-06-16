<?php
require 'db.php';
$headers = getallheaders();
$token = $headers['Authorization'] ?? '';

$stmt = $conn->prepare("SELECT * FROM users WHERE api_token=?");
$stmt->execute([$token]);

if ($stmt->rowCount() == 0) {
    http_response_code(401);
    echo "Unauthorized";
    exit;
}

echo json_encode(["status" => "Access granted"]);
?>