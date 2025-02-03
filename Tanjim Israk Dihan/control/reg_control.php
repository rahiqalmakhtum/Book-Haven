<?php
require("../model/db.php");
session_start();

$errors = [];
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['u_name'] ?? '';
    $password = $_POST['pass'] ?? '';
    $confirm_password = $_POST['confirm_pass'] ?? '';
    $email = $_POST['mail'] ?? '';
    $phone_number = $_POST['ph_num'] ?? '';
    $shipping_address = $_POST['shipping_address'] ?? '';
    $postal_code = $_POST['pcode'] ?? '';
    $payment_method = $_POST['PM'] ?? '';
    $gender = $_POST['GD'] ?? '';
    $dob = $_POST['dob'] ?? '';

    if (empty($username)) {
        $errors[] = "Username is required.";
    } else {
        $has_uppercase = false;
        for ($i = 0; $i < strlen($username); $i++) {
            if (ctype_upper($username[$i])) {
                $has_uppercase = true;
                break;
            }
        }
        if (!$has_uppercase) {
            $errors[] = "Username must contain at least one uppercase letter.";
        }
        if (!ctype_alpha($username)) {
            $errors[] = "Username must contain only alphabets.";
        }
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    } else {
        if (strlen($password) < 6) {
            $errors[] = "Password must be at least 6 characters long.";
        }
        if (!preg_match('/[A-Z]/', $password)) {
            $errors[] = "Password must contain at least one uppercase letter.";
        }
        $has_digit = false;
        for ($i = 0; $i < strlen($password); $i++) {
            if (is_numeric($password[$i])) {
                $has_digit = true;
                break;
            }
        }
        if (!$has_digit) {
            $errors[] = "Password must contain at least one numeric character.";
        }
    }

    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Please enter a valid email address.";
        }
    }

    if (empty($phone_number)) {
        $errors[] = "Phone number is required.";
    } else {
        if (strlen($phone_number) !== 11) {
            $errors[] = "Phone number must be exactly 11 digits.";
        }
        for ($i = 0; $i < strlen($phone_number); $i++) {
            if (!is_numeric($phone_number[$i])) {
                $errors[] = "Phone number must contain only numbers.";
                break;
            }
        }
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

    if (empty($errors)) {
        $customer = new Customer();
        $customer->insertData("customer", $username, $email, $password, $phone_number, $shipping_address, $postal_code, $payment_method, $gender, $dob, $confirm_password);
        header("Location: ../view/reg_success.php");
        exit();
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }

    $data = [
        "Username" => $username,
        "Email" => $email,
        "Password" => $password,
        "Confirm Password" => $confirm_password,
        "Phone Number" => $phone_number,
        "Shipping Address" => $shipping_address,
        "Postal Code" => $postal_code,
        "Payment Method" => $payment_method,
        "Gender" => $gender,
        "Date of Birth" => $dob
    ];

    $json = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents(__DIR__ . "/data/userdata.json", $json);
}
?>
