<?php
require '../model/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    die("405 Method Not Allowed - Please use a POST request.");
}

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($email) || empty($password)) {
    die("Both fields are required!");
}

$result = login($conn, $email, $password);

if ($result === true) {
    echo $email;
    echo $password;
    // header("Location: ../View/newbook.html");
    exit();
} else {
    die("Invalid email or password.");
}
?>
