function validateForm(event) {
    let errors = false;

    document.querySelectorAll('.error').forEach(span => span.innerHTML = "");

    function showError(id, message) {
        document.getElementById(id).innerHTML = message;
        errors = true;
    }

    let username = document.getElementById("u_name").value.trim();
    if (username === "") {
        showError("usernameError", "Username is required.");
    } else if (!/[A-Z]/.test(username)) {
        showError("usernameError", "Username must contain at least one uppercase letter.");
    } else if (!/^[a-zA-Z]+$/.test(username)) {
        showError("usernameError", "Username must contain only alphabets.");
    }

    let password = document.getElementById("pass").value;
    if (password === "") {
        showError("passwordError", "Password is required.");
    } else if (password.length < 6) {
        showError("passwordError", "Password must be at least 6 characters long.");
    } else if (!/[A-Z]/.test(password)) {
        showError("passwordError", "Password must contain at least one uppercase letter.");
    } else if (!/\d/.test(password)) {
        showError("passwordError", "Password must contain at least one numeric character.");
    }

    let confirmPassword = document.getElementById("confirm_pass").value;
    if (confirmPassword === "") {
        showError("confirmPasswordError", "Confirm Password is required.");
    } else if (password !== confirmPassword) {
        showError("confirmPasswordError", "Passwords do not match.");
    }

    let email = document.getElementById("mail").value.trim();
    if (email === "") {
        showError("emailError", "Email is required.");
    } else if (!/^\S+@\S+\.\S+$/.test(email)) {
        showError("emailError", "Enter a valid email address.");
    }

    let phone = document.getElementById("ph_num").value.trim();
    if (phone === "") {
        showError("phoneError", "Phone number is required.");
    } else if (!/^\d{10,11}$/.test(phone)) {
        showError("phoneError", "Enter a valid 10 or 11-digit phone number.");
    }

    let address = document.getElementById("shipping_address").value.trim();
    if (address === "") {
        showError("addressError", "Shipping address is required.");
    }

    let postalCode = document.getElementById("pcode").value.trim();
    if (postalCode === "") {
        showError("postalCodeError", "Postal code is required.");
    }

    let paymentMethod = document.getElementById("PM").value;
    if (paymentMethod === "") {
        showError("paymentMethodError", "Payment method is required.");
    }

    let gender = document.getElementById("GD").value;
    if (gender === "") {
        showError("genderError", "Gender is required.");
    }

    let dob = document.getElementById("dob").value;
    if (dob === "") {
        showError("dobError", "Date of birth is required.");
    }

    if (errors) {
        event.preventDefault();
        return false;
    }

    return true;
}
