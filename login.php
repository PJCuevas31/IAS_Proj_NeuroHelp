<?php
require 'db.php';
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
$stmt->execute([$email]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['email'] = $email;
    header("Location: dashboard.php");
    exit;
} else {
    echo "Invalid credentials.<br>";
    echo "<a href='login.html'>Try again</a>";
}
?>
