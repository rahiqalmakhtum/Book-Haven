<?php
// Start a session to pass data to the user page
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css"> <!-- External CSS file -->
</head>
<body>
<form action="../control/login_control.php" method="post">
    <div class="form-box">
        <h1 class="form-title">Login</h1>
        <p class="form-subtitle">Please enter your credentials</p>
        <form action="../data/login_control.php" method="post">
            <table class="form-table">
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" required></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" required></td>
                </tr>
            </table>
            <div>
                <button type="submit" class="submit-btn">Login</button>
                <button type="reset" class="reset-btn">Reset</button>
            </div>
        </form>
    </div>
</body>
</html>
