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
    die("Connection failed: ". $conn->connect_error);
}

// Fetch story from the database
$id = $_GET['id'];
$sql = "DELETE FROM stories WHERE id=$id";
$result = $conn->query($sql);

if ($result === TRUE) {
    echo "<script>alert('Story deleted successfully');</script>";
    echo "<script>window.location.href='manage_stories.php';</script>";
} else {
    echo "Error: ". $sql. "<br>". $conn->error;
}

// Close connection
$conn->close();
?>