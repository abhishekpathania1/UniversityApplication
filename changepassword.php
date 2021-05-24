<?php
session_start();

if (isset($_SESSION['mail'])) {

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

    <div class="container">
        <div class="row ">
            <div class="col-md-5 offset-3">
                <form action="change.php" method="post" class="changepswrd">
                    <h2>Change Password</h2>
                    <?php if (isset($_GET['error'])) { ?>
                    <p class="error" style="color:red;"><?php echo $_GET['error']; ?></p>
                    <?php } ?>

                    <?php if (isset($_GET['success'])) { ?>
                    <p class="success" style="color:green;"><?php echo $_GET['success']; ?></p>
                    <?php } ?>

                    <label style="font-size:18px;">Old Password</label>
                    <input class="form-control" type="password" name="op" placeholder="Old Password" id="myInput">
                    <input type="checkbox" onclick="myFunction()"><label><i class="fa fa-eye" style="margin-left:5px;"
                            aria-hidden="true"></i></label>
                    <br>

                    <label style="font-size:18px;">New Password</label>
                    <input class="form-control" type="password" name="np" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                        placeholder="New Password" id="myIn">
                    <input type="checkbox" onclick="myFunc()"><label><i class="fa fa-eye" style="margin-left:5px;"
                            aria-hidden="true"></i></label>
                    <br>

                    <label style="font-size:18px;">Confirm New Password</label>
                    <input class="form-control" type="password" name="c_np"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                        placeholder="Confirm New Password" id="myInputs">
                    <input type="checkbox" onclick="myFunctions()"><label><i class="fa fa-eye" style="margin-left:5px;"
                            aria-hidden="true"></i></label>
                    <br>

                    <button type="submit" class="btn btn-success">CHANGE</button>

                </form>
            </div>
        </div>
    </div>
    <!-- script -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>

<?php
} else {
  header("Location: home.php");
  exit();
}
?>