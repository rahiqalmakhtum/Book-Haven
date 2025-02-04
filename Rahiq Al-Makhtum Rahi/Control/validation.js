function validateForm(event) {
    var errors = false;

    document.querySelectorAll('.error').forEach(function(span) {
        span.innerHTML = "";
    });

    function showError(id, message) {
        document.getElementById(id).innerHTML = message;
        errors = true;
    }

    var firstName = document.getElementById("first_name").value.trim();
    if (firstName === "") {
        showError("firstNameError", "First Name is required.");
    } else if (!/^[A-Za-z]+$/.test(firstName)) {
        showError("firstNameError", "First Name must contain only alphabets.");
    }

    var lastName = document.getElementById("last_name").value.trim();
    if (lastName === "") {
        showError("lastNameError", "Last Name is required.");
    } else if (!/^[A-Za-z]+$/.test(lastName)) {
        showError("lastNameError", "Last Name must contain only alphabets.");
    }

    var email = document.getElementById("email").value.trim();
    if (email === "") {
        showError("emailError", "Email is required.");
    } else if (!/^\S+@\S+\.\S+$/.test(email)) {
        showError("emailError", "Enter a valid email address.");
    }

    var password = document.getElementById("password").value;
    if (password === "") {
        showError("passwordError", "Password is required.");
    } else if (password.length < 6) {
        showError("passwordError", "Password must be at least 6 characters long.");
    } else if (!/\d/.test(password)) {
        showError("passwordError", "Password must contain at least one number.");
    }

    var confirmPassword = document.getElementById("confirm_password").value;
    if (password !== confirmPassword) {
        showError("confirmPasswordError", "Passwords do not match.");
    }

    var phone = document.getElementById("phone").value.trim();
    if (phone === "") {
        showError("phoneError", "Phone number is required.");
    } else if (!/^\d{10,11}$/.test(phone)) {
        showError("phoneError", "Enter a valid 10 or 11-digit phone number.");
    }

    var address = document.getElementById("address").value.trim();
    if (address === "") {
        showError("addressError", "Address is required.");
    }

    var storeName = document.getElementById("store_name").value.trim();
    if (storeName === "") {
        showError("storeNameError", "Store Name is required.");
    }

    var businessLicense = document.getElementById("business_license_number").value.trim();
    if (businessLicense === "") {
        showError("businessLicenseError", "Business License Number is required.");
    }

    var businessAddress = document.getElementById("business_address").value.trim();
    if (businessAddress === "") {
        showError("businessAddressError", "Business Address is required.");
    }

    var dateField = document.getElementById("date_field").value.trim();
    if (dateField === "") {
        showError("dateError", "Date is required.");
    } else if (!/^\d{4}-\d{2}-\d{2}$/.test(dateField)) {
        showError("dateError", "Enter a valid date in YYYY-MM-DD format.");
    }

    var gender = document.querySelector('input[name="gender"]:checked');
    if (!gender) {
        showError("genderError", "Please select a gender.");
    }

    if (errors) {
        event.preventDefault();
        return false;
    }

    document.getElementById("registrationForm").submit();
    return true;
}
