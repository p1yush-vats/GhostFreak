<!DOCTYPE html>
<html>
<head>
    <title>Manage Stories</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style>
    /* Custom CSS for Manage Stories page */
    body {
        background-image : url(../moon.jpg); /* Light gray */
        color: #333;
        font-family: 'Roboto', sans-serif;
    }
    .container {
        max-width: 1000px;
        margin: auto;
        background-color: rgba(255, 255, 255, 0.9); /* Adjust the opacity by changing the last parameter (0.9 here) */
        color: #333;
        width: 100%;
        border-collapse: collapse;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    h2 {
        color: #333;
        text-align: center;
        font-size: 2.5rem;
        margin-bottom: 40px;
    }
    table {
        background-color: rgba(255, 255, 255, 0.9); /* Adjust the opacity by changing the last parameter (0.9 here) */
        color: #333;
        width: 100%;
        border-collapse: collapse;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    th, td {
        border: 1px solid #dee2e6; /* Light gray */
        padding: 16px;
    }
    th {
        background-color: #f5f5f5; /* Lighter gray */
    }
    a {
        color: #007bff; /* Blue */
        text-decoration: none;
    }
    a:hover {
        color: #0056b3; /* Darker Blue */
    }
    .btn {
        padding: 8px 16px;
        border: none;
        cursor: pointer;
        font-size: 1rem;
        border-radius: 5px;
    }
    .btn-primary {
        background-color: #007bff; /* Blue */
        color: #fff;
    }
    .btn-primary:hover {
        background-color: #0056b3; /* Darker Blue */
    }
    .btn-danger {
        background-color: #dc3545; /* Red */
        color: #fff;
    }
    .btn-danger:hover {
        background-color: #c82333; /* Darker Red */
    }
</style>


    <style>
    /* Custom CSS for Navbar */
    .navbar-custom {
        background-color: #dc3545; /* Red */
    }
    .navbar-custom .navbar-brand {
        color: #000000; /* Black */
    }
    .navbar-custom .nav-link {
        color: #000000; /* Black */
        background-color: transparent; /* Remove background color */
    }
    .navbar-custom .nav-link.active {
        color: #dc3545; /* Red */
    }
    .navbar-custom .nav-link:hover {
        color: #dc3545; /* Red */
        background-color: transparent; /* Remove background color */
    }
    .navbar-custom .dropdown-menu {
        background-color: #dc3545; /* Red */
    }
    .navbar-custom .dropdown-item {
        color: #ffffff; /* White */
    }
    .navbar-custom .dropdown-item:hover {
        color: #f8f9fa; /* Light Gray */
        background-color: #dc3545; /* Red */
    }
</style>


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <div class="container">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <div class="navbar-nav">
            <a class="nav-link" href="./manage_user.php">User Management</a>
            <a class="nav-link active" href="./manage_stories.php">Story Management</a>
            <a class="nav-link" href="./view_feedback.php">Feedbacks</a>
           
        </div>
    </div>
</nav>
<div class="container mt-5">
    <h2>Manage Stories</h2>
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

    // Fetch stories from the database
    $sql = "SELECT * FROM stories";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        echo "<table class='table table-bordered'>";
        echo "<thead><tr><th>ID</th><th>Title</th><th>Author</th><th>Content</th><th>Status</th><th>Action</th></tr></thead>";
        echo "<tbody>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>". $row["id"]. "</td>";
            echo "<td><h3>". $row["title"]. "</h3></td>";
            echo "<td>". $row["author"]. "</td>";
            echo "<td>". $row["content"]. "</td>";
            $status = isset($row["published"])? ($row["published"]? "Published" : "Unpublished") : "Unpublished";
            echo "<td>". $status. "</td>";
            echo "<td><a href='publish_story.php?id=". $row["id"]. "'>". ($row["published"]? "Unpublish" : "Publish"). "</a> | <a href='delete_story.php?id=". $row["id"]. "'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "0 results";
    }

    // Close connection
    $conn->close();
    ?>
</div>
</body>
</html>
