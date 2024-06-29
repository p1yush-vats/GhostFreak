<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horror Stories</title>
    <style>
        /* Style for the navbar */
        nav {
            background-color: #312f2f;
            overflow: hidden;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        nav ul li {
            float: left;
        }

        nav ul li a {
            display: block;
            font-weight: 1000;
            color: hsl(0, 100%, 50%);
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        
       .h {
            text-align: center;
            color: red;
            font-size: 20px;
            font-weight: bolder;
        }
        *{
            color: aliceblue;
        }

        /* Change color on hover */
        nav ul li a:hover {
            background-color: #b1aeae;
        }
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            overflow-x: hidden; /* Hide horizontal scrollbars */
        }

        header {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: start;
            color: white;
            z-index: -2; /* Ensure the header is above the video */
        }

        video {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1; /* Ensure the video is behind the content */
        }
      
       .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }

        #story-list li {
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 20px;
        }

        #story-list h3 {
            color: red;
        }

        #story-list p {
            white-space: pre-line;
            overflow-x: auto;
            max-width: 100%; /* Limit the width to prevent overflow */
        }
    </style>
</head>
<body>
    <video src="./vid/2.mp4" autoplay loop muted></video>
    <nav>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="feedback.html">Feedback</a></li>
            <li><a href="#">Socials</a></li>
            <li><a href="story/upload_story.html">Upload Your Story</a></li>
            <li><a href="user_login.html">Logout</a></li>
        </ul>
    </nav><br><br>
    <header>
        <h1>Horror Stories</h1>
    </header>
    
    <div class="container">
        <section id="stories">
            <h2>Read Horror Stories</h2>
            <ul id="story-list">
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

                // Fetch horror stories
                $sql = "SELECT author,title, content FROM stories WHERE published = 1";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<li>";
                        echo "<hr><h3>". $row["title"]. "</h3>  :- ".$row["author"];
                        echo "<p>". $row["content"]. "</p>";
                        echo "</li><br><br>";
                    }
                } else {
                    echo "No horror stories found";
                }

                // Close connection
                $conn->close();
               ?>
            </ul>
        </section>
    </div>
<div></div></body></html>