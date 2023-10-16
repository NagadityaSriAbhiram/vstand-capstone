<?php
session_start();
include'config.php';

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];
$uname = $_POST['uname'];
$pass = $_POST['pass'];

$address = $_POST['address'];
$locality = $_POST['locality'];
$city = $_POST['city'];
$state = $_POST['state'];
$pin = $_POST['pin'];

$un = $_SESSION['un'];


$sql = "UPDATE user SET fname='$fname',lname='$lname',phone='$phone',uname='$uname',pass='$pass',address='$address',locality='$locality',city='$city',state='$state', pin='$pin' WHERE uname='$un'  ";

if ($conn->query($sql) === TRUE) {
 // echo "Record updated successfully";
 header('location:user_profile.php');
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>