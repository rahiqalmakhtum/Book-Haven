<?php
session_start();

if (empty($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}

require("../model/db.php");
$customer = new Customer();
$connection = $customer->getConnection();
$username = $_SESSION['username'];

$stmt = $connection->prepare("SELECT username, email, password, confirmpassword, phone_number, shipping_address, postal_code, payment_method, gender, dob FROM customer WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($db_username, $email, $password, $confirm_password, $phone_number, $shipping_address, $postal_code, $payment_method, $gender, $dob);

if (!$stmt->fetch()) {
    echo "No data found.";
}
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

        <?php if (isset($_SESSION['success_message'])): ?>
            <p class="success-message"><?= $_SESSION['success_message']; ?></p>
            <?php unset($_SESSION['success_message']); ?>
        <?php endif; ?>

        <table class="form-table">
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" value="<?= htmlspecialchars($db_username); ?>" required></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" value="<?= htmlspecialchars($email); ?>" required></td>
            </tr>
            <tr>
                <td>Phone Number:</td>
                <td><input type="text" name="phone_number" value="<?= htmlspecialchars($phone_number); ?>"></td>
            </tr>
            <tr>
                <td>Shipping Address:</td>
                <td><input type="text" name="shipping_address" value="<?= htmlspecialchars($shipping_address); ?>"></td>
            </tr>
            <tr>
                <td>Postal Code:</td>
                <td><input type="text" name="postal_code" value="<?= htmlspecialchars($postal_code); ?>"></td>
            </tr>
            <tr>
                <td>Payment Method:</td>
                <td><input type="text" name="payment_method" value="<?= htmlspecialchars($payment_method); ?>"></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>
                    <select name="gender">
                        <option value="Male" <?= ($gender === "Male") ? "selected" : ""; ?>>Male</option>
                        <option value="Female" <?= ($gender === "Female") ? "selected" : ""; ?>>Female</option>
                        <option value="Other" <?= ($gender === "Other") ? "selected" : ""; ?>>Other</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Date of Birth:</td>
                <td><input type="date" name="dob" value="<?= htmlspecialchars($dob); ?>"></td>
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
            <input type="submit" class="button-link" name="update" value="Save Changes">
            <a href="frontpage.php" class="button-link">Go back</a>
            <a href="logout.php" class="button-link">Logout</a>
        </div>
    </div>
</form>

</body>
</html>
