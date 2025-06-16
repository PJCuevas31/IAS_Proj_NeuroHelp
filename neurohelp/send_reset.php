<?php
require 'db.php';

$email = $_POST['email'];
$token = bin2hex(random_bytes(16));

$stmt = $conn->prepare("UPDATE users SET token=? WHERE email=?");
$stmt->execute([$token, $email]);

$reset_link = "http://localhost/neurohelp/reset.php?token=$token";
mail($email, "Password Reset", "Click to reset your password: $reset_link");

echo "Password reset link sent.";
?>