<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form method="POST" action="../Control/login_control.php">
    <div class="login-container">
        <h1>BOOKHAVEN</h1>
        <!-- <h2 style="text-align: center;">Login</h2> -->

        <div class="login-inputs">
            <table class="input-column">
                <tr>
                    <!-- <td>Email:</td> -->
                    <td><input type="text" name="email" placeholder="Enter your email" required></td>
                </tr>
                <tr>
                    <!-- <td>Password:</td> -->
                    <td><input type="password" name="password" placeholder="Enter your password" required></td>
                </tr>
            </table>
        </div>

        <div class="buttons">
            <input type="submit" class="login" name="login" value="Login">
        </div>

        <p>Don't have an account? <a href="seller.php">Sign up here</a></p>
    </div>
</form>

</body>
</html>
