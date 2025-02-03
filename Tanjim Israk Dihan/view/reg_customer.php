<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
    <link rel="stylesheet" href="style.css">
    <script src="../control/reg_validation.js" defer></script>
</head>
<body>
    <div class="form-box">
        <form id="registrationForm" action="../Control/reg_control.php" method="POST" onsubmit="return validateForm(event)">
            <legend>Welcome to Registration</legend>
            <table class="form-table">
                <!-- Username Field -->
                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" class="usrnm" name="u_name" id="u_name" required>
                        <span id="usernameError" class="error"></span>
                    </td>
                </tr>
                <!-- Password Field -->
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" class="pswrd" name="pass" id="pass" placeholder="***********" required>
                        <span id="passwordError" class="error"></span>
                    </td>
                </tr>
                <!-- Confirm Password Field -->
                <tr>
                    <td>Confirm Password:</td>
                    <td>
                        <input type="password" class="pswrd" name="confirm_pass" id="confirm_pass" placeholder="***********" required>
                        <span id="confirmPasswordError" class="error"></span>
                    </td>
                </tr>
                <!-- Email Field -->
                <tr>
                    <td>Email:</td>
                    <td>
                        <input type="email" class="email" name="mail" id="mail" required>
                        <span id="emailError" class="error"></span>
                    </td>
                </tr>
                <!-- Phone Number Field -->
                <tr>
                    <td>Phone Number:</td>
                    <td>
                        <input type="text" class="phone" name="ph_num" id="ph_num" required>
                        <span id="phoneError" class="error"></span>
                    </td>
                </tr>
                <!-- Shipping Address Field -->
                <tr>
                    <td>Shipping Address:</td>
                    <td>
                        <input type="text" class="address" name="shipping_address" id="shipping_address" required>
                        <span id="addressError" class="error"></span>
                    </td>
                </tr>
                <!-- Postal Code Field -->
                <tr>
                    <td>Postal Code:</td>
                    <td>
                        <input type="text" class="postal" name="pcode" id="pcode" placeholder="Postal Code" required>
                        <span id="postalCodeError" class="error"></span>
                    </td>
                </tr>
                <!-- Payment Method Field -->
                <tr>
                    <td>Payment Method:</td>
                    <td>
                        <select name="PM" class="payment-method" id="PM" required>
                            <option value="Credit Card">Credit Card</option>
                            <option value="PayPal">PayPal</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                            <option value="Bkash">Bkash</option>
                            <option value="Nagad">Nagad</option>
                        </select>
                        <span id="paymentMethodError" class="error"></span>
                    </td>
                </tr>
                <!-- Gender Field -->
                <tr>
                    <td>Gender:</td>
                    <td>
                        <select name="GD" class="gender" id="GD" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <span id="genderError" class="error"></span>
                    </td>
                </tr>
                <!-- Date of Birth Field -->
                <tr>
                    <td>Date of Birth:</td>
                    <td>
                        <input type="date" class="dob" name="dob" id="dob" required>
                        <span id="dobError" class="error"></span>
                    </td>
                </tr>
            </table>
        
            <!-- Submit and Reset Buttons -->
            <div class="button-container">
                <button type="submit" class="submit-btn">Register</button>
                <button type="reset" class="reset-btn">Clear</button>
                <p class="register-link">Already a member? <a href="login.php">Login now!</a></p>
            </div>
        </form>
    </div>
</body>
</html>
