<?php
session_start();
include_once "../backend/config.php";
$sql1 = mysqli_query($conn, "SELECT * FROM STUDENT WHERE UNAME = '{$_SESSION["Id"]}'");
$row = mysqli_fetch_assoc($sql1);
if (!isset($_SESSION['Id'])) {
    header("location: loginPage.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Project#01</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <link rel="stylesheet" href="../CSS/myProfile.css">
    <script type="text/javascript" src="../assets/js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="row container-fluid">
        <div class="profile container d-flex justify-content-center align-items-center">
            <div class="profile-img d-flex justify-content-center">
                <img src="" width="90%">
            </div>
            <span class="profile-name text-center text-white"><?php echo $row['UNAME']; ?></span>
            <a href="index.php" class="back-btn"><i class="fas fa-arrow-left fa-2x text-white"></i><a>
        </div>
        <div class="profile-container d-flex col-sm-8 m-auto">
            <form method="POST" enctype="multipart/form-data" id="profile-form" class="m-auto" onsubmit="return false;">
                <div class="edit-icon my-4 text-center">
                    <i class="fas fa-user-edit fa-3x"></i>
                    <div class="edit mt-3">Click the icon to Edit</div>
                </div>
                <!---------------------student name section-------------------------->
                <label>Student Name</label>
                <div class="input-group mb-4 d-flex justify-content-center">
                    <span class="input-group-text bg-white">
                        <i class="fas fa-user-graduate"></i>
                    </span>
                    <input type="text" name="fname" class="form-control fname" placeholder="Firstname" readonly>
                    <input type="text" name="lname" class="form-control lname" placeholder="Lastname" readonly>
                </div>
                <!---------------------student name section-------------------------->

                <!---------------------paswword section-------------------------->
                <label>Password</label>
                <div class="input-group mb-4 w-50">
                    <span class="input-group-text bg-white">
                        <img src="../assets/bootstrap-icons-1.4.1/lock-fill.svg">
                    </span>
                    <input type="password" name="password" class="form-control pass" value=<?php echo $row['PASSWORD']; ?> placeholder="Your Password" readonly>
                    <!---------------------paswword-eye-icon-------------------------->

                    <button class="input-group-text bg-white pwd-show-icon" style="z-index: 10;">
                        <img src="../assets/bootstrap-icons-1.4.1/eye-fill.svg">
                    </button>

                    <!---------------------paswword-eye-icon---------------------------->
                </div>
                <!---------------------paswword section-------------------------->

                <!---------------------student academic details-------------------------->
                <div class="academic-label">
                    <label>Course</label>
                    <label>Department</label>
                    <label>Year</label>
                </div>
                <div class="input-group mb-4 d-flex justify-content-center">
                    <span class="input-group-text bg-white">
                        <img src="../assets/bootstrap-icons-1.4.1/person-fill.svg">
                    </span>
                    <input type="text" name="course" class="form-control course" placeholder="eg: B.E.,B.Tech" readonly>
                    <span class="input-group-text bg-white">
                        <img src="../assets/bootstrap-icons-1.4.1/person-fill.svg">
                    </span>
                    <input type="text" name="dept" class="form-control dept" placeholder="eg: ECE,CSE" readonly>
                    <span class="input-group-text bg-white">
                        <img src="../assets/bootstrap-icons-1.4.1/person-fill.svg">
                    </span>
                    <input type="text" name="year" class="form-control year" placeholder="eg: 1,2" readonly>
                </div>

                <label>College Name</label>
                <div class="input-group mb-4">
                    <input type="text" name="college_name" class="form-control cname" placeholder="Your college name" readonly>
                </div>
                <!---------------------student academic details-------------------------->

                <!---------------------Add or change profile image-------------------------->
                <label>Profile Picture</label>
                <div class="input-group mb-4">
                    <input type="file" name="profile_img" class="form-control input_img">
                </div>
                <!---------------------Add or change profile image-------------------------->

                <div class="save-btn text-center mb-4">
                    <button class="btn text-white px-4 mx-2" disabled>Save</button>
                    <a href="index.php" class="btn text-white px-4 mx-2">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
<script type="text/javascript" src="../JS/password-show-hide.js"></script>
<script type="text/javascript" src="../JS/myProfile.js"></script>

</html>