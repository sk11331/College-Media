<?php
    session_start();
    include_once "config.php";
    $receiver_id = mysqli_real_escape_string($conn,$_POST['receiver_id']);
    $sql = mysqli_query($conn,"SELECT * FROM STUDENT WHERE UNAME = '{$receiver_id}'");
    $row = mysqli_fetch_assoc($sql);
    if(mysqli_num_rows($sql)>0){
        $output = $row['STATUS'];
    }
    else{
        $output = mysqli_error($conn);
    }
    echo $output;
?>