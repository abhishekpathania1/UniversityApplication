<?php
session_start();
if (isset($_POST['submit'])) {

	require('../dbcon.php');
	$name = $_POST['name'];
	$fname = $_POST['fname'];
	$gender = $_POST['gender'];
	$pcontact = $_POST['pcontact'];
	$email = $_POST['mail'];
	$state = $_POST['state'];
	$address = $_POST['address'];
	$standard = $_POST['standard'];
	$dob = $_POST['dob'];
	$hostel = $_POST['hostel'];
	$bgrp = $_POST['bgrp'];
	$cpassword = hash('sha512', $_POST['cpassword']);
	$password = hash('sha512', $_POST['password']);
	$time = time() . '.jpg';
	$dir = '/UniversityApplication/ADMIN/admin/Images/';
	$image = $dir . $time;
	move_uploaded_file($_FILES['image']['tmp_name'], 'Images/' . $time);

	if ($password != $cpassword) {
		$_SESSION['error'] = '* Passwords does not match *';
		header('location:addstudent.php');
	} else {
		$query = "INSERT INTO student(name, fathername, gender,state,address,pcontact,mail,standard,dob,hostel,bgrp,image,pass) VALUES ('$name','$fname','$gender','$state','$address','$pcontact','$email','$standard','$dob','$hostel','$bgrp','$image','$password')";
		$result = mysqli_query($conn, $query);
		if ($result) {
			$_SESSION['success'] = '* User Created Successfully *';
			header('location:index.php');
		} else {

			$_SESSION['error2'] = ' * Error occured/DATA Already Exist * ';
			header('location:addstudent.php');
		}
	}
}