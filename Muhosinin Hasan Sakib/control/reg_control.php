<?php
require("../model/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $errors = [];

    $username = isset($_POST['u_name']) ? $_POST['u_name'] : '';
    $email = isset($_POST['mail']) ? $_POST['mail'] : '';
    $employee_id = isset($_POST['empid']) ? $_POST['empid'] : '';
    $password = isset($_POST['pass']) ? $_POST['pass'] : '';
    $confirm_password = isset($_POST['c_pass']) ? $_POST['c_pass'] : '';
    $phone_number = isset($_POST['ph_num']) ? $_POST['ph_num'] : '';
    $contact_method = isset($_POST['contact_method']) ? $_POST['contact_method'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $dob = isset($_POST['dob']) ? $_POST['dob'] : '';
    $delivery_address = isset($_POST['Delivery_address']) ? $_POST['Delivery_address'] : '';
    $permanent_address = isset($_POST['Parmanent_address']) ? $_POST['Parmanent_address'] : '';

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
        if (strpos($email, '@') === false ) {
            $errors[] = "Email must have '@' .";
        }
        
        if (substr($email, -4) !== '.com') {
            $errors[] = "Email must end with .com domain.";
        }
    }



    if (empty($employee_id) || $employee_id === 'none') {
        $errors[] = "Please select a preferred employee_id.";
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

    if (empty($contact_method) || $contact_method === 'none') {
        $errors[] = "Please select a preferred contact method.";
    }

    if (empty($gender) || $gender === 'none') {
        $errors[] = "Please select your gender.";
    }

    if (empty($dob)) {
        $errors[] = "Date of birth is required.";
    }

    if (empty($delivery_address)) {
        $errors[] = "Delivery address is required.";
    }

    if (empty($permanent_address)) {
        $errors[] = "Permanent address is required.";
    }


        if (empty($errors)) {
            $customer = new customer(); // Create an instance of the customer class
            $customer->insertData("emptb",$username, $email, $employee_id, $password, $confirm_password, $phone_number, $contact_method, $gender, $dob, $delivery_address, $permanent_address);
            
        }
        if (count($errors) > 0) {
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
    } else {
        header("Location: ../view/update.php");
       
            
        $data=
        [

"Username" => $_POST['u_name'],
"E-mail" => $_POST['mail'],
"Employee_ID" => $_POST['empid'],
"Password" => $_POST['pass'],
"Confirm Password" => $_POST['c_pass'],
"Phone Number" => $_POST['ph_num'],
"Contact Method" => $_POST['contact_method'],
"Gender" => $_POST['gender'],
"Date of Birth" => $_POST['dob'],
"Delivery Address" => $_POST['Delivery_address'],
"Permanent Address" => $_POST['Parmanent_address'],

        ];

$json = json_encode( $data,JSON_PRETTY_PRINT);

file_put_contents("data/userdata.json", $json);
 
    }
}
?>
