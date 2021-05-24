<?php
session_start();

?>
<html>

<head>
    <title>Admin Login</title>
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">

</head>

<body>

    <body class="sign-in">
        <form action="loginreq.php" method="post">
            <div class="signin-box">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-md-8 signin">
                            <h2>LOGIN ADMIN</h2>
                            <?php
                            if (isset($_SESSION["error"])) {
                                $error = $_SESSION["error"];
                                echo "<span>$error</span>";
                            }
                            ?>
                            <div class="form-group">
                                <label class="float-left">USERNAME</label>
                                <input type="text" name="username" class="form-control" placeholder="Enter Username"
                                    required>
                            </div>
                            <div class="form-group">
                                <label class="float-left">Password</label>
                                <input type="password" name="password" class="form-control" id="myInput"
                                    placeholder="Enter Password" required>
                                <input class="float-left" type="checkbox" onclick="myFunction()"><label
                                    class="float-left"><i class="fa fa-eye" style="margin-left:5px;"
                                        aria-hidden="true"></i></label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class=" btn btn-primary">Log In</button>
                            </div>

                            <div class="form-group ">
                                <a href="../index.php">Back to Home?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- script -->
        <script src="../assets/js/jquery-3.6.0.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/custom.js"></script>
    </body>

</html>

<?php
unset($_SESSION["error"]);
?>