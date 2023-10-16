<?php
session_start();

include 'config.php';



$faexpress = $_POST["faexpress"];
$fatag = $_POST["fatag"];
$fadesc = $_POST["fadesc"];
$un=$_SESSION["un"];



$conn = new mysqli($servername, $username, $password, $dbname);

//echo 'success';


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO  furassembly(express,tag, description,bname)
values('$faexpress','$fatag','$fadesc','$un')";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
  header('Location:user_home.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
