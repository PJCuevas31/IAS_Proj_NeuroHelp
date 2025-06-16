<?php
require 'db.php';

$email = $_POST['email'];
$otp = $_POST['otp'];

$stmt = $conn->prepare("SELECT otp, otp_expiry FROM users WHERE email=?");
$stmt->execute([$email]);
$user = $stmt->fetch();

if ($user && $user['otp'] === $otp && new DateTime() < new DateTime($user['otp_expiry'])) {
    echo "OTP Verified. Access granted.";
} else {
    echo "Invalid or expired OTP.";
}
?>