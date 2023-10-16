<?php
session_start();

include 'config.php';



$express = $_POST["express"];
$tag = $_POST["tag"];
$desc = $_POST["desc"];
$un=$_SESSION["un"];



$conn = new mysqli($servername, $username, $password, $dbname);

//echo 'success';


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO furrepair(hrs,tag, description, bname)
values('$express','$tag','$desc','$un')";

if ($conn->query($sql) === TRUE) {
  //  echo "New record created successfully";
  header('Location:user_home.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
