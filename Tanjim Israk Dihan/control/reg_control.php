<?php
require("../model/db.php"); // Correct path to db.php
session_start();

$errors = [];
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = isset($_POST['u_name']) ? $_POST['u_name'] : '';
    $password = isset($_POST['pass']) ? $_POST['pass'] : '';
    $confirm_password = isset($_POST['confirm_pass']) ? $_POST['confirm_pass'] : '';
    $email = isset($_POST['mail']) ? $_POST['mail'] : '';
    $phone_number = isset($_POST['ph_num']) ? $_POST['ph_num'] : '';
    $shipping_address = isset($_POST['shipping_address']) ? $_POST['shipping_address'] : '';
    $postal_code = isset($_POST['pcode']) ? $_POST['pcode'] : '';
    $payment_method = isset($_POST['PM']) ? $_POST['PM'] : '';
    $gender = isset($_POST['GD']) ? $_POST['GD'] : '';
    $dob = isset($_POST['dob']) ? $_POST['dob'] : '';

    // Validate form data
    if (empty($username)) {
        $errors[] = "Username is required.";
    }
    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (empty($phone_number)) {
        $errors[] = "Phone number is required.";
    } elseif (!preg_match("/^[0-9]{11}$/", $phone_number)) {
        $errors[] = "Phone number must be 11 digits.";
    }
    if (empty($shipping_address)) {
        $errors[] = "Shipping address is required.";
    }
    if (empty($postal_code)) {
        $errors[] = "Postal code is required.";
    }
    if (empty($payment_method)) {
        $errors[] = "Payment method is required.";
    }
    if (empty($gender)) {
        $errors[] = "Gender is required.";
    }
    if (empty($dob)) {
        $errors[] = "Date of birth is required.";
    }

    // If no errors, insert into the database
    if (empty($errors)) {
        $customer = new Customer(); // Create an instance of the customer class
        $customer->insertData("customer", $username, $email, $password, $phone_number, $shipping_address, $postal_code, $payment_method, $gender, $dob, $confirm_password);
        
        // Redirect to the success page
        header("Location: ../view/reg_success.php");
        exit();
    }
}

// Output errors if there are any
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
}
?>
