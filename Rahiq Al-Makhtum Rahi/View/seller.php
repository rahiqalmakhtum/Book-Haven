<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Registration</title>
    <link rel="stylesheet" href="style.css">
    <script src="../Control/validation.js"></script>
</head>
<body>
    
<form id="registrationForm" action="../Control/reg_control.php" method="POST" onsubmit="return validateForm(event)">
    <div class="seller-container">
        <h2>Seller Registration</h2>

        <div class="inputs">
            <table class="left-column">
                <tr class="tablerow">
                    <td>First Name:</td>
                    <td><input type="text" id="first_name" name="first_name" placeholder="Enter your first name"></td>
                    <td><span id="firstNameError" class="error"></span></td>
                </tr>
                <tr class="tablerow">
                    <td>Last Name:</td>
                    <td><input type="text" id="last_name" name="last_name" placeholder="Enter your last name"></td>
                    <td><span id="lastNameError" class="error"></span></td>
                </tr>
                <tr class="tablerow">
                    <td>E-mail Address:</td>
                    <td><input type="text" id="email" name="email" placeholder="Enter your email"></td>
                    <td><span id="emailError" class="error"></span></td>
                </tr>
                <tr class="tablerow">
                    <td>Password:</td>
                    <td><input type="password" id="password" name="password" placeholder="Create a password"></td>
                    <td><span id="passwordError" class="error"></span></td>
                </tr>
                <tr class="tablerow">
                    <td>Confirm Password:</td>
                    <td><input type="password" id="confirm_password" name="confirm_password" placeholder="Re-enter your password"></td>
                    <td><span id="confirmPasswordError" class="error"></span></td>
                </tr>
                <tr class="tablerow">
                    <td>Phone:</td>
                    <td><input type="text" id="phone" name="phone" placeholder="Enter your phone number"></td>
                    <td><span id="phoneError" class="error"></span></td>
                </tr>
            </table>

            <table class="right-column">
                <tr class="tablerow">
                    <td>Address:</td>
                    <td><input type="text" id="address" name="address" placeholder="Enter your address"></td>
                    <td><span id="addressError" class="error"></span></td>
                </tr>
                <tr class="tablerow">
                    <td>Store Name:</td>
                    <td><input type="text" id="store_name" name="store_name" placeholder="Enter your store name"></td>
                    <td><span id="storeNameError" class="error"></span></td>
                </tr>
                <tr class="tablerow">
                    <td>Business License Number:</td>
                    <td><input type="text" id="business_license_number" name="business_license_number" placeholder="Enter your license number"></td>
                    <td><span id="businessLicenseError" class="error"></span></td>
                </tr>
                <tr class="tablerow">
                    <td>Business Address:</td>
                    <td><input type="text" id="business_address" name="business_address" placeholder="Enter your business address"></td>
                    <td><span id="businessAddressError" class="error"></span></td>
                </tr>
                <tr class="tablerow">
                    <td>Date (YYYY-MM-DD):</td>
                    <td><input type="text" id="date_field" name="date_field" placeholder="Enter your date of birth"></td>
                    <td><span id="dateError" class="error"></span></td>
                </tr>
                <tr class="tablerow">
                    <td>Gender:</td>
                    <td class="gender">
                        <input type="radio" id="gender_male" name="gender" value="male">Male
                        <input type="radio" id="gender_female" name="gender" value="female">Female
                    </td>
                    <td><span id="genderError" class="error"></span></td>
                </tr>
            </table>

        </div>

        <div class="buttons">
            <input type="submit" id="signup" name="signup" value="Sign Up">
            <input type="reset" id="clear" name="clear" value="Clear Data">
        </div>
        <p><a href="login.php">Go back to login</a></p>
        
    </div>
</form>

</body>
</html>
