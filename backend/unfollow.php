<?php
    session_start();
    include_once "config.php";
    $btnValue = $_POST['btnValue'];
    $user_id = $_POST['user_id'];
    $session_id = $_SESSION["Id"];
    $output ="";
    if($btnValue == "Unfollow"){
        $sql = mysqli_query($conn,"UPDATE FRIEND_REQUEST SET FRIENDS = 3 WHERE (REQUESTING_ID = '{$user_id}' AND
         ACCEPTING_ID = '{$session_id}') OR (REQUESTING_ID = '{$session_id}' AND ACCEPTING_ID = '{$user_id}')");

        if($sql){
        $output = '
        <div class="follow-info d-flex justify-content-center align-items-center h-100">
            <h1>Unfollowed'.$user_id.'</h1>
        </div>';
        }
        else{
            $output = mysqli_error($conn);
        }
    }
    else if($btnValue == "Leave"){
        $sql = mysqli_query($conn,"CALL LEAVE_CLUB('$user_id','$session_id')");
        if($sql){
        $output = '
        <div class="follow-info d-flex justify-content-center align-items-center h-100">
            <h1>Unfollowed'.$user_id.'</h1>
        </div>';
        }
        else{
            $output = mysqli_error($conn);
        }
    }
    echo $output;
?>