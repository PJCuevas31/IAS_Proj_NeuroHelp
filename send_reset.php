<?php
require 'db.php';

$email = $_POST['email'];
$token = bin2hex(random_bytes(16));
$otp = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
$expiry = date('Y-m-d H:i:s', strtotime('+10 minutes'));

$stmt = $conn->prepare("UPDATE users SET token=?, otp=?, otp_expiry=? WHERE email=?");
$stmt->execute([$token, $otp, $expiry, $email]);

$reset_link = "http://localhost/neurohelp/reset.php?token=$token";

// For testing only
echo "<p><strong>Reset Link:</strong> <a href='$reset_link'>$reset_link</a></p>";
echo "<p><strong>Your OTP:</strong> $otp</p>";
?>
