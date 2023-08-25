<?php

session_start();
include_once "config.php";
$fname = mysqli_real_escape_string($conn, $_POST["fname"]);
$lname = mysqli_real_escape_string($conn, $_POST["lname"]);
$pass = mysqli_real_escape_string($conn, $_POST["password"]);
$course = mysqli_real_escape_string($conn, $_POST["course"]);
$dept = mysqli_real_escape_string($conn, $_POST["dept"]);
$year = mysqli_real_escape_string($conn, $_POST["year"]);
$college_name = mysqli_real_escape_string($conn, $_POST["college_name"]);

$targetDir = "Profile_pics/";
$targetFile = $targetDir.basename($_FILES["profile_img"]["name"]);
$imgType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
$extension_arr = array("jpeg","jpg","png");//storing allowed image extensions in an array

$sql = mysqli_query($conn, "SELECT * FROM STUDENT WHERE UNAME = '{$_SESSION['Id']}'");
$row = mysqli_fetch_assoc($sql);

if (isset($_SESSION['Id'])) {
    if ($row['COLL_NAME'] != $college_name) {
        $sql1 = mysqli_query($conn, "UPDATE STUDENT SET COLL_NAME = '{$college_name}' WHERE UNAME = '{$_SESSION['Id']}'");
    }
    if ($row['LNAME'] != $lname) {
        $sql2 = mysqli_query($conn, "UPDATE STUDENT SET LNAME = '{$lname}' WHERE UNAME = '{$_SESSION['Id']}'");
    }
    if ($row['COURSE'] != $course) {
        $sql3 = mysqli_query($conn, "UPDATE STUDENT SET COURSE = '{$course}' WHERE UNAME = '{$_SESSION['Id']}'");
    }
    if ($row['DEPT'] != $dept) {
        $sql4 = mysqli_query($conn, "UPDATE STUDENT SET DEPT = '{$dept}' WHERE UNAME = '{$_SESSION['Id']}'");
    }
    if ($row['YEAR'] != $year) {
        $sql5 = mysqli_query($conn, "UPDATE STUDENT SET YEAR = {$year} WHERE UNAME = '{$_SESSION['Id']}'");
    }
    if ($row['PASSWORD'] != $pass) {
        $sql6 = mysqli_query($conn, "UPDATE STUDENT SET PASSWORD = '{$pass}' WHERE UNAME = '{$_SESSION['Id']}'");
    }
    if ($row['FNAME'] != $fname) {
        $sql7 = mysqli_query($conn, "UPDATE STUDENT SET FNAME = '{$fname}' WHERE UNAME = '{$_SESSION['Id']}'");
    }
    if(move_uploaded_file($_FILES["profile_img"]["tmp_name"],$targetFile)){
        $sql8 = mysqli_query($conn,"UPDATE STUDENT SET IMAGE = '{$_FILES["profile_img"]["name"]}' WHERE UNAME = '{$_SESSION['Id']}'");
    }

    $sql = mysqli_query($conn, "SELECT * FROM STUDENT WHERE UNAME = '{$_SESSION['Id']}'");
    $row = mysqli_fetch_assoc($sql);
    $array['fname'] = $row['FNAME'] ;
    $array['lname'] = $row['LNAME'] ;
    $array['pass'] = $row['PASSWORD'] ;
    $array['course'] = $row['COURSE'] ;
    $array['dept'] = $row['DEPT'];
    $array['year'] = $row['YEAR'] ;
    $array['cname'] = $row['COLL_NAME'];
    $array['img'] = $row["IMAGE"];
    echo json_encode($array);

} else {
    echo mysqli_error($conn);
}

?>
