<?php
session_start();
require("../Model/db.php"); // Database connection

$errors = [];
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve and sanitize input
    $username = isset($_POST['u_name']) ? trim($_POST['u_name']) : '';
    $password = isset($_POST['pass']) ? trim($_POST['pass']) : '';

    // Validate Username
    if (empty($username)) {
        $errors['username'] = "Username is required.";
    } elseif ($username[0] !== strtoupper($username[0])) {
        $errors['username'] = "Username must start with a capital letter.";
    }

    // Validate Password
    if (empty($password)) {
        $errors['password'] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors['password'] = "Password must be at least 6 characters long.";
    }

    if (empty($errors)) {
        // Check if the user exists in the database
        $stmt = $conn->prepare("SELECT id, Password FROM admin WHERE Username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        // If user exists
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $hashed_password);
            $stmt->fetch();

            // Verify password
            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $username;
                header("Location: dashboard.php");
                exit();
            } else {
                $errors['login'] = "Invalid password.";
            }
        } else {
            $errors['login'] = "User not found.";
        }

        $stmt->close();
    }

    $conn->close();

    // If there are errors, store them in session and redirect back to login page
    if (!empty($errors)) {
        $_SESSION['error'] = implode("<br>", $errors);
        header("Location: ../View/login.php");
        exit();
    }
}
?>
