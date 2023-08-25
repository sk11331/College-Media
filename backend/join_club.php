<?php
    session_start();
    include_once "../backend/config.php";
    //getiing the user id of which the current user requested
    $club_id = mysqli_real_escape_string($conn,$_GET['uname']);
    $btnValue = mysqli_real_escape_string($conn,$_GET['btnValue']);
    //Requested -> MEMBER = 1
    //Accepted -> MEMBER = 2
    //Rejected -> MEMBER = 3

    //If the clicked button has the value 'Request'
    if($btnValue == "Request"){
        //checking whether the requesting user and the other end user already exists in the friend_request table 
        $sql1 = mysqli_query($conn,"SELECT * FROM CLUB_REQUEST WHERE REQUESTING_ID = '{$_SESSION['Id']}' AND CLUB_ID = '{$club_id}'");
        
        if(mysqli_num_rows($sql1)>0){
            mysqli_query($conn,"UPDATE CLUB_REQUEST SET MEMBER = 1 WHERE REQUESTING_ID = '{$_SESSION['Id']}' AND CLUB_ID = '{$club_id}'");
        }
        else{
            mysqli_query($conn,"INSERT INTO CLUB_REQUEST(CLUB_ID,REQUESTING_ID,MEMBER) VALUES('{$club_id}','{$_SESSION['Id']}',1)");
        }
        if($sql1){
            echo "Requested";
        }
        else{
            echo mysqli_error($conn);
        }
    }
    else if($btnValue == "Reject"){
        $requested_id = $club_id;
        $sql2 = mysqli_query($conn,"DELETE CLUB_REQUEST WHERE CLUB_ID IN (SELECT CLUB_ID FROM CLUBS WHERE ADMIN_ID = '{$_SESSION['Id']}') AND REQUESTING_ID = '{$requested_id}'");
        if($sql2)
            echo "Rejected";
        else{
            echo mysqli_error($conn);
        }
    }
    else{
        $requested_id = $club_id;
        $sql3 = mysqli_query($conn,"UPDATE CLUB_REQUEST SET MEMBER = 2 WHERE CLUB_ID IN (SELECT CLUB_ID FROM CLUBS WHERE ADMIN_ID = '{$_SESSION['Id']}') AND REQUESTING_ID = '{$requested_id}'");
        if($sql3)
            echo "Accepted";
        else{
            echo mysqli_error($conn);
        }
    }
?>