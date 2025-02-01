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
        <a href="about.php" class="button-link">
            <button class="submit-btn">About</button>
        </a>
        
        <!-- Account Details Button -->
        <a href="dashboard.php" class="button-link">
            <button class="submit-btn">Account Details</button>
        </a>
        
        <!-- My Orders Button -->
        <a href="my_orders.php" class="button-link">
            <button class="submit-btn">My Orders</button>
        </a>

        <!-- Logout Button -->
        <a href="logout.php" class="button-link">
            <button class="reset-btn">Logout</button>
        </a>
    </div>
</div>

</body>
</html>
