<?php
session_start();

$con = mysqli_connect('localhost', 'root','');
mysqli_select_db($con, 'sms');
$username= $_POST['username'];
$password =$_POST['password'];
$error = "username/password incorrect";


$s = "SELECT * FROM admin WHERE  username='$username' AND password='$password' ";
$result=mysqli_query($con,$s);
$count=mysqli_num_rows($result);
if($count>0)
{
    $_SESSION['username']=$username;
    header('location:admin/index.php');
}
else{
    $_SESSION["error"] = $error;
    header("location:login.php");
}