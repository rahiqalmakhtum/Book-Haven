<?php
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
    <div class="form-box">
        <h1 class="form-title">Login</h1>
        <?php if (isset($_SESSION['error_message'])): ?>
            <p class="error-message"><?= htmlspecialchars($_SESSION['error_message']) ?></p>
            <?php unset($_SESSION['error_message']); ?>
        <?php endif; ?>
        <form action="../control/login_control.php" method="post">
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
        <p class="register-link">New here? <a href="reg_customer.php">Register now!</a></p>
    </div>
</body>
</html>
