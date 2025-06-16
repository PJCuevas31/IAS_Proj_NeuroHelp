<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
</head>
<body>
  <h1>Welcome, <?php echo htmlspecialchars($_SESSION['email']); ?></h1>
  <p>This is your NeuroHelp dashboard.</p>
  <a href="logout.php">Logout</a>
</body>
</html>
