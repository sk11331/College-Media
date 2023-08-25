<?php
    session_start();
    include_once "../backend/config.php";
    //getiing the user id of which the current user requested
    $friend_id = mysqli_real_escape_string($conn,$_GET['uname']);
    $btnValue = mysqli_real_escape_string($conn,$_GET['btnValue']);
    //Requested -> friends = 1
    //Accepted -> friends = 2
    //Rejected -> friends = 3

    //If the clicked button has the value 'Request'
    if($btnValue == "Request"){
        //checking whether the requesting user and the other end user already exists in the friend_request table 
        $sql1 = mysqli_query($conn,"SELECT * FROM FRIEND_REQUEST WHERE REQUESTING_ID = '{$friend_id}' AND ACCEPTING_ID = '{$_SESSION['Id']}'"); 
        $sql2 = mysqli_query($conn,"SELECT * FROM FRIEND_REQUEST WHERE (REQUESTING_ID = '{$_SESSION['Id']}' AND ACCEPTING_ID = '{$friend_id}')");
        
        if(mysqli_num_rows($sql1)>0){
            mysqli_query($conn,"UPDATE FRIEND_REQUEST SET FRIENDS = 1 WHERE REQUESTING_ID = '{$friend_id}' AND ACCEPTING_ID = '{$_SESSION['Id']}'");
        }
        else if(mysqli_num_rows($sql2)>0){
            mysqli_query($conn,"UPDATE FRIEND_REQUEST SET FRIENDS = 1 WHERE (REQUESTING_ID = '{$_SESSION['Id']}' AND ACCEPTING_ID = '{$friend_id}')");
        }
        else{
            mysqli_query($conn,"INSERT INTO FRIEND_REQUEST(ACCEPTING_ID,REQUESTING_ID,FRIENDS) VALUES('{$friend_id}','{$_SESSION['Id']}',1)");
        }
        if($sql1 || $sql2){
            echo "Requested";
        }
        else{
            echo mysqli_error($conn);
        }
    }
    else if($btnValue == "Reject"){
        $sql3 = mysqli_query($conn,"UPDATE FRIEND_REQUEST SET FRIENDS = 3 WHERE REQUESTING_ID = '{$friend_id}' AND ACCEPTING_ID = '{$_SESSION['Id']}'");
        if($sql3)
            echo "Rejected";
        else{
            echo mysqli_error($conn);
        }
    }
    else{
        $sql4 = mysqli_query($conn,"UPDATE FRIEND_REQUEST SET FRIENDS = 2 WHERE REQUESTING_ID = '{$friend_id}' AND ACCEPTING_ID = '{$_SESSION['Id']}'");
        if($sql4)
            echo "Accepted";
        else{
            echo mysqli_error($conn);
        }
    }
?>