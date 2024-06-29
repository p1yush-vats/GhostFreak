<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO stories (author,title, content) VALUES (?,?, ?)");
    $stmt->bind_param("sss",$author, $title, $content);

    // Get form data
    $author = $_POST["author"];
    $title = $_POST["title"];
    $content = $_POST["content"];

    // Execute the statement
    if ($stmt->execute()) {
        echo "Story submitted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connection
    $stmt->close();
    $conn->close();
}
?>
