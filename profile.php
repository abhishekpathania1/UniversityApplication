<?php
session_start();
$email = $_SESSION['mail'];
$conn = mysqli_connect('localhost', 'root', '', 'sms');
$sql = "SELECT * FROM student WHERE mail='$email'";
$query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
</head>

<body class="profile">

    <header>
        <nav class="navbar navbar-expand-lg navbar-light ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="assets/images/logo.png" alt="logo" width="150px" ,height="120px"></a>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active ">
                        <a class="nav-link" href="home.php"><i class="fa fa-home " aria-hidden="true"></i>HOME</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user" aria-hidden="true"></i>MY PROFILE
                        </a>
                        <div class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item " href="profile.php"><i class="fa fa-circle" style="color:green;"
                                    aria-hidden="true"></i><?php echo $_SESSION['mail']; ?></a>
                            <a class="dropdown-item" href="changepassword.php"><i class="fa fa-key"
                                    style="color:orange;" aria-hidden="true"></i>Change Password</a>
                            <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out" style="color:black;"
                                    aria-hidden="true"></i>LOGOUT</a>

                        </div>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <div class="profile-head">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h1>MY PROFILE</h1>
                </div>
            </div>
        </div>

        <!-- Profile table -->
        <div class="container">
            <div class="row">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="text-center" colspan="7">
                                <?php
                foreach ($query as $value) {
                  echo "<img src=" . $value['image'] . " width=150 height=150>";
                } ?></td>
                        </tr>

                    </tbody>
                </table>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">UID</th>
                            <th scope="col">NAME</th>
                            <th scope="col">GENDER</th>
                            <th scope="col">DATE OF BIRTH</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php
                  foreach ($query as $value) {
                    echo "UG" . $value['id'] . "";
                  } ?></td>
                            <td><?php
                  foreach ($query as $value) {
                    echo " " . $value['name'] . "";
                  } ?></td>
                            <td><?php
                  foreach ($query as $value) {
                    echo " " . $value['gender'] . "";
                  } ?></td>
                            <td><?php
                  foreach ($query as $value) {
                    echo " " . $value['dob'] . "";
                  } ?></td>
                        </tr>
                    </tbody>


                    <thead class="thead-light">
                        <tr>
                            <th scope="col">EMAIL</th>
                            <th scope="col">CONTACT</th>
                            <th scope="col">FATHER NAME</th>
                            <th scope="col">BLOOD GROUP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php
                  foreach ($query as $value) {
                    echo " " . $value['mail'] . "";
                  } ?></td>
                            <td><?php
                  foreach ($query as $value) {
                    echo " " . $value['pcontact'] . "";
                  } ?></td>
                            <td><?php
                  foreach ($query as $value) {
                    echo " " . $value['fathername'] . "";
                  } ?></td>
                            <td><?php
                  foreach ($query as $value) {
                    echo " " . $value['bgrp'] . "";
                  } ?></td>

                        </tr>
                    </tbody>
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ADDRESS</th>
                            <th scope="col">STATE</th>
                            <th scope="col">COURSE</th>
                            <th scope="col">HOSTEL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php
                  foreach ($query as $value) {
                    echo " " . $value['address'] . "";
                  } ?></td>
                            <td><?php
                  foreach ($query as $value) {
                    echo " " . $value['state'] . "";
                  } ?></td>
                            <td><?php
                  foreach ($query as $value) {
                    echo " " . $value['standard'] . "";
                  } ?></td>
                            <td><?php
                  foreach ($query as $value) {
                    echo " " . $value['hostel'] . "";
                  } ?></td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- script -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>