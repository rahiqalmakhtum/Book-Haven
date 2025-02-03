<?php
session_start();
require("../model/db.php");

if (empty($_SESSION['logged_in'])) {
    header("Location: ../view/login.php");
    exit();
}

$customer = new Customer();
$connection = $customer->getConnection();
$username = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["update"])) {
    $new_username = $_POST["username"];
    $new_email = $_POST["email"];
    $new_phone = $_POST["phone_number"];
    $new_shipping_address = $_POST["shipping_address"];
    $new_postal_code = $_POST["postal_code"];
    $new_payment_method = $_POST["payment_method"];
    $new_gender = $_POST["gender"];
    $new_dob = $_POST["dob"];
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];

    if (!empty($new_password) && $new_password === $confirm_password) {
        $stmt = $connection->prepare("UPDATE customer SET username = ?, email = ?, password = ?, confirmpassword = ?, phone_number = ?, shipping_address = ?, postal_code = ?, payment_method = ?, gender = ?, dob = ? WHERE username = ?");
        $stmt->bind_param("sssssssssss", $new_username, $new_email, $new_password, $confirm_password, $new_phone, $new_shipping_address, $new_postal_code, $new_payment_method, $new_gender, $new_dob, $username);
    } else {
        $stmt = $connection->prepare("UPDATE customer SET username = ?, email = ?, phone_number = ?, shipping_address = ?, postal_code = ?, payment_method = ?, gender = ?, dob = ? WHERE username = ?");
        $stmt->bind_param("sssssssss", $new_username, $new_email, $new_phone, $new_shipping_address, $new_postal_code, $new_payment_method, $new_gender, $new_dob, $username);
    }

    if ($stmt->execute()) {
        $_SESSION['username'] = $new_username;
        $_SESSION['success_message'] = "Successfully Updated";
        header("Location: ../view/dashboard.php");
        exit();
    } else {
        echo "Error updating profile: " . $stmt->error;
    }

    $stmt->close();
}
?>
