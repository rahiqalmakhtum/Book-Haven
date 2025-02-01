<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
    <link rel="stylesheet" href="style.css"> <!-- External CSS -->
    <script src="../js/reg_validation.js" defer></script> <!-- JS Validation Script -->
</head>
<body>

<form method="POST" action="../control/reg_control.php" onsubmit="return validateForm()">
    <div class="form-box">
        <h1 class="form-title">WELCOME TO BOOK HAVEN</h1>
        <fieldset class="form-subtitle">
            <legend>Customer Registration</legend>
            <table class="form-table">
                <tr>
                    <td>Username:</td>
                    <td><input type="text" class="usrnm" name="u_name" id="u_name"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" class="pswrd" name="pass" id="pass" placeholder="***********"></td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td><input type="password" class="pswrd" name="confirm_pass" id="confirm_pass" placeholder="***********"></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" class="email" name="mail" id="mail"></td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td><input type="text" class="phone" name="ph_num" id="ph_num"></td>
                </tr>
                <tr>
                    <td>Shipping Address:</td>
                    <td><input type="text" class="address" name="shipping_address" id="shipping_address"></td>
                </tr>
                <tr>
                    <td>Postal Code:</td>
                    <td><input type="text" class="postal" name="pcode" id="pcode" placeholder="Postal Code"></td>
                </tr>
                <tr>
                    <td>Payment Method:</td>
                    <td>
                        <select name="PM" class="payment-method" id="PM">
                            <option value="Credit Card">Credit Card</option>
                            <option value="PayPal">PayPal</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                            <option value="Bkash">Bkash</option>
                            <option value="Nagad">Nagad</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td class="radio-container">
                        <input type="radio" name="GD" value="Male" class="gender" id="male">
                        <label for="male">Male</label>
                        <input type="radio" name="GD" value="Female" class="gender" id="female">
                        <label for="female">Female</label>
                    </td>
                </tr>
                <tr>
                    <td>Date of Birth:</td>
                    <td><input type="date" class="dob" name="dob" id="dob"></td>
                </tr>
            </table>
        </fieldset>
        <input type="submit" class="submit-btn" name="submit" value="Register">
        <input type="reset" class="reset-btn" name="clear" value="Clear">
    </div>
</form>

</body>
</html>
