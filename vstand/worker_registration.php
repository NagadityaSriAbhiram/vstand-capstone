<?php
include 'config.php';



$fname=$_POST["fname"];
$lname=$_POST["lname"];
$phn=$_POST["phn"];
$un=$_POST["un"];
$pwd=$_POST["pwd"];
$dob = $_POST["dob"];


$address=$_POST["address"];
$city=$_POST["city"];
$state=$_POST["state"];
$pincode=$_POST["pincode"];
$profession=$_POST["profession"];
$exp=$_POST["exp"];



$conn= new mysqli($servername, $username, $password, $dbname);

//echo 'success';

if($conn->connect_error)
{
die("Connection failed" .$conn->connect_error);
}


$sql="INSERT INTO workerreg(fname,lname,phone,uname,pass,dob,address,city,state,pin,profession,exp)
 values('$fname','$lname','$phn','$un','$pwd','$dob','$address', '$city','$state','$pincode','$profession','$exp')";

if($conn->query($sql)===TRUE){
//echo "success";
  header('Location:worker_login.html');
} else{
echo "Error:" .$sql."<br>".$conn->error;}
?>