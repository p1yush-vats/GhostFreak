<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Prepare SQL statement
    $sql = "INSERT INTO feedback (name, email, message) VALUES ('$name', '$email', '$message')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Feedback submitted successfully.');</script>";
        echo "<script>window.location.href='../spooky/feedback.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
