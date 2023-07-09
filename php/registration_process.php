<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myvisitor";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $purpose = $_POST["purpose"];

    // Prepare and execute SQL statement to insert data into the database
    $sql = "INSERT INTO visitors (name, email, phone, purpose, created_at) VALUES ('$name', '$email', '$phone', '$purpose', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
