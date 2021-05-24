<?php
session_start();

$con = mysqli_connect('localhost', 'root','');
mysqli_select_db($con, 'sms');
$email = $_POST['mail'];
$password = hash('sha512',$_POST['password']);
$error = "username/password incorrect";


$s = "SELECT * FROM student WHERE  mail='$email' AND pass='$password' ";
$result=mysqli_query($con,$s);
$count=mysqli_num_rows($result);
if($count>0)
{
    $_SESSION['mail']=$email;
    header('location:home.php');
}
else{
    $_SESSION["error"] = $error;
    header("location:signin.php");
}