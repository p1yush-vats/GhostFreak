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
    // Get user ID from the form
    $user_id = $_POST["user_id"];

    // Insert user into admin table
    $sql_insert_admin = "INSERT INTO admin (id, username, email,password) SELECT id, username, email,password FROM user WHERE id = $user_id";
    if ($conn->query($sql_insert_admin) === TRUE) {
        echo "<script>alert('user elevated to admin successfully');</script>";
    echo "<script>window.location.href='manage_user.php';</script>";
    } else {
        echo "Error assigning user as admin: " . $conn->error;
    }

}

// Close connection
$conn->close();
?>
