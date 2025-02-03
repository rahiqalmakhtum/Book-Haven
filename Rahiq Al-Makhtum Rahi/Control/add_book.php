<?php
require '../model/db.php';
session_start(); // Start session for messages

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $author = $_POST['author'] ?? '';
    $price = $_POST['price'] ?? '';
    $category = $_POST['category'] ?? '';
    $description = $_POST['description'] ?? '';

    if (empty($title) || empty($author) || empty($price) || empty($category)) {
        $_SESSION['message'] = "All fields are required!";
        $_SESSION['message_type'] = "error"; // Used for styling
    } else {
        $result = addBook($conn, $title, $author, $price, $category, $description);

        if ($result === true) {
            $_SESSION['message'] = "Book added successfully!";
            $_SESSION['message_type'] = "success"; 
        } else {
            $_SESSION['message'] = "Error adding book: " . $result;
            $_SESSION['message_type'] = "error"; 
        }
    }
    
    header("Location: ../View/newbook.php"); // Redirect back to the main form
    exit();
}
?>
