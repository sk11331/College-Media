<?php
    session_start();
    include_once "../backend/config.php";
    $sql = mysqli_query($conn,"SELECT * FROM STUDENT WHERE UNAME NOT IN (SELECT ACCEPTING_ID FROM FRIEND_REQUEST WHERE 
    REQUESTING_ID = '{$_SESSION["Id"]}' AND FRIENDS = 2) AND UNAME NOT IN (SELECT REQUESTING_ID FROM FRIEND_REQUEST WHERE 
    ACCEPTING_ID = '{$_SESSION["Id"]}' AND FRIENDS = 2 ) AND NOT UNAME = '{$_SESSION["Id"]}'");
    if(mysqli_num_rows($sql)>0){
        $output = '<span class="text text-uppercase m-4">Others</span>';
        while($row = mysqli_fetch_assoc($sql)){
            $sql1 = mysqli_query($conn,"SELECT * FROM FRIEND_REQUEST WHERE REQUESTING_ID = '{$row['UNAME']}' AND 
            ACCEPTING_ID = '{$_SESSION["Id"]}' AND FRIENDS = 1");
            $sql2 = mysqli_query($conn,"SELECT * FROM FRIEND_REQUEST WHERE REQUESTING_ID = '{$_SESSION["Id"]}' AND 
            ACCEPTING_ID = '{$row['UNAME']}' AND FRIENDS = 1");
            $sql3 = mysqli_query($conn,"SELECT * FROM STUDENT WHERE UNAME = '{$row['UNAME']}'");
            $row3 = mysqli_fetch_assoc($sql3);

            $output .= '
                <div class="row frnd p-3 m-0 d-flex align-items-center">
                    <span class="col-6 col-sm-6 text-center frnd-profile-pic d-flex justify-flex-start align-items-center">
                        <img src="../backend/Profile_pics/'.$row3['IMAGE'].'">';
            if(mysqli_num_rows($sql1)>0){
            $output .= '<span class="info px-2">'.$row['UNAME'].'</span></span>
                    <div class="request col-6 col-sm-6 d-flex justify-content-end">
                        <button class="btn request-btn">Accept</button>
                        <button class="btn request-btn mx-2">Reject</button>
                    </div>
                </div>';
            }
            else if(mysqli_num_rows($sql2)>0){
                $output .= '<span class="info px-2">'.$row['UNAME'].'</span></span>
                <div class="request col-6 col-sm-6 d-flex justify-content-end">
                    <button class="btn request-btn">Requested</button>
                </div>
            </div>'; 
            }
            else{
                $output .= '<span class="info px-2">'.$row['UNAME'].'</span></span>
                    <div class="request col-6 col-sm-6 d-flex justify-content-end">
                        <button class="btn request-btn">Request</button>
                    </div>
                </div>';
            }
        }
    }
    else{
        $output = '<div class="frnd p-3">
        <span class="col-sm-12 info px-2" id="info">No new users available</span>
        </div>';
    }
    echo $output;
?>