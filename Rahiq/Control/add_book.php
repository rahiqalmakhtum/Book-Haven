<?php
require '../model/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $author = $_POST['author'] ?? '';
    $price = $_POST['price'] ?? '';
    $category = $_POST['category'] ?? '';
    $description = $_POST['description'] ?? '';

    if (empty($title) || empty($author) || empty($price) || empty($category)) {
        echo "All fields are required!";
    } else {
        $result = addBook($conn, $title, $author, $price, $category, $description);

        if($result == true){
            echo "Book added successfully!";
        } 
    }
}
?>
