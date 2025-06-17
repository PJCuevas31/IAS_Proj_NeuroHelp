<?php
require 'db.php';

if (!isset($_GET['token'])) {
    echo "No token provided.";
    exit;
}
$token = $_GET['token'];
?>

<!DOCTYPE html>
<html>
<head><title>Reset Password</title></head>
<body>
<h2>Reset Your Password</h2>
<form method="POST" action="process_reset.php">
    <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
    <label>Enter OTP:</label><br>
    <input type="text" name="otp" required><br><br>

    <label>New Password:</label><br>
    <input type="password" name="new_password" required><br><br>

    <button type="submit">Reset Password</button>
</form>
</body>
</html>
