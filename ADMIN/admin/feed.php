<?php
session_start();
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
                        FEEDBACK SYSTEM
                        </h2>
                </div>
            </div>
        </div>

        <div class="student-info">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12 ">
                        <h2>FEEDBACK CORNER</h2>
                        <form action="feed.php" method="post">
                            <label>ISSUE:</label>
                            <select name="subject"  class="btn btn-info">
                                <option>Choose issue</option>
                                <option>Academics</option>
                                <option>Transportaion</option>
                                <option>Hostel</option>
                                <option>Faculty/Staff</option>
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
                                    <th class="text-center ">ID</th>
                                    <th class="text-center">NAME</th>
                                    <th class="text-center">EMAIL</th>
                                    <th class="text-center">ISSUE</th>
                                    <th class="text-center">DESCRIPTION</th>
                                </tr>
                            </thead>
                            <?php
                            require('../dbcon.php');
                            if (isset($_POST['show'])) {

                                $subject = $_POST['subject'];


                                $sql = "SELECT * FROM `feedback` WHERE `subject` = '$subject'";

                                $query = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($query) > 0) {
                                    while ($DataRows = mysqli_fetch_assoc($query)) {
                                        $id = $DataRows['id'];
                                        $name = $DataRows['name'];
                                        $email= $DataRows['mail'];
                                        $subject = $DataRows['subject'];
                                        $description = $DataRows['description'];
                                        
                            ?>
                            <?php
                                        foreach ($query as $value) {
                                            echo "
										<tr>
                                        <td>
                                       "  . $value['id'] . "
                                    </td>
                                    <td>
                                    " . $value['name'] . "
                                    </td>
                                    <td>
                                    " . $value['mail'] . "
                                    </td>
                                    <td>
                                        " . $value['subject'] . "
                                    </td>
                                    <td>
                                        " . $value['description'] . "
                                    </td>
												
												</tr>";
                                        }
                                        ?>
                            <?php

                                    }
                                } else {
                                    echo "<tr><td colspan ='5' class='text-center'>No Record Found</td></tr>";
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