<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Haven - Admin Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form action="../Control/login_control_admin.php" method="POST">
    <fieldset>
        <h1 style="text-align: center;">WELCOME TO BOOK HAVEN</h1>
        <h1 style="text-align: Center;">Admin Login</h1>

        <?php if(isset($_SESSION['error'])): ?>
            <p style="color: red; text-align: center;"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
        <?php endif; ?>

        <table>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" name="u_name" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="pass" required></td>
            </tr>
        </table>

        <div class="button-container">
            <input type="submit" name="submit" value="Login">
            <input type="reset" name="reset" value="Reset">
        </div>
        
        <p style="text-align: center;">Don't have an account? <a href="admin.php">Register Here</a></p>
    </fieldset>
</form>

</body>
</html>
