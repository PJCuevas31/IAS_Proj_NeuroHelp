<?php
require 'db.php';

$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$consent = isset($_POST['consent']) ? 1 : 0;

$stmt = $conn->prepare("INSERT INTO users (email, password, consent) VALUES (?, ?, ?)");
$stmt->execute([$email, $password, $consent]);

echo "Registration successful!";
?>