function validateForm() {
    let username = document.getElementById('u_name').value;
    let password = document.getElementById('pass').value;
    let confirmPassword = document.getElementById('confirm_pass').value;
    let email = document.getElementById('mail').value;
    let phone = document.getElementById('ph_num').value;
    let address = document.getElementById('shipping_address').value;
    let postalCode = document.getElementById('pcode').value;
    let paymentMethod = document.getElementById('PM').value;
    let gender = document.querySelector('input[name="GD"]:checked');
    let dob = document.getElementById('dob').value;

    // Check if all fields are filled
    if (username === "" || password === "" || confirmPassword === "" || email === "" || phone === "" ||
        address === "" || postalCode === "" || paymentMethod === "" || !gender || dob === "") {
        alert("All fields must be filled out.");
        return false;
    }

    // Validate password match
    if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return false;
    }

    // Validate email format
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    // Validate phone number (11 digits)
    const phonePattern = /^[0-9]{11}$/;
    if (!phonePattern.test(phone)) {
        alert("Phone number must be 11 digits.");
        return false;
    }

    return true; // Allow form submission if no validation issues
}
