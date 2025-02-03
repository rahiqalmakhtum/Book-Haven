<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require("../Model/db.php"); // Database connection

// Fetch admin details
$admin_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT Username, Email, Phone_Number, Bank_Account_Number, Date_of_Birth, Gender FROM admin WHERE id = ?");
$stmt->bind_param("i", $admin_id);
$stmt->execute();
$stmt->bind_result($username, $email, $phone, $bank_account, $dob, $gender);
$stmt->fetch();
$stmt->close();

// Fetch employee list
$employees = [];
$emp_stmt = $conn->prepare("SELECT id, name, email, position FROM employees");
$emp_stmt->execute();
$emp_result = $emp_stmt->get_result();
while ($row = $emp_result->fetch_assoc()) {
    $employees[] = $row;
}
$emp_stmt->close();

// Fetch available books
$books = [];
$book_stmt = $conn->prepare("SELECT book_id, title, author, genre, status FROM books WHERE status = 'Available'");
$book_stmt->execute();
$book_result = $book_stmt->get_result();
while ($row = $book_result->fetch_assoc()) {
    $books[] = $row;
}
$book_stmt->close();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Haven - Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form>
    <fieldset>
        <h1 style="text-align: center;">WELCOME TO BOOK HAVEN</h1>
        <h1 style="text-align: Center;">Admin Dashboard</h1>

        <h3>Admin Profile</h3>
        <table>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><?php echo htmlspecialchars($username); ?></td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td>:</td>
                <td><?php echo htmlspecialchars($email); ?></td>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td>:</td>
                <td><?php echo htmlspecialchars($phone); ?></td>
            </tr>
            <tr>
                <td>Bank Account Number</td>
                <td>:</td>
                <td><?php echo htmlspecialchars($bank_account); ?></td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td>:</td>
                <td><?php echo htmlspecialchars($dob); ?></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>:</td>
                <td><?php echo htmlspecialchars($gender); ?></td>
            </tr>
        </table>

        <br>
        <h3>Edit Profile</h3>
        <form action="edit_profile.php" method="POST">
            <label>New Email:</label>
            <input type="email" name="new_email" value="<?php echo htmlspecialchars($email); ?>" required>
            <br>
            <label>New Phone Number:</label>
            <input type="text" name="new_phone" value="<?php echo htmlspecialchars($phone); ?>" required>
            <br>
            <input type="submit" name="update_profile" value="Update Profile">
        </form>

        <br>
        <h3>Employee List</h3>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Position</th>
            </tr>
            <?php foreach ($employees as $employee): ?>
            <tr>
                <td><?php echo htmlspecialchars($employee['id']); ?></td>
                <td><?php echo htmlspecialchars($employee['name']); ?></td>
                <td><?php echo htmlspecialchars($employee['email']); ?></td>
                <td><?php echo htmlspecialchars($employee['position']); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <br>
        <h3>Available Books</h3>
        <table border="1">
            <tr>
                <th>Book ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Status</th>
            </tr>
            <?php foreach ($books as $book): ?>
            <tr>
                <td><?php echo htmlspecialchars($book['book_id']); ?></td>
                <td><?php echo htmlspecialchars($book['title']); ?></td>
                <td><?php echo htmlspecialchars($book['author']); ?></td>
                <td><?php echo htmlspecialchars($book['genre']); ?></td>
                <td><?php echo htmlspecialchars($book['status']); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <br>
        <div class="button-container">
            <a href="logout.php">Logout</a>
        </div>
    </fieldset>
</form>

</body>
</html>
