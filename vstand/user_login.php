<?php
session_start();

include 'config.php';

$un = $_POST['user'];
$pass = $_POST['pass'];




$sql = "SELECT * FROM user where uname='$un' and pass='$pass' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  $_SESSION["un"] = $un;
  header('Location:user_carpenter.php');
} else {
  echo "Invalid Details";
}
$conn->close();
?>