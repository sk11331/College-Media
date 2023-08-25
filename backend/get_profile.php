<?php

    session_start();
    include_once "config.php";
    /*$fname = mysqli_real_escape_string($conn,$_POST["fname"]);
    $lname = mysqli_real_escape_string($conn,$_POST["lname"]);
    $pass = mysqli_real_escape_string($conn,$_POST["password"]);
    $course = mysqli_real_escape_string($conn,$_POST["course"]);
    $dept = mysqli_real_escape_string($conn,$_POST["dept"]);
    $year = mysqli_real_escape_string($conn,$_POST["year"]);
    $college_name = mysqli_real_escape_string($conn,$_POST["college_name"]);*/

    $sql = mysqli_query($conn,"SELECT * FROM STUDENT WHERE UNAME = '{$_SESSION['Id']}'");
    $row = mysqli_fetch_assoc($sql);

    if($sql){
        $array['fname'] = $row['FNAME'] ;
        $array['lname'] = $row['LNAME'] ;
        $array['pass'] = $row['PASSWORD'] ;
        $array['course'] = $row['COURSE'] ;
        $array['dept'] = $row['DEPT'];
        $array['year'] = $row['YEAR'] ;
        $array['cname'] = $row['COLL_NAME'];
        $array['img'] = $row["IMAGE"];
        echo json_encode($array);
    }
    else{
        echo mysqli_error($conn);
    }    
?>