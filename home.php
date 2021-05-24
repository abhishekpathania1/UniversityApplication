<?php
session_start();
if (!isset($_SESSION['mail'])) {
  header('location:signin.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <title>Greeenwich University</title>
</head>

<body class="hom">
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
    <!-- Home -->
    <div class="homee" id="home">
        <div class="container">
            <div class="row ">
                <div class="col-md-6">
                    <h1>THIS IS YOUR TIME. SO WHY WAIT?</h1>
                    <p>Applications are still open. Learn more about our student experience, browse our subjects and
                        join an upcoming virtual event.</p>
                    <button class="btn btn-light">MORE DETAILS</button>
                </div>
            </div>
        </div>
    </div>

    <!-- script -->

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>