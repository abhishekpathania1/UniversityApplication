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
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
</head>

<body class="add ">
    <?php


	if (!empty($_SESSION['error'])) {
	?>
    <div class="alert">
        <?php
		echo $_SESSION['error'];
		unset($_SESSION['error']);
	}
		?>
    </div>
    <?php
		if (!empty($_SESSION['error2'])) {
		?>
    <div class="alert">
        <?php
			echo $_SESSION['error2'];
			unset($_SESSION['error2']);
		}
			?>
    </div>



    <?php
			// define variables and set to empty values
			$nameErr  = $dobErr = $genderErr = $pcontactErr = $standardErr = $fnameErr = $bgrpErr = $hostelErr = $emailErr = $imageErr = $stateErr = $addressErr = "";
			$name  = $dob = $gender = $pcontact = $standard = $fname = $bgrp = $hostel = $email = $image = $state = $address = "";

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				//   Name
				if (empty($_POST["name"])) {
					$nameErr = "* Name is required *";
				} else {
					$name = test_input($_POST["name"]);
					if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
						$nameErr = "* Only letters and white space allowed *";
					}
				}
				//   dob
				if (empty($_POST["dob"])) {
					$dobErr = "* Date of Birth is required *";
				} else {
					$dob = test_input($_POST["name"]);
				}
				// gender
				if (empty($_POST["gender"])) {
					$genderErr = "* Gender is required *";
				} else {
					$gender = test_input($_POST["gender"]);
				}
				//   pcontact
				if (empty($_POST["pcontact"])) {
					$pcontactErr = "* Contact is required *";
				} else {
					$pcontact = test_input($_POST["pcontact"]);
					if (!preg_match("/^[0-9]*$/", $pcontact)) {
						$pcontactErr = "Only numeric value is allowed.";
					}
					if (strlen($pcontact) != 10) {
						$pcontactErr = "Mobile no must contain 10 digits.";
					}
				}
				//   standard
				if (empty($_POST["standard"])) {
					$standardErr = "* Course is required *";
				} else {
					$standard = test_input($_POST["standard"]);
				}
				//   fathername
				if (empty($_POST["fname"])) {
					$fnameErr = "* Name is required *";
				} else {
					$fname = test_input($_POST["fname"]);
					if (!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
						$fnameErr = "* Only letters and white space allowed *";
					}
				}
				//bgrp
				if (empty($_POST["bgrp"])) {
					$bgrpErr = "* Blood Group is required *";
				} else {
					$bgrp = test_input($_POST["bgrp"]);
					if (!preg_match("^(A|B|AB|O)[+-]?$^", $bgrp)) {
						$bgrpErr = "* Only letters and symbols allowed *";
					}
				}
				//hostel
				if (empty($_POST["hostel"])) {
					$hostelErr = " * ";
				} else {
					$hostel = test_input($_POST["hostel"]);
				}
				//   mail
				if (empty($_POST["mail"])) {
					$emailErr = "* Email is required *";
				} else {
					$email = test_input($_POST["mail"]);
					if (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)) {
						$emailErr = "* Match the Format *";
					}
				}
				// state
				if (isset($_POST['submit'])) {
					$state = $_POST['state'];

					if (!isset($state)) {
						$stateErr = "*State is required *";
					} else {
						$state = test_input($_POST["state"]);
					}
				}
				// address
				if (empty($_POST["address"])) {
					$addressErr = "*address is required *";
				} else {
					$address = test_input($_POST["address"]);
				}
			}

			function test_input($data)
			{
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
			?>


    <div class="container ">
        <div class="row text-center">
            <div class="col-md-12">
                <div class="adm-head">
                    <h1>REGISTER</h1>
                </div>
            </div>
        </div>
    </div>
    <form action="sign.php" method="post" enctype="multipart/form-data">
        <div class="adm-box">
            <div class="container ">
                <div class="row">
                    <div class="col-md-4 offset-2">
                        <div class="form-group" style="width:350px;">
                            <label>Full Name</label><br>
                            <input type="text" class="form-control" name="name" placeholder="Enter Full Name">
                            <span class="error"><?php echo $nameErr; ?></span>
                        </div>
                        <div class="form-group" style="width:350px;">
                            <label>Date Of Birth</label><br>
                            <input type="date" class="form-control" name="dob">
                            <span class="error"><?php echo $dobErr; ?></span>
                        </div>


                        <div class="form-group" style="width:350px;">
                            <label>Gender</label><br>
                            <input type="radio" name="gender" value="MALE"><span
                                style="color:white; font-size:18px;margin:0px 5px;">Male</span>
                            <input type="radio" name="gender" value="FEMALE"><span
                                style="color:white; font-size:18px;margin:0px 5px;">Female</span>
                            <input type="radio" name="gender" value="OTHER"><span
                                style="color:white; font-size:18px;margin:0px 5px;">Other</span><br>
                            <span class="error"><?php echo $genderErr; ?></span>
                        </div>
                        <div class="form-group" style="width:350px;">
                            <label>Phone</label><br>
                            <input type="tel" class="form-control" name="pcontact" pattern="[0-9]{3}[0-9]{3}[0-9]{4}"
                                placeholder="Enter Phone No.">
                            <span class="error"><?php echo $pcontactErr; ?></span>
                        </div>
                        <div class="form-group" style="width:350px;">
                            <label>Course</label>
                            <select name="standard" class="form-control">
                                <option>Choose</option>
                                <option>B.Tech</option>
                                <option>B.C.A</option>
                                <option>B.S.C</option>
                                <option>Animation</option>
                                <option>B.Com</option>
                            </select>
                            <span class="error"><?php echo $standardErr; ?></span>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="form-group" style="width:350px;">
                            <label>Father's Name</label><br> <input type="text" class="form-control" name="fname"
                                placeholder="Enter Full Name">
                            <span class="error"><?php echo $standardErr; ?></span>
                        </div>
                        <div class="form-group" style="width:350px;">
                            <label>Blood Group</label><br>
                            <input type="text" class="form-control" name="bgrp" placeholder="Blood Group">
                            <span class="error"><?php echo $bgrpErr; ?></span>
                        </div>

                        <div class="form-group" style="width:350px;">
                            <label>Hostel Accommodation</label><br>
                            <input type="radio" name="hostel" value="YES"><span
                                style="color:white; font-size:18px;margin:0px 5px;">YES</span>
                            <input type="radio" name="hostel" value="NO"><span
                                style="color:white; font-size:18px;margin:0px 5px;">NO</span><br>
                            <span class="error"><?php echo $hostelErr; ?></span>
                        </div>
                        <div class="form-group" style="width:350px;">

                            <label>Email</label><br>
                            <input type="email" class="form-control" name="mail" placeholder="Enter Email.">
                            <span class="error"><?php echo $emailErr; ?></span>
                        </div>

                        <div class="form-group" style="width:350px;">
                            <label>Profile picture</label><br>
                            <input type="file" class="form-control" name="image" value="" required>

                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-4 offset-2">
                        <div class="form-group" style="width:350px;">

                            <label class="float-left">Select State</label><br>
                            <select name="state" id="state" class="form-control"><br>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                <option value="Daman and Diu">Daman and Diu</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Puducherry">Puducherry</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Odisha">Odisha</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Telangana">Telangana</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="Uttarakhand">Uttarakhand</option>
                                <option value="West Bengal">West Bengal</option>
                            </select>
                            <span class="error"><?php echo $stateErr; ?></span>
                            <label class="float-left">Address</label><br>
                            <textarea class="form-control" style="width:350px;" name="address"
                                placeholder="Address"></textarea>
                            <span class="error"><?php echo $addressErr; ?></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group" style="width:350px;">
                            <label class="float-left">Password</label>
                            <input type="password" id="myInput" name="password"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Enter Password"
                                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                class="form-control" required>
                            <input type="checkbox" onclick="myFunction()" class="float-left"><label
                                class="float-left">Show Password</label>
                            <br>
                            <input type="password" name="cpassword" class="form-control"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Confirm Password"
                                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                id="myIn" required>
                            <input type="checkbox" onclick="myFunc()" class="float-left"><label class="float-left">Show
                                Password</label>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" name="submit" value="REGISTER">
                        </div>
                        <div class="form-group">
                            <a href="signin.php" style="color:white;text-decoration:underline;">SIGN IN?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- script -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>