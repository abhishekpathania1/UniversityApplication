<?php
session_start();
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

<body>
    <header id="header">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="assets/images/logo.png" alt="logo" width="150px" ,height="120px"></a>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active ">
                        <a class="nav-link" href="index.php"><i class="fa fa-home "
                                aria-hidden="true"></i>HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signin.php"><i class="fa fa-sign-in" aria-hidden="true"></i>LOGIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="SMS/login.php"><i class="fa fa-user-secret"
                                aria-hidden="true"></i>LOGIN AS ADMIN</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- tour -->

    <div class="tour-head">
        <div class="headd">
            <div class="container-fluid">

                <div class="row text-center">

                    <div class="col-md-12">
                        <h1>WELCOME TO Greeenwich UNIVERSITY</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- choose us -->
    <div class="tour">
        <div class="tour-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 offset-1">
                        <h1>WHy Our University?</h1>
                        <ul>
                            <li>High-quality education and research </li>
                            <li> A strong focus on graduate employability</li>
                            <li>An affordable cost of living</li>
                            <li>Excellent support services for international students </li>
                        </ul>
                    </div>

                    <div class="col-md-5">
                        <img src="assets/Images/tour1.jpg" alt="tour" height="300px"
                            style="border-radius:10px; margin:20px;">
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- contact US -->
    <div class="section-title text-center">
        <div class="title">
            <div class="row text-center">
                <div class="col-md-10 offset-1">
                    <h2>Contact Us</h2>
                    <p style="margin:25px;">Contact US FOR GIVING FEEDBACK.</p>

                    <?php


if (!empty($_SESSION['error'])) {
?>
<div class="alert"style="text-align:center;">
    <?php
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}
    ?>
</div>
<?php
    if (!empty($_SESSION['success'])) {
    ?>
<div class="alert"style="text-align:center; color:green;">
    <?php
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }
        ?>
</div>
                </div>
            </div>
            <div class="contact-us-form ">
                <div class="container">
                    <form action="feedback.php" method="post">
                        <div class="row">
                            <div class="col-md-4">
                            <label>Name:</label><br>
                                <input type="text" class="form-control" id="Name" name="name" placeholder="Name">
                                <label>Email</label><br>
                                <input type="email" class="form-control" id="email" name="mail" placeholder="Email">
                                <label>Issue</label><br>
                                <select name="subject" id="subject" class="form-control">
                                <option>Choose issue</option>
                                <option>Academics</option>
                                <option>Transportaion</option>
                                <option>Hostel</option>
                                <option>Faculty/Staff</option>
                                </select><br>
                            </div>
                            <div class="col-md-8">
                            <label>Description</label><br>
                                <textarea name="description" class="form-control" id="message" placeholder="Message Text...."></textarea><br>
                                <input type="submit" name="submit" class="btn btn-success" value="SUBMIT">


                                <div class="social-icons text-center">
                                    <ul>
                                        <li><a href="https://www.facebook.com/greenwichuniversity/"><i
                                                    class="fa fa-facebook"></i></a></li>
                                        <li><a href="https://www.twitter.com/greenwichuniversity/"><i
                                                    class="fa fa-twitter "></i></a></li>
                                        <li><a href="https://en.wikipedia.org/wiki/University_of_Greenwich"><i
                                                    class="fa fa-wikipedia-w"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div id="copyright">
                        <h3>Copyright &copy; 2021<a href="#">-<span style="color:greenyellow;">Greenwich</span></a></3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="scroll-top">
                        <a href="#header"><i class="fa fa-angle-up"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <!-- script -->

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>