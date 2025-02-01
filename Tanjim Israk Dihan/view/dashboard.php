<?php
session_start();
require("../model/db.php");

// Ensure user is logged in
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header("Location: ../view/login.php");
    exit();
}

$username = $_SESSION['username'];
$customer = new Customer();
$connection = $customer->getConnection();

// Fetch user details
$query = "SELECT * FROM customer WHERE username = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form method="POST" action="../control/dashboard_control.php">
    <div class="form-box">
        <h1 class="form-title">Profile Settings</h1>
        <table class="form-table">
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" value="<?php echo $user['username']; ?>" required></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" value="<?php echo $user['email']; ?>" required></td>
            </tr>
            <tr>
                <td>New Password:</td>
                <td><input type="password" name="new_password" placeholder="New Password"></td>
            </tr>
            <tr>
                <td>Confirm Password:</td>
                <td><input type="password" name="confirm_password" placeholder="Confirm Password"></td>
            </tr>
        </table>
        <div>
        <input type="submit" class="button-link" value="Save Changes">
        <a href="logout.php" class="button-link">Logout</a>
    </div>
</form>

</body>
</html>
