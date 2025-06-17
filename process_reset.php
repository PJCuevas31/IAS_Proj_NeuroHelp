<?php
require 'db.php';

$token = $_POST['token'];
$otp = $_POST['otp'];
$new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

// Fetch user by token
$stmt = $conn->prepare("SELECT * FROM users WHERE token=?");
$stmt->execute([$token]);
$user = $stmt->fetch();

if (!$user) {
    echo "Invalid token.<br><a href='reset_request.html'>Try again</a>";
    exit;
}

if ($user['otp'] !== $otp) {
    echo "Invalid OTP.<br><a href='reset_request.html'>Try again</a>";
    exit;
}

// Check OTP expiry
if (strtotime($user['otp_expiry']) < time()) {
    echo "OTP expired.<br><a href='reset_request.html'>Request again</a>";
    exit;
}

// Update password and clear token/OTP
$stmt = $conn->prepare("UPDATE users SET password=?, token=NULL, otp=NULL, otp_expiry=NULL WHERE id=?");
$stmt->execute([$new_password, $user['id']]);

echo "Password has been updated.<br><a href='login.html'>Return to Login</a>";
?>
