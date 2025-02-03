<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Books</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="seller-container">
    <h2>All Books</h2>
    <table class="book-table">
        <thead>
            <tr class="bookrow">
                <th>Book Title</th>
                <th>Author</th>
                <th>Price</th>
                <th>Category</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require '../model/db.php';
            
            $query = "SELECT book_title, author_name, price, category, description FROM books";
            $result = $conn->query($query);
            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='bookdata'>" . htmlspecialchars($row['book_title']) . "</td>";
                    echo "<td class='bookdata'>" . htmlspecialchars($row['author_name']) . "</td>";
                    echo "<td class='bookdata'>" . htmlspecialchars($row['price']) . "</td>";
                    echo "<td class='bookdata'>" . htmlspecialchars($row['category']) . "</td>";
                    echo "<td class='bookdata'>" . htmlspecialchars($row['description']) . "</td>";
                    echo "</tr>";
                }
            
            } else {
                echo "<tr><td colspan='5'>No books available</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
    <p><a href="newbook.php">Add another book</a></p>
</div>

</body>
</html>
