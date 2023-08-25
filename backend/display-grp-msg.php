<?php
    session_start();
    include_once "config.php";
    $club_id = mysqli_real_escape_string($conn,$_POST['receiver_id']);
    $sender_id = $_SESSION['Id'];

    //echo $receiver_id;
        $sql = mysqli_query($conn,"SELECT * FROM GROUPCHAT WHERE CLUB_ID = '{$club_id}'");
        if($sql){
            $output = "";
            while($row = mysqli_fetch_assoc($sql)){
                $sql1 = mysqli_query($conn,"SELECT * FROM STUDENT WHERE UNAME = '{$row['SENDER']}'");
                $row1 = mysqli_fetch_assoc($sql1);
                $time = date("H:i",strtotime($row['TIMESTAMP']));
                if($row['SENDER'] == $sender_id){
                    $output .= '<div class="outgoing-msg">                               
                                <span class="msg-text">'.$row['MESSAGE'].'<span class="msg-time">'.$time.'</span></span>
                                <img src="../backend/Profile_pics/'.$row1['IMAGE'].'"class="profile-id">
                                </div>';
                }
                else{
                    $output .= '<div class="incoming-msg">
                                <img src="../backend/Profile_pics/'.$row1['IMAGE'].'"class="profile-id">
                                <span class="msg-text">'.$row['MESSAGE'].'<span class="msg-time">'.$time.'</span></span>
                                </div>';
                }
            }
        }
        else{
            echo mysqli_error($conn);
        }
        echo $output;

?>