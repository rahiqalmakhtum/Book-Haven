<?php
session_start();

// Ensure user is logged in
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Front Page</title>
    <link rel="stylesheet" href="style.css"> <!-- External CSS -->
</head>
<body>

<div class="form-box">
    <h1 class="form-title">Welcome to Book Haven</h1>
    <p class="form-subtitle">Select an option to proceed</p>

    <div class="button-container">
        <!-- About Button -->
        <a href="about.php" class="button-link">About</a>
        
        <!-- Account Details Button -->
        <a href="dashboard.php" class="button-link">Account Details</a>
        
        <!-- My Orders Button -->
        <a href="browse_books.php" class="button-link">Browse books</a>

        <!-- Logout Button -->
        <a href="logout.php" class="button-link">Logout</a>
    </div>
</div>

</body>
</html>
