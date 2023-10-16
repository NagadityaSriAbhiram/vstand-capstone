<?php
session_start();

include 'config.php';

$un = $_POST['un'];
$pass = $_POST['pass'];
$role = $_POST['role'];


if ($role == "Carpenter") {
  $sql = "SELECT * FROM workerreg where uname='$un' and pass='$pass' and profession = '$role' ";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION["un"] = $un;
    $_SESSION["role"] = $role;
    $_SESSION["phone"] = $row["phone"];
    header('Location:carpenter.php');
    // echo $row["phone"];
    // echo $role;
    // echo $un;
  } else {
    echo "Invalid Details";
  }

  // header('Location:carpenter.php');
} 

else if ($role == "Plumber") {

  $sql = "SELECT * FROM workerreg where uname='$un' and pass='$pass' and profession = '$role'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION["un"] = $un;
    $_SESSION["role"] = $role;
    $_SESSION["phone"] = $row["phone"];
    header('Location:plumber.php');
  } else {
    echo "Invalid Details";
  }

  // header('Location:worker_home.php');
} else if ($role == "Electrician") {

  $sql = "SELECT * FROM workerreg where uname='$un' and pass='$pass' and profession = '$role'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION["un"] = $un;
    $_SESSION["role"] = $role;
    $_SESSION["phone"] = $row["phone"];
    header('Location:electrician.php');
  } else {
    echo "Invalid Details";
  }

  // header('Location:worker_home.php');
} else if ($role == "Cook") {

  $sql = "SELECT * FROM workerreg where uname='$un' and pass='$pass' and profession = '$role'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION["un"] = $un;
    $_SESSION["role"] = $role;
    $_SESSION["phone"] = $row["phone"];
    header('Location:cook.php');
  } else {
    echo "Invalid Details";
  }

  // header('Location:worker_home.php');
} else if ($role == "Maid") {

  $sql = "SELECT * FROM workerreg where uname='$un' and pass='$pass' and profession = '$role' ";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION["un"] = $un;
    $_SESSION["role"] = $role;
    $_SESSION["phone"] = $row["phone"];
    header('Location:maid.php');
  } else {
    echo "Invalid Details";
  }

  // header('Location:worker_home.php');
} else {
  echo "invalid details";
}
$conn->close();
