<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-image: url(../mappings/img/graveya.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
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

        .container {
            max-width: 800px;
            background-color: rgba(255, 255, 255, 0.7); /* Translucent white background for container */
            border-radius: 10px; /* Rounded corners for container */
            padding: 20px; /* Add some padding */
        }

        h2 {
            color: #ff0000; /* Red text */
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
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #f8f9fa;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            color: #ff0000; /* Red text */
            text-decoration: none;
        }

        a:hover {
            color: #cc0000; /* Darker red on hover */
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #c82333;
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
        <h2>Manage Users</h2>
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

        // Fetch users from the database
        $sql = "SELECT * FROM user";
        $result = $conn->query($sql);
        

        if ($result->num_rows > 0) {
            // Output data of each row
            echo "<table class='table table-bordered'>";
            echo "<thead><tr><th>Username</th><th>Email</th>><th>Password</th><th>Action</th><th>Action</th></tr></thead>";
            echo "<tbody>";
            while ($row = $result->fetch_assoc()) {
            
                echo "<tr>";
                //echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["password"] . "</td>";
                echo "<td><form action='delete_user.php' method='POST'>
                <input type='hidden' name='user_id' value='" . $row["id"] . "'>
                <button type='submit' class='btn btn-primary'>delete</button>
            </form></td>";
                echo "<td>
                        <form action='assign_admin.php' method='POST'>
                            <input type='hidden' name='user_id' value='" . $row["id"] . "'>
                            <button type='submit' class='btn btn-primary'>Assign Admin</button>
                        </form>
                    </td>";
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

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-h2etxz0y3TjhhD95U8Sle/ki6r4ZY6D7r1TPVq8WO+Kp9qz2w5LWQ/x4nxl9DolF" crossorigin="anonymous"></script>
</body>
</html>
