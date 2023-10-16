<?php
session_start();

include 'config.php';



$hrs = $_POST["cookhrs"];
$tag = $_POST["food"];
$desc1 = $_POST["cook"];
$un=$_SESSION["un"];



$conn = new mysqli($servername, $username, $password, $dbname);

//echo 'success';


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO  cook (hrs,tag, description,uname)
values('$hrs','$tag','$desc1','$un')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  header('Location:user_maid.html');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
