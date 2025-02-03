<?php
session_start(); // Start the session

require("../model/db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Fetch user input from the form
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Check if the required fields are not empty
    if (empty($username) || empty($password)) {
        $_SESSION['error_message'] = "Please fill in both fields.";
        header("Location: ../view/login.php");
        exit();
    } else {
        // Initialize customer class for login validation
        $auth = new Customer();

        // Validate user credentials using the login method
        $login_result = $auth->login($username, $password);

        if ($login_result === true) {
            // Successful login: set session variables
            $_SESSION['username'] = $username;
            $_SESSION['logged_in'] = true;

            // Redirect to the dashboard
            header("Location: ../view/frontpage.php");
            exit(); // Stop further script execution after redirect
        } else {
            // Failed login: show error message
            $_SESSION['error_message'] = $login_result; // Error message returned from login
            header("Location: ../view/login.php");
            exit();
        }
    }
}

?>

