<?php
session_start(); // Start the session

require("../model/db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Fetch user input from the form
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Check if the required fields are not empty
    if (empty($username) || empty($password)) {
        $error_message = "Please fill in both fields.";
    } else {
        // Initialize customer class for login validation
        $auth = new Customer();

        // Validate user credentials using the login method
        if ($auth->login($username, $password)) {
            // Successful login: set session variables
            $_SESSION['username'] = $username;
            $_SESSION['logged_in'] = true;

            // Redirect to the dashboard
            header("Location: ../view/frontpage.php");
            exit(); // Stop further script execution after redirect
        } else {
            // Failed login: show error message
            $error_message = "Invalid username or password.";
        }
    }
}

?>

<!-- HTML Part for displaying the form and error message -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../style.css"> <!-- External CSS file -->
</head>
<body>
    <div class="form-box">
        <h1 class="form-title">Login</h1>
        <?php if (isset($error_message)): ?>
            <p class="error-message"><?= htmlspecialchars($error_message) ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <button type="submit" class="submit-btn">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
