<?php
session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database connection
    $host = "localhost";
    $dbusername = "root";
    $dbpass = "";
    $dbname = "login";

    $conn = new mysqli($host, $dbusername, $dbpass, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Validate
    $query = "SELECT * FROM ADMIN WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        // Login success
        $_SESSION['username'] = $username; // Store username in session
        header("Location: admin/dashboard.html");
        exit();
    } else {
        // Login failed
        header("Location: admin404.html");
        exit();
    }
}
?>
