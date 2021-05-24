<?php
session_start();
if (isset($_POST['submit'])) {

    require('../dbcon.php');
    $name = $_POST['name'];
    $email = $_POST['mail'];
    $subject = $_POST['subject'];
    $description = $_POST['description'];
    $query = "INSERT INTO feedback (name, mail, subject, description) VALUES ('$name','$email','$subject','$description')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['success'] = '* Feedback sent *';
        header('location:tour.php');
    }else{
        $_SESSION['error'] = '* Feedback not sent *';
        header('location:tour.php');
    }
}
