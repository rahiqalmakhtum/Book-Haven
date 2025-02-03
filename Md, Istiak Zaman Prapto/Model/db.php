<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "adminregistrationfile";

    // Create connection
    $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Function to insert admin data
    function insertAdmin($conn, $username, $password, $email, $phone_number, $bank_account, $dob, $gender) {
        $stmt = $conn->prepare("INSERT INTO admin (`Username`, `Password`, `Email`, `Phone Number`, `Bank Account Number`, `Date of Birth`, `Gender`) 
            VALUES (?, ?, ?, ?, ?, ?, ?)");

        if (!$stmt) {
            return "Error preparing statement: " . $conn->error;
        }

        $stmt->bind_param("sssiiss", $username, $password, $email, $phone_number, $bank_account, $dob, $gender);

        if ($stmt->execute()) {
            $stmt->close();
            return true; // Successful
        } else {
            $error = $stmt->error;
            $stmt->close();
            return $error; // Return error
        }
    }
    // Function to close the database connection
function closeConnection($conn) {
    $conn->close();
}
?>
