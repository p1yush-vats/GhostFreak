<!DOCTYPE html>
<html>
<head>
    <title>Manage Feedbacks</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-image : url(../33.jpg);
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 40px 20px;
            //background-color: #ffffff; /* White container background */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Shadow effect */
        }
        .rec {
            max-width: 800px;
            margin: auto;
            background-color:#ffffff;
            color: #000000;
            padding: 10px 20px;
            //background-color: #ffffff; /* White container background */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Shadow effect */
        }

        h2 {
            color: #343a40; /* Dark gray heading color */
            text-align: center;
            margin-bottom: 40px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #dee2e6; /* Light gray border */
            padding: 12px;
        }
        .navbar-custom {
            background-color: rgba(52, 58, 64, 0.8); /* Dark gray with translucency */
            backdrop-filter: blur(5px); /* Add blur effect */
        }

        .navbar-custom .navbar-brand,
        .navbar-custom .navbar-nav .nav-link {
            color: #ffffff; /* White text */
        }

        .navbar-custom .nav-link:hover {
            color: #adb5bd; /* Light gray on hover */
        }

        th {
            background-color: #f8f9fa; /* Light gray header background */
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2; /* Even row background color */
        }

        a {
            color: #007bff; /* Blue link color */
            text-decoration: none;
        }

        a:hover {
            color: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./manage_user.php">User Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./manage_stories.php">Story Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./view_feedback.php">Feedbacks</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            User
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#"></a>
                            <a class="dropdown-item" href="../admin.html">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h2 class="rec">Manage Feedbacks</h2>
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
        $sql = "SELECT * FROM feedback";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            echo "<table class='table table-bordered'>";
            echo "<thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Comment</th><th>Action</th></tr></thead>";
            echo "<tbody>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>". $row["id"]. "</td>";
                echo "<td><h3>". $row["name"]. "</h3></td>";
                echo "<td>". $row["email"]. "</td>";
                echo "<td>". $row["message"]. "</td>";
                echo "<td><a href='delete_feed.php?id=" . $row["id"] . "'>Delete</a></td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>No feedbacks found.</p>";
        }

        // Close connection
        $conn->close();
        ?>
    </div>
</body>
</html>
