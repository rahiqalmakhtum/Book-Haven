<?php
session_start();
require("../model/db.php");

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header("Location: ../view/login.php");
    exit();
}

$username = $_SESSION['username'];
$newUsername = isset($_POST['username']) ? $_POST['username'] : null;
$newEmail = isset($_POST['email']) ? $_POST['email'] : null;
$newPassword = isset($_POST['new_password']) ? $_POST['new_password'] : null;
$confirmPassword = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : null;

$errors = [];

// Validate password if entered
if (!empty($newPassword) && $newPassword !== $confirmPassword) {
    $errors[] = "Passwords do not match.";
}

if (empty($newUsername) || empty($newEmail)) {
    $errors[] = "Username and Email are required.";
}

if (empty($errors)) {
    $customer = new Customer();
    $connection = $customer->getConnection();

    // Prepare the SQL query to update the user details
    $updateQuery = "UPDATE customer SET username = ?, email = ?";

    if (!empty($newPassword)) {
        // Use the plain password if provided (no hashing)
        $updateQuery .= ", password = ?";
        $params[] = $newPassword;
    }

    $updateQuery .= " WHERE username = ?"; // Ensure we're updating the correct user
    $params[] = $username;

    // Prepare and bind parameters dynamically based on the query
    $stmt = $connection->prepare($updateQuery);

    // Determine the data types dynamically for bind_param
    $paramTypes = str_repeat("s", count($params)); // All params are strings ('s')

    // Bind the parameters dynamically
    $stmt->bind_param($paramTypes, ...$params);

    if ($stmt->execute()) {
        // Update session with new username if it changed
        $_SESSION['username'] = $newUsername;
        header("Location: ../view/dashboard.php");
        exit();
    } else {
        $errors[] = "Failed to update user details. Please try again.";
    }

    $stmt->close();
}

// Store errors in session for display on dashboard
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header("Location: ../view/dashboard.php");
    exit();
}
?>
