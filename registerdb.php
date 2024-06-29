<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //retrieve data
    $name= $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
 
    // database conn
    $host = "localhost";
    $dbusername="root";
    $dbpass="";
    $dbname="login";
 
    $conn = new mysqli($host,$dbusername,$dbpass,$dbname);
    if($conn->connect_error){
        die("connection failed:".$conn->connect_error);
    }
 
    //validate
    $try= "INSERT INTO `user`(`username`, `password`, `name`, `email`) VALUES(?,?,?,?)";
 
    $stmt = $conn->prepare($try);
    $stmt->bind_param("ssss", $username, $password, $name, $email);
    $stmt->execute();
    
    if($stmt->error){
        header("Location: register404.html");
        exit();
    } else {
        header("Location: registersuccess.html");
        exit();
    }
}
?>