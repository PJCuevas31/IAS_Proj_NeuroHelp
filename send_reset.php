<?php
require 'db.php';

$email = $_POST['email'];
$token = bin2hex(random_bytes(16));

$stmt = $conn->prepare("UPDATE users SET token=? WHERE email=?");
$stmt->execute([$token, $email]);

// For testing only: Display token on screen
echo "This is your password reset link (for testing):<br>";
echo "<a href='reset.php?token=$token'>Click here to reset</a><br>";
echo "Or use this token manually: $token";
?>