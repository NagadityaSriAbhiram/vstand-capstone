<?php

session_start();
include 'config.php';
$quote = $_POST['quote'];
$id = $_POST['id'];
$un = $_SESSION['un'];
$phone = $_SESSION['phone'];

// $id = (isset($_POST['id']) ? $_POST['id'] : '');


echo $phone;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT into plumber_repair_quote (pid,quote,emp,phone) values ('$id', '$quote', '$un','$phone'); ";

if($conn->query($sql)===TRUE){
  //echo "success";
   header('Location:plumber1.php');
    } else{
    echo "Error:" .$sql."<br>".$conn->error;}

$conn->close();
?>