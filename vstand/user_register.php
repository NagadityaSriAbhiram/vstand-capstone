<?php
include 'config.php';



$fname=$_POST["fname"];
$lname=$_POST["lname"];
$phn=$_POST["phn"];
$un=$_POST["un"];
$pwd=$_POST["pwd"];


$address=$_POST["address"];
$locality=$_POST["locality"];
$city=$_POST["city"];
$state=$_POST["state"];
$pincode=$_POST["pincode"];



$conn= new mysqli($servername, $username, $password, $dbname);

//echo 'success';

if($conn->connect_error)
{
die("Connection failed" .$conn->connect_error);
}


$sql="INSERT INTO user(fname,lname,phone,uname,pass,address,locality,city,state,pin)
 values('$fname','$lname','$phn','$un','$pwd','$address','$locality', '$city','$state','$pincode')";

if($conn->query($sql)===TRUE){
//echo "success";
  header('Location:user_login.html');
} else{
echo "Error:" .$sql."<br>".$conn->error;}
?>