<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
</head>

<body class="admin">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="../../assets/images/logo.png" alt="logo" width="150px"
                    ,height="120px"></a>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active ">
                        <a class="nav-link" href="../admin/index.php"><i class="fa fa-home "
                                aria-hidden="true"></i>HOME</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-pencil" aria-hidden="true"></i>EDIT
                        </a>
                        <div class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item " href="addstudent.php">Create student Profile</a>
                            <a class="dropdown-item" href="updatestudent.php">Update Student Details</a>
                            <a class="dropdown-item" href="deletestudent.php">Delete Profile</a>
                        </div>
                    </li>
                    <li class="nav-item active ">
                        <a class="nav-link" href="feed.php"><i class="fa fa-comments-o" aria-hidden="true"></i>FEEDBACK</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../logout.php"><i class="fa fa-sign-out"
                                aria-hidden="true"></i>LOGOUT</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <?php


    if (!empty($_SESSION['success'])) {
    ?>
    <div class="success">
        <?php
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <h1 style="text-align: center; color:white; margin:30px 0px;">
                        WELCOME TO STUDENT MANAGEMENT SYSTEM
                        </h2>
                </div>
            </div>
        </div>

        <div class="student-info">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12 ">
                        <h2>Student's information</h2>
                        <form action="index.php" method="post">
                            <label>Course</label>
                            <select name="standard" class="btn btn-info" required>
                                <option></option>
                                <option>B.Tech</option>
                                <option>B.C.A</option>
                                <option>B.S.C</option>
                                <option>Animation</option>
                                <option>B.Com</option>
                            </select>
                            <input type="submit" name="show" value="SHOW INFO" class="btn btn-success text-center"
                                style="margin-left: 30px;">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="student">
            <div class="container-fluid">
                <div class="row text-center">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered  text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center ">UID</th>
                                    <th class="text-center">COURSE</th>
                                    <th class="text-center">NAME</th>
                                    <th class="text-center">DOB</th>
                                    <th class="text-center">GENDER</th>
                                    <th class="text-center">BLOOD GROUP</th>
                                    <th class="text-center">FATHER NAME</th>
                                    <th class="text-center">ADDRESS</th>
                                    <th class="text-center">STATE</th>
                                    <th class="text-center">CONTACT</th>
                                    <th class="text-center">EMAIL</th>
                                    <th class="text-center">HOSTEL ACCOMMODATION</th>
                                    <th class="text-center">PROFILE PIC</th>

                                </tr>
                            </thead>
                            <?php
                            require('../dbcon.php');
                            if (isset($_POST['show'])) {

                                $standard = $_POST['standard'];


                                $sql = "SELECT * FROM `student` WHERE `standard` = '$standard'";

                                $query = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($query) > 0) {
                                    while ($DataRows = mysqli_fetch_assoc($query)) {
                                        $id = $DataRows['id'];
                                        $name = $DataRows['name'];
                                        $address = $DataRows['address'];
                                        $pcontact = $DataRows['pcontact'];
                                        $standard = $DataRows['standard'];
                                        $image = $DataRows['image'];
                            ?>
                            <?php
                                        foreach ($query as $value) {
                                            echo "
										<tr>
                                        <td>
                                        UG"  . $value['id'] . "
                                    </td>
                                    <td>
                                    " . $value['standard'] . "
                                    </td>
                                    <td>
                                    " . $value['name'] . "
                                    </td>
                                    <td>
                                        " . $value['dob'] . "
                                    </td>
                                    <td>
                                        " . $value['gender'] . "
                                    </td>
                                    <td>
                                    " . $value['bgrp'] . "
                                    </td>
                                    <td>
                                        " . $value['fathername'] . "
                                    </td>
                                    <td>
                                        " . $value['address'] . "
                                    </td>
                                    <td>
                                        " . $value['state'] . "
                                    </td>
                                    <td>
                                    " . $value['pcontact'] . "
                                    </td>
                                    <td>
                                    " . $value['mail'] . "
                                    </td>
                                    <td>
                                    " . $value['hostel'] . "
                                    </td>
											<td>
											 <img src=" . $value['image'] . " width=150 height=150>											
											</td>
												
												</tr>";
                                        }
                                        ?>
                            <?php

                                    }
                                } else {
                                    echo "<tr><td colspan ='14' class='text-center'>No Record Found</td></tr>";
                                }
                            }

                            ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- script -->
        <script src="../../assets/js/jquery-3.6.0.min.js"></script>
        <script src="../../assets/js/bootstrap.min.js"></script>
</body>

</html>