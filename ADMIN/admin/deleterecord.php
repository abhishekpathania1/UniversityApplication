<?php session_start(); ?>
<?php

require "../dbcon.php";

$id = $_GET['id'];

$del = mysqli_query($conn, "delete from student where id = '$id'");

if ($del) {
    mysqli_close($conn);
    header("location:deletestudent.php");
    exit;
} else {
    echo "Error deleting record";
}
?>