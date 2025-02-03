function validateForm(event) {
    let errors = false;

    // Clear previous error messages
    document.querySelectorAll('.error').forEach(span => span.innerHTML = "");

    function showError(id, message) {
        document.getElementById(id).innerHTML = message;
        errors = true;
    }

    // Validate First Name
    let firstName = document.getElementById("first_name").value.trim();
    if (firstName === "") {
        showError("firstNameError", "First Name is required.");
    } else if (!/^[A-Za-z]+$/.test(firstName)) {
        showError("firstNameError", "First Name must contain only alphabets.");
    }

    // Validate Last Name
    let lastName = document.getElementById("last_name").value.trim();
    if (lastName === "") {
        showError("lastNameError", "Last Name is required.");
    } else if (!/^[A-Za-z]+$/.test(lastName)) {
        showError("lastNameError", "Last Name must contain only alphabets.");
    }

    // Validate Email
    let email = document.getElementById("email").value.trim();
    if (email === "") {
        showError("emailError", "Email is required.");
    } else if (!/^\S+@\S+\.\S+$/.test(email)) {
        showError("emailError", "Enter a valid email address.");
    }

    // Validate Password
    let password = document.getElementById("password").value;
    if (password === "") {
        showError("passwordError", "Password is required.");
    } else if (password.length < 6) {
        showError("passwordError", "Password must be at least 6 characters long.");
    } else if (!/\d/.test(password)) {
        showError("passwordError", "Password must contain at least one number.");
    }

    // Confirm Password
    let confirmPassword = document.getElementById("confirm_password").value;
    if (password !== confirmPassword) {
        showError("confirmPasswordError", "Passwords do not match.");
    }

    // Validate Phone Number
    let phone = document.getElementById("phone").value.trim();
    if (phone === "") {
        showError("phoneError", "Phone number is required.");
    } else if (!/^\d{10,11}$/.test(phone)) {
        showError("phoneError", "Enter a valid 10 or 11-digit phone number.");
    }

    // Validate Address
    let address = document.getElementById("address").value.trim();
    if (address === "") {
        showError("addressError", "Address is required.");
    }

    // Validate Store Name
    let storeName = document.getElementById("store_name").value.trim();
    if (storeName === "") {
        showError("storeNameError", "Store Name is required.");
    }

    // Validate Business License Number
    let businessLicense = document.getElementById("business_license_number").value.trim();
    if (businessLicense === "") {
        showError("businessLicenseError", "Business License Number is required.");
    }

    // Validate Business Address
    let businessAddress = document.getElementById("business_address").value.trim();
    if (businessAddress === "") {
        showError("businessAddressError", "Business Address is required.");
    }

    // Validate Date
    let dateField = document.getElementById("date_field").value.trim();
    if (dateField === "") {
        showError("dateError", "Date is required.");
    } else if (!/^\d{4}-\d{2}-\d{2}$/.test(dateField)) {
        showError("dateError", "Enter a valid date in YYYY-MM-DD format.");
    }

    // Validate Gender
    let gender = document.querySelector('input[name="gender"]:checked');
    if (!gender) {
        showError("genderError", "Please select a gender.");
    }

    // If there are errors, prevent form submission
    if (errors) {
        event.preventDefault();
        return false;
    }

    // Submit the form if no errors
    document.getElementById("registrationForm").submit();
    return true;
}
