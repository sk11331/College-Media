<?php
    session_start();
    include_once "config.php";
    $msg = mysqli_real_escape_string($conn,$_POST['msg']);
    $club_id = mysqli_real_escape_string($conn,$_POST['receiver_id']);
    $sender_id = $_SESSION['Id'];

    if(isset($_SESSION['Id'])){
        //echo $receiver_id;
        $sql = mysqli_query($conn,"INSERT INTO GROUPCHAT(SENDER,CLUB_ID,MESSAGE) VALUES('{$sender_id}','{$club_id}','{$msg}')");
            
        if($sql){
            echo "success";
        }
        else{
            echo mysqli_error($conn);
        }
    }
    else{
        header("Location: ../src/loginPage.php");
    }
?>