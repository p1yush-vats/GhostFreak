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

// Check if form is submitted and user_id is set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["user_id"])) {
    // Get user ID from the form
    $user_id = $_POST["user_id"];

    // Prepare and execute the SQL statement to delete the user
    $sql_delete_user = "DELETE FROM user WHERE id = ?";
    $stmt = $conn->prepare($sql_delete_user);
    
    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("i", $user_id);
        
        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>alert('User deleted successfully.');</script>";
            echo "<script>window.location.href='manage_user.php';</script>";
        } else {
            echo "Error deleting user: " . $stmt->error;
        }
        
        // Close statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

// Close connection
$conn->close();
?>
