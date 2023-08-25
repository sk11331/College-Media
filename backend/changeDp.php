<?php
    session_start();
    include_once "config.php";

    $clubName = mysqli_escape_string($conn,$_POST['club']);
    $targetDir = "Club_profile_pics/";
    $targetFile = $targetDir.basename($_FILES["dp"]["name"]);
    $imgType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
    $extension_arr = array("jpeg","jpg","png");

    $sql = mysqli_query($conn, "SELECT * FROM CLUBS WHERE CLUB_ID = '{$clubName}'");
    $row = mysqli_fetch_assoc($sql);

    if(move_uploaded_file($_FILES["dp"]["tmp_name"],$targetFile)){
        $sql1 = mysqli_query($conn,"UPDATE CLUBS SET PROFILE_IMAGE = '{$_FILES["dp"]["name"]}' WHERE CLUB_ID = '{$clubName}'");
    }
    else{
        echo mysqli_error($conn);
    }

?>