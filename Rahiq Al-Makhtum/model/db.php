<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookheaven";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to insert seller data
function insertSeller($conn, $firstName, $lastName, $email, $password, $phone, $address, $storeName, $businessLicenseNumber, $businessAddress, $gender, $dateField) {
    $stmt = $conn->prepare("INSERT INTO seller (first_name, last_name, email, password, phone, address, store_name, business_license_number, business_address, gender, date_field) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    if (!$stmt) {
        return "Error preparing statement: " . $conn->error;
    }

    $stmt->bind_param("sssssssssss", $firstName, $lastName, $email, $password, $phone, $address, $storeName, $businessLicenseNumber, $businessAddress, $gender, $dateField);
    
    if ($stmt->execute()) {
        $stmt->close();
        return true; // Successful
    } else {
        $error = $stmt->error;
        $stmt->close();
        return $error; // Return error
    }
}

function addBook($conn, $title, $author, $price, $category, $description){
    $stmt = $conn->prepare("INSERT INTO books (book_title, author_name, price, category, description) VALUES (?, ?, ?, ?, ?)");

    if (!$stmt) {
        return "Error preparing statement: " . $conn->error;
    }
    
    $stmt->bind_param("ssdss", $title, $author, $price, $category, $description);

    if ($stmt->execute()) {
        $stmt->close();
        return true; // Successful
    } else {
        $error = $stmt->error;
        $stmt->close();
        return $error; // Return error
    }

}

function login($conn, $email, $password){
    $stmt = $conn->prepare("SELECT password FROM seller WHERE email = ?");
    
    if (!$stmt) {
        return "Error preparing statement: " . $conn->error;
    }
    
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) { 
        $stmt->bind_result($dbPassword);
        $stmt->fetch();

        // Directly compare passwords (since you're not hashing)
        if ($password === $dbPassword) {
            $stmt->close();
            return true; // Login successful
        } else {
            $stmt->close();
            return "Invalid email or password."; // Incorrect password
        }
    } else {
        $stmt->close();
        return "Invalid email or password."; // Email not found
    }
}

// Function to close the database connection
function closeConnection($conn) {
    $conn->close();
}
?>
