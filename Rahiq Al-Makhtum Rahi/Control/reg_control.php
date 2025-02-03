<?php
 
 require '../model/db.php';

 $myFile = "mydata.json";
 
// Validation functions
function validateName($name) {
    return !preg_match('/\d/', $name); // Ensure name does not contain numbers
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL); // Validate email format
}

function validatePassword($password) {
    return preg_match('/[^\w]/', $password); // Check if password contains at least one special character
}

function validateDate($date) {
    $format = 'Y-m-d';
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date; // Check if date matches format
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Retrieve form data with default values
    $firstName = $_POST['first_name'] ?? '';
    $lastName = $_POST['last_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';
    $storeName = $_POST['store_name'] ?? '';
    $businessLicenseNumber = $_POST['business_license_number'] ?? '';
    $businessAddress = $_POST['business_address'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $dateField = $_POST['date_field'] ?? '';

    // Validate form inputs
    if (!validateName($firstName)) {
        $errors[] = "First Name should not contain numbers.";
    }

    if (!validateName($lastName)) {
        $errors[] = "Last Name should not contain numbers.";
    }

    if (!validateEmail($email)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (!validatePassword($password)) {
        $errors[] = "Password must contain at least one special character (e.g., @, #).";
    }

    if ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match.";
    }

    if (empty($phone)) {
        $errors[] = "Phone number is required.";
    }

    if (empty($address)) {
        $errors[] = "Address is required.";
    } 

    if (empty($storeName)) {
        $errors[] = "Store Name is required.";
    }

    if (empty($businessLicenseNumber)) {
        $errors[] = "Business License Number is required.";
    }

    if (empty($businessAddress)) {
        $errors[] = "Business Address is required.";
    }

    if (empty($gender)) {
        $errors[] = "Gender is required.";
    }

    if (!empty($dateField) && !validateDate($dateField)) {
        $errors[] = "Please enter a valid date in the format YYYY-MM-DD.";
    }

    // Output results
    if (empty($errors)) {
        $result = insertSeller($conn, $firstName, $lastName, $email, $password, $phone, $address, $storeName, $businessLicenseNumber, $businessAddress, $gender, $dateField);

        if ($result === true) {

            // Define the form data
            $form_data = [
                "first_name" => $firstName,
                "last_name" => $lastName,
                "email" => $email,
                "phone" => $phone,
                "address" => $address,
                "store_name" => $storeName,
                "business_license_number" => $businessLicenseNumber,
                "business_address" => $businessAddress,
                "gender" => $gender,
                "date_field" => $dateField
            ];

            // Read existing JSON file or create an empty array if it doesn't exist
            if (file_exists($myFile) && filesize($myFile) > 0) {
                $json_data = file_get_contents($myFile);
                $arr_data = json_decode($json_data, true) ?? []; // Ensure it's an array
            } else {
                $arr_data = [];
            }

            // Append new data
            array_push($arr_data, $form_data);

            // Encode and write to the JSON file
            if (file_put_contents($myFile, json_encode($arr_data, JSON_PRETTY_PRINT))) {
                closeConnection($conn);
                header("Location: ../View/newbook.php");
                exit();
            } else {
                echo "Error writing to JSON file.";
            }
        } else {
            echo "Error: " . $result . "<br>";
        }

        closeConnection($conn);
    } 
    
    else {
        
        // foreach ($errors as $error) {
        //     echo $error . "<br>";
        // }
    }
}

?>
