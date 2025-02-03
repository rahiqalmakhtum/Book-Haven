<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Login</title>
    <link rel="stylesheet" href="sttt.css">
</head>

<body>
    <form action="../control/update_control.php" method="post">
        <fieldset>
            <legend>
                <h2>Employee Login</h2>
            </legend>
            <table>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><input type="text" name="email" required></td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td>:</td>
                    <td><input type="password" name="password" required></td>
                </tr>

                <tr>
                    <td align="center"><input type="submit" name="submit" value="Login"></td>
                    <td align="center"><input type="reset" name="reset" value="Reset"></td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>
</html>
