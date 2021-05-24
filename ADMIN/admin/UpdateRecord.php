<?php

session_start();

?>


<?php

require('../dbcon.php');
$id = $_GET['id'];
$sql = "SELECT * FROM `student` WHERE `id` = '$id'";
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query) > 0) {
	while ($DataRows = mysqli_fetch_assoc($query)) {
		$id = $DataRows['id'];
		$name = $DataRows['name'];
		$fname = $DataRows['fathername'];
		$dob = $DataRows['dob'];
		$gender = $DataRows['gender'];
		$address = $DataRows['address'];
		$pcontact = $DataRows['pcontact'];
		$email = $DataRows['mail'];
		$bgrp = $DataRows['bgrp'];
		$state = $DataRows['state'];
		$hostel = $DataRows['hostel'];
		$standard = $DataRows['standard'];
		$image = $DataRows['image'];
	}
}
?>
<html>

<head>
    <title>View Student</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
</head>

<body class="add ">
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
                        <a class="nav-link" href="../../user/logout.php"><i class="fa fa-sign-out"
                                aria-hidden="true"></i>LOGOUT</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center" style="color:aliceblue;margin:80px auto;">UPDATE STUDENT DETAIL</h2>
            </div>
        </div>
    </div>
    <form method="post" enctype="multipart/form-data">
        <div class="adm-box">
            <div class="container update">
                <div class="row">
                    <div class="col-md-4 offset-2">
                        <div class="form-group" style="width:350px;">
                            <label>Full Name</label><br>
                            <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">

                        </div>
                        <div class="form-group" style="width:350px;">
                            <label>Date Of Birth</label><br>
                            <input type="date" class="form-control" name="dob" value="<?php echo $dob; ?>">

                        </div>


                        <div class="form-group" style="width:350px;">
                            <label>Gender</label><br>
                            <input type="radio" name="gender" <?php if ($gender == "MALE") {
																	echo "checked";
																} ?> value="MALE"><span style="color:white; font-size:18px;margin:0px 5px;">MALE</span>
                            <input type="radio" name="gender" <?php if ($gender == "FEMALE") {
																	echo "checked";
																} ?> value="FEMALE"><span style="color:white; font-size:18px;margin:0px 5px;">FEMALE</span>
                            <input type="radio" name="gender" <?php if ($gender == "OTHER") {
																	echo "checked";
																} ?> value="OTHER"><span style="color:white; font-size:18px;margin:0px 5px;">OTHER</span><br>

                        </div>
                        <div class="form-group" style="width:350px;">
                            <label>Phone</label><br>
                            <input type="tel" class="form-control" name="pcontact" pattern="[0-9]{3}[0-9]{3}[0-9]{4}"
                                placeholder="Enter Phone No." value="<?php echo $pcontact; ?>">

                        </div>
                        <div class="form-group" style="width:350px;">

                            <label>Course</label>
                            <select name="standard" class="form-control" placeholder="Choose Course"
                                value="<?php echo $standard; ?>">
                                <option value="B.Tech" <?php if ($standard == "B.Tech") echo 'selected="selected"'; ?>>
                                    B.Tech</option>
                                <option value="B.C.A" <?php if ($standard == "B.C.A") echo 'selected="selected"'; ?>>
                                    B.C.A</option>
                                <option value="B.S.C" <?php if ($standard == "B.S.C") echo 'selected="selected"'; ?>>
                                    B.S.C</option>
                                <option value="Animation"
                                    <?php if ($standard == "Animation") echo 'selected="selected"'; ?>>Animation
                                </option>
                                <option value="B.Com" <?php if ($standard == "B.Com") echo 'selected="selected"'; ?>>
                                    B.Com</option>
                            </select>

                        </div>

                    </div>
                    <div class="col-md-4 ">
                        <div class="form-group" style="width:350px;">
                            <label>Father's Name</label><br>
                            <input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>">

                        </div>
                        <div class="form-group" style="width:350px;">
                            <label>Blood Group</label><br>
                            <input type="text" class="form-control" name="bgrp" value="<?php echo $bgrp; ?>">

                        </div>

                        <div class="form-group" style="width:350px;">
                            <label>Hostel Accommodation</label><br>
                            <input type="radio" name="hostel" <?php if ($hostel == "YES") {
																	echo "checked";
																} ?> value="YES"><span style="color:white; font-size:18px;margin:0px 5px;">YES</span>
                            <input type="radio" name="hostel" <?php if ($hostel == "NO") {
																	echo "checked";
																} ?> value="NO"><span style="color:white; font-size:18px;margin:0px 5px;">NO</span><br>

                        </div>
                        <div class="form-group" style="width:350px;">

                            <label>Email</label><br>
                            <input type="email" class="form-control" name="mail" placeholder="Enter Email."
                                value="<?php echo $email; ?>">

                        </div>

                        <div class="form-group" style="width:350px;">
                            <label>Profile picture</label><br>
                            <img src="<?php echo $image; ?>" alt="img" width="70" height="70">
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-4 offset-2">
                        <div class="form-group" style="width:350px;">
                            <label class="float-left">Address</label><br>
                            <textarea class="form-control" style="width:350px;" name="address"
                                placeholder="Address"><?php echo $address; ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group" style="width:350px;">
                            <label class="float-left">Select State</label><br>
                            <select name="state" id="state" class="form-control" value="<?php echo $state; ?>"
                                selected="selected"><br>
                                <option value="Andhra Pradesh"
                                    <?php if ($state == "Andhra Pradesh") echo 'selected="selected"'; ?>>Andhra Pradesh
                                </option>
                                <option value="Andaman and Nicobar Islands"
                                    <?php if ($state == "Andaman and Nicobar Islands") echo 'selected="selected"'; ?>>
                                    Andaman and Nicobar Islands</option>
                                <option value="Arunachal Pradesh"
                                    <?php if ($state == "Arunachal Pradesh") echo 'selected="selected"'; ?>>Arunachal
                                    Pradesh</option>
                                <option value="Assam" <?php if ($state == "Assam") echo 'selected="selected"'; ?>>Assam
                                </option>
                                <option value="Bihar" <?php if ($state == "Bihar") echo 'selected="selected"'; ?>>Bihar
                                </option>
                                <option value="Chandigarh"
                                    <?php if ($state == "Chandigarh") echo 'selected="selected"'; ?>>Chandigarh</option>
                                <option value="Chhattisgarh"
                                    <?php if ($state == "Chhattisgarh") echo 'selected="selected"'; ?>>Chhattisgarh
                                </option>
                                <option value="Dadar and Nagar Haveli"
                                    <?php if ($state == "Dadar and Nagar Haveli") echo 'selected="selected"'; ?>>Dadar
                                    and Nagar Haveli</option>
                                <option value="Daman and Diu"
                                    <?php if ($state == "Daman and Diu") echo 'selected="selected"'; ?>>Daman and Diu
                                </option>
                                <option value="Delhi" <?php if ($state == "Delhi") echo 'selected="selected"'; ?>>Delhi
                                </option>
                                <option value="Lakshadweep"
                                    <?php if ($state == "Lakshadweep") echo 'selected="selected"'; ?>>Lakshadweep
                                </option>
                                <option value="Puducherry"
                                    <?php if ($state == "Puducherry") echo 'selected="selected"'; ?>>Puducherry</option>
                                <option value="Goa" <?php if ($state == "Goa") echo 'selected="selected"'; ?>>Goa
                                </option>
                                <option value="Gujarat" <?php if ($state == "Gujarat") echo 'selected="selected"'; ?>>
                                    Gujarat</option>
                                <option value="Haryana" <?php if ($state == "Haryana") echo 'selected="selected"'; ?>>
                                    Haryana</option>
                                <option value="Himachal Pradesh"
                                    <?php if ($state == "Himachal Pradesh") echo 'selected="selected"'; ?>>Himachal
                                    Pradesh</option>
                                <option value="Jammu and Kashmir"
                                    <?php if ($state == "Jammu and Kashmir") echo 'selected="selected"'; ?>>Jammu and
                                    Kashmir</option>
                                <option value="Jharkhand"
                                    <?php if ($state == "Jharkhand") echo 'selected="selected"'; ?>>Jharkhand</option>
                                <option value="Karnataka"
                                    <?php if ($state == "Karnataka") echo 'selected="selected"'; ?>>Karnataka</option>
                                <option value="Kerala" <?php if ($state == "Kerala") echo 'selected="selected"'; ?>>
                                    Kerala</option>
                                <option value="Madhya Pradesh"
                                    <?php if ($state == "Madhya Pradesh") echo 'selected="selected"'; ?>>Madhya Pradesh
                                </option>
                                <option value="Maharashtra"
                                    <?php if ($state == "Maharashtra") echo 'selected="selected"'; ?>>Maharashtra
                                </option>
                                <option value="Manipur" <?php if ($state == "Manipur") echo 'selected="selected"'; ?>>
                                    Manipur</option>
                                <option value="Meghalaya"
                                    <?php if ($state == "Meghalaya") echo 'selected="selected"'; ?>>Meghalaya</option>
                                <option value="Mizoram" <?php if ($state == "Mizoram") echo 'selected="selected"'; ?>>
                                    Mizoram</option>
                                <option value="Nagaland" <?php if ($state == "Nagaland") echo 'selected="selected"'; ?>>
                                    Nagaland</option>
                                <option value="Odisha" <?php if ($state == "Odisha") echo 'selected="selected"'; ?>>
                                    Odisha</option>
                                <option value="Punjab" <?php if ($state == "Punjab") echo 'selected="selected"'; ?>>
                                    Punjab</option>
                                <option value="Rajasthan"
                                    <?php if ($state == "Rajasthan") echo 'selected="selected"'; ?>>Rajasthan</option>
                                <option value="Sikkim" <?php if ($state == "Sikkim") echo 'selected="selected"'; ?>>
                                    Sikkim</option>
                                <option value="Tamil Nadu"
                                    <?php if ($state == "Tamil Nadu") echo 'selected="selected"'; ?>>Tamil Nadu</option>
                                <option value="Telangana"
                                    <?php if ($state == "Telangana") echo 'selected="selected"'; ?>>Telangana</option>
                                <option value="Tripura" <?php if ($state == "Tripura") echo 'selected="selected"'; ?>>
                                    Tripura</option>
                                <option value="Uttar Pradesh"
                                    <?php if ($state == "Uttar Pradesh") echo 'selected="selected"'; ?>>Uttar Pradesh
                                </option>
                                <option value="Uttarakhand"
                                    <?php if ($state == "Uttarakhand") echo 'selected="selected"'; ?>>Uttarakhand
                                </option>
                                <option value="West Bengal"
                                    <?php if ($state == "West Bengal") echo 'selected="selected"'; ?>>West Bengal
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" class="btn btn-warning" name="submit" value="UPDATE">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- script -->
    <script src="../../assets/js/jquery-3.6.0.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
	include('../dbcon.php');
	$id = isset($_GET['id']) ? $_GET['id'] : '';

	$name = isset($_POST['name']) ? $_POST['name'] : '';
	$address = isset($_POST['address']) ? $_POST['address'] : '';
	$fname = isset($_POST['fname']) ? $_POST['fname'] : '';
	$dob = date('Y-m-d', strtotime($_POST['dob']));
	$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
	$pcontact = isset($_POST['pcontact']) ? $_POST['pcontact'] : '';
	$email = isset($_POST['mail']) ? $_POST['mail'] : '';
	$bgrp =  isset($_POST['bgrp']) ? $_POST['bgrp'] : '';
	$state =  isset($_POST['state']) ? $_POST['state'] : '';
	$hostel = isset($_POST['hostel']) ? $_POST['hostel'] : '';
	$standard =  isset($_POST['standard']) ? $_POST['standard'] : '';
	$time = time() . '.jpg';
	$dir = '/UniversityApplication/ADMIN/admin/Images/';
	$image = $dir . $time;
	$sql = "SELECT * FROM student WHERE mail='$email'";
	$sql1 = "SELECT * FROM student WHERE pcontact='$pcontact'";

	$query = mysqli_query($conn, $sql);
	$query1 = mysqli_query($conn, $sql1);

	$count = mysqli_num_rows($query);
	$count1 = mysqli_num_rows($query1);

	if ($count == 0 || $count1 == 0) {
		if ($_FILES['image']['size'] != 0) {
			move_uploaded_file($_FILES['image']['tmp_name'], 'Images/' . $time);

			$sql1 = "UPDATE student SET  name = '$name', address='$address', fathername ='$fname',dob = '$dob',gender = '$gender', pcontact = '$pcontact', mail = '$email', bgrp = '$bgrp', state = '$state', hostel = '$hostel', standard = '$standard' ,image = '$image' WHERE id = '$id'";
			if (mysqli_query($conn, $sql1)) {

				echo "<p style='color:white; margin-left:842px; text-align:center; background-color:lightgreen; width:190px;height:25px;'>UPDATED SUCCESSFULLY</p>";
			} else {
				// echo"error".$sql1."".mysqli_error($conn);
			}
		} else {
			$sql11 = "UPDATE student SET  name = '$name', address='$address', fathername ='$fname',dob = '$dob',gender = '$gender', pcontact = '$pcontact', mail = '$email', bgrp = '$bgrp', state = '$state', hostel = '$hostel', standard = '$standard' WHERE id = '$id'";
			if (mysqli_query($conn, $sql11)) {
				echo "<p style='margin-left:842px;color:white;text-align:center; background-color:lightgreen;width:190px;height:25px;'>UPDATED SUCCESSFULLY</p>";
			} else {
				echo "error" . $sql11 . "" . mysqli_error($conn);
			}
		}
	} else {
		if ($_FILES['image']['size'] != 0) {
			move_uploaded_file($_FILES['image']['tmp_name'], 'Images/' . $time);
			$sql2 = "UPDATE student SET  name = '$name', address='$address', fathername ='$fname',dob = '$dob',gender = '$gender', bgrp = '$bgrp', state = '$state', hostel = '$hostel', standard = '$standard' ,image = '$image' WHERE id = '$id'";
			if (mysqli_query($conn, $sql2)) {
				echo "<p style='margin-left:860px;color:white;text-align:center; background-color:red;width:160px;height:25px;'>DATA ALREADY EXIST</p>";
			} else {
				echo "error" . $sql2 . "" . mysqli_error($conn);
			}
		} else {
			$sql22 = "UPDATE student SET  name = '$name', address='$address', fathername ='$fname',dob = '$dob',gender = '$gender', bgrp = '$bgrp', state = '$state', hostel = '$hostel', standard = '$standard'  WHERE id = '$id'";
			if (mysqli_query($conn, $sql22)) {
				echo "<p style='margin-left:860px;color:white; text-align:center; background-color:red;width:160px;height:25px;'>DATA ALREADY EXIST</p>";
			} else {
				echo "error" . $sql22 . "" . mysqli_error($conn);
			}
		}
	}
}

?>