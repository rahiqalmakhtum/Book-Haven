<?php
require '../model/db.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($email) || empty($password)) {
    die("Both fields are required!");
}

$result = login($conn, $email, $password);

if ($result === true) {
    header("Location: ../View/newbook.php");
    exit();
} else {
    die("Invalid email or password.");
}
?>
