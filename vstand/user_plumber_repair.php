<?php
session_start();

include 'config.php';



$hrs = $_POST["hrs2"];
$tag = $_POST["tag"];
$desc1 = $_POST["desc2"];
$un=$_SESSION["un"];



$conn = new mysqli($servername, $username, $password, $dbname);

//echo 'success';


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO  plumber_repair (hrs,tag, description,uname)
values('$hrs','$tag','$desc1','$un')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  header('Location:user_plumber.html');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
