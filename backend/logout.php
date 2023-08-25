<?php
    session_start();
    include_once "config.php";
    $status = "Offline";

    if(isset($_SESSION['Id'])){
        $logout_id  = mysqli_real_escape_string($conn,$_GET['logout_id']);
        if(isset($logout_id)){
            //console.log($_GET['logout_id']);
            $sql = mysqli_query($conn,"UPDATE STUDENT SET STATUS = '{$status}' WHERE UNAME = '{$logout_id}'");
            if($sql){
                //console.log('logging out');
                session_unset();
                session_destroy();
                header("location: ../src/loginPage.php");
            }
        }
        else{
            header("location: ../src/chat.php");
        }
    }
    else{
        header("location: ../src/index.php");
    }

?>