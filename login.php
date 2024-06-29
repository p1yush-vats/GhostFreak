<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //retrieve data
    $username = $_POST['username'];
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
 $try= "SELECT * FROM USER WHERE username = '$username' AND password = '$password'";

 $result = $conn->query($try);
 if($result->num_rows == 1){
   //login success
   
   header("Location: main.html");
   exit();
 }
 else{
   header("Location: login404.html");
    //login failed
   exit();
   }
}
?>