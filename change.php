<?php
session_start();

if (isset($_SESSION['mail'])) {

    require "dbcon.php";

    if (
        isset($_POST['op']) && isset($_POST['np'])
        && isset($_POST['c_np'])
    ) {

        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $op = hash('sha512', $_POST['op']);
        $np = hash('sha512', $_POST['np']);
        $c_np = hash('sha512', $_POST['c_np']);

        if (empty($op)) {
            header("Location: changepassword.php?error=Old Password is required");
            exit();
        } else if (empty($np)) {
            header("Location: changepassword.php?error=New Password is required");
            exit();
        } else if ($np !== $c_np) {
            header("Location: changepassword.php?error=The confirmation password  does not match");
            exit();
        } else {


            $email = $_SESSION['mail'];

            $sql = "SELECT pass
                FROM student WHERE 
                mail='$email' AND pass='$op'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) === 1) {

                $sql_2 = "UPDATE student
        	          SET pass='$np'
        	          WHERE mail='$email'";
                mysqli_query($conn, $sql_2);
                header("Location: changepassword.php?success=Your password has been changed successfully");
                exit();
            } else {
                header("Location: changepassword.php?error=Incorrect password");
                exit();
            }
        }
    } else {
        header("Location: changepassword.php");
        exit();
    }
} else {
    header("Location: home.php");
    exit();
}