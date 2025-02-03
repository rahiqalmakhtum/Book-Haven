<?php
session_start();
require_once "../model/db.php"; // Include the database connection and Customer class

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize input data
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Validate input fields
    if (empty($email) || empty($password)) {
        echo "<script>alert('Both fields are required!'); window.history.back();</script>";
        exit();
    }

    // Create an instance of the Customer class
    $customer = new Customer();

    // Attempt to login by passing the email and password to the login function
    $login_result = $customer->login($email, $password);

    if ($login_result === true) {
        // If login is successful, store the user's email in the session
        $_SESSION["user_email"] = $email;
        header("Location: ../view/Employee_control.php"); // Redirect to the employee control page
        exit();
    } else {
        // If login failed, show an alert and go back to the login form
        echo "<script>alert('Invalid email or password.'); window.history.back();</script>";
        exit();
    }
} else {
    // If the request method is not POST, show an error message
    echo "<script>alert('Invalid request.'); window.history.back();</script>";
    exit();
}
?>
