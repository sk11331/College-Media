<?php
    session_start();
    include_once "config.php";
    $receiver_id = mysqli_real_escape_string($conn,$_POST['receiver_id']);
    $sender_id = $_SESSION['Id'];
    //echo $receiver_id;
        $sql = mysqli_query($conn,"SELECT * FROM CHAT WHERE (SENDER = '{$sender_id}' AND RECEIVER = '{$receiver_id}') 
                OR (SENDER = '{$receiver_id}' AND RECEIVER = '{$sender_id}') ORDER BY CHAT_ID");
        mysqli_query($conn,"UPDATE CHAT SET READSTATUS = 1 WHERE (SENDER = '{$receiver_id}' AND RECEIVER = '{$sender_id}')");
        if($sql){
            $output = "";
            while($row = mysqli_fetch_assoc($sql)){
                $time = date("H:i",strtotime($row['TIMESTAMP']));
                if($row['SENDER'] == $sender_id){
                    $output .= '<div class="outgoing-msg d-flex">
                                <span class="msg-text">'.$row['MESSAGE'].'<span class="msg-time">'.$time.'</span></span>
                                </div>';
                }
                else{
                    $output .= '<div class="incoming-msg d-flex">
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