<?php
session_start();
include_once "../backend/config.php";
$sql1 = mysqli_query($conn, "SELECT * FROM CLUB_REQUEST WHERE REQUESTING_ID = '{$_SESSION["Id"]}' AND MEMBER = 2");
$sql2 = mysqli_query($conn, "SELECT * FROM CLUBS WHERE ADMIN_ID = '{$_SESSION["Id"]}'");
$output = '<span class="text text-uppercase m-4">Joined clubs</span>';

if (mysqli_num_rows($sql1) > 0 || mysqli_num_rows($sql2) > 0) {
    while ($row1 = mysqli_fetch_assoc($sql1)) {
        $sql3 = mysqli_query($conn, "SELECT * FROM CLUBS WHERE CLUB_ID = '{$row1['CLUB_ID']}'");
        $row3 = mysqli_fetch_assoc($sql3);

        $sql4 = mysqli_query($conn, "SELECT * FROM GROUPCHAT WHERE CLUB_ID = '{$row1['CLUB_ID']}' ORDER BY CHAT_ID DESC LIMIT 1");
        $row4 = mysqli_fetch_assoc($sql4);
        
        if(mysqli_num_rows($sql4)>0){
            $msg = substr($row4['MESSAGE'], 0, 40)."...";
        }
        else{
            $msg = "No new messages";
        }

        $output .= '
                <div class="row frnd p-3 m-0 d-flex align-items-center">
                    <span class="col-sm-12 text-center frnd-profile-pic d-flex justify-flex-start align-items-center">
                        <img src="../backend/Club_profile_pics/' . $row3['PROFILE_IMAGE'] . '" width="90%">
                        <span class="info px-2">
                            <span class="user_id d-flex justify-flex-start">' . $row3['CLUB_ID'] . '</span>
                            <div class="recent-msg d-flex justify-flex-start">' .$msg.'</div>
                        </span>
                    </span>
                </div>';
    }

    while ($row2 = mysqli_fetch_assoc($sql2)) {
        $sql4 = mysqli_query($conn, "SELECT * FROM GROUPCHAT WHERE CLUB_ID = '{$row2['CLUB_ID']}' ORDER BY CHAT_ID DESC LIMIT 1");
        $row4 = mysqli_fetch_assoc($sql4);
        if(mysqli_num_rows($sql4)>0){
            $msg = substr($row4['MESSAGE'], 0, 40)."...";
        }
        else{
            $msg = "No new messages";
        }
        $output .= '
                <div class="row frnd p-3 m-0 d-flex align-items-center">
                    <span class="col-sm-12 text-center frnd-profile-pic d-flex justify-flex-start align-items-center">
                        <img src="../backend/Club_profile_pics/'. $row2['PROFILE_IMAGE'] . '" width="90%">
                        <span class="info px-2">
                            <span class="user_id d-flex justify-flex-start">' . $row2['CLUB_ID'] . '</span>
                            <div class="recent-msg d-flex justify-flex-start">' .$msg.'</div>
                        </span>
                    </span>
                </div>';
    }
} else {
    $output = '<div class="frnd p-3">
        <span class="col-sm-12 info px-2">You didnt join any clubs yet</span>
        </div>';
}
echo $output;
