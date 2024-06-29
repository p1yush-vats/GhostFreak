<?php
// Check if the ID parameter is set
if(isset($_GET['id'])) {
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

    // Get the ID from the URL parameter
    $id = $_GET['id'];

    // Prepare a delete statement
    $sql = "DELETE FROM feedback WHERE id = ?";

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    // Execute the delete statement
    if ($stmt->execute()) {
        // If deletion is successful, redirect to the page where feedbacks are managed
        echo "<script>alert('User deleted successfully.');</script>";
        echo "<script>window.location.href='view_feedback.php';</script>";
    } else {
        echo "Error deleting feedback: " . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If no ID parameter is set, redirect to the page where feedbacks are managed
    header("Location: view_feedback.php");
    echo "Error deleting feedback: " . $conn->error;
    exit();
}
?>
