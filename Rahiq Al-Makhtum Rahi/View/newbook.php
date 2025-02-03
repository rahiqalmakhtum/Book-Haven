<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form method="POST" action="../Control/add_book.php">
    <div class="seller-container">
        <h2>Add a New Book</h2>

        <!-- Display success or error message -->
        <?php
        if (isset($_SESSION['message'])) {
            echo "<p class='{$_SESSION['message_type']}'>" . $_SESSION['message'] . "</p>";
            unset($_SESSION['message']);
            unset($_SESSION['message_type']);
        }
        ?>

        <div class="inputs">
            <table class="left-column">
                <tr>
                    <td>Book Title:</td>
                    <td><input type="text" name="title" placeholder="Enter book title"></td>
                </tr>
                <tr>
                    <td>Author:</td>
                    <td><input type="text" name="author" placeholder="Enter author name"></td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td><input type="text" name="price" placeholder="Enter book price"></td>
                </tr>
            </table>

            <table class="right-column">
                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category">
                            <option value="Fiction">Fiction</option>
                            <option value="Non-Fiction">Non-Fiction</option>
                            <option value="Science">Science</option>
                            <option value="History">History</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td><textarea name="description" placeholder="Write a short description" rows="4"></textarea></td>
                </tr>
            </table>
        </div>
        
        <div class="buttons">
            <input type="submit" name="add_book" value="Add Book">
            <input type="reset" name="clear" value="Clear">
        </div>
        <p><a href="viewbooks.php">View all books</a></p>
    </div>
</form>

</body>
</html>
