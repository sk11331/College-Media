<?php
session_start();
include_once "../backend/config.php";
$sql = mysqli_query($conn, "SELECT * FROM FRIEND_REQUEST WHERE (ACCEPTING_ID = '{$_SESSION["Id"]}' OR  REQUESTING_ID = 
'{$_SESSION["Id"]}') AND FRIENDS = 2");

if (mysqli_num_rows($sql)) {
    $output = '<span class="text text-uppercase m-4">Friends</span>';
    while ($row = mysqli_fetch_assoc($sql)) {
        $sql2 = mysqli_query($conn, "SELECT * FROM CHAT WHERE SENDER = '{$_SESSION["Id"]}' AND (RECEIVER = '{$row['ACCEPTING_ID']}' OR 
        RECEIVER = '{$row['REQUESTING_ID']}') OR ((SENDER = '{$row['ACCEPTING_ID']}' OR SENDER = '{$row['REQUESTING_ID']}') AND 
        RECEIVER = '{$_SESSION["Id"]}') ORDER BY CHAT_ID DESC LIMIT 1");
        $row2 = mysqli_fetch_assoc($sql2);

        if (mysqli_num_rows($sql2) > 0) {
            $msg = substr($row2['MESSAGE'], 0, 30);
            if ($row2['SENDER'] == $_SESSION["Id"]) {
                if ($row2['READSTATUS'] == 0) {
                    $readStatus = "SENT";
                } else {
                    $readStatus = "SEEN";
                }
            } else {
                if ($row2['READSTATUS'] == 0) {
                    $readStatus = '<i class="fas fa-bell"></i>';
                } else {
                    $readStatus = "";
                }
            }
        } else {
            $msg = "No messages yet";
            $readStatus = "";
        }

        if ($row['ACCEPTING_ID'] == $_SESSION["Id"]) {
            $sql1 = mysqli_query($conn, "SELECT * FROM STUDENT WHERE UNAME = '{$row['REQUESTING_ID']}'");
            $row1 = mysqli_fetch_assoc($sql1);
            $output .= '
                <div class="row frnd p-3 m-0 d-flex align-items-center">
                    <span class="col-10 col-sm-10 text-center frnd-profile-pic d-flex justify-flex-start align-items-center">
                        <img src="../backend/Profile_pics/' . $row1['IMAGE'] . '">
                        <span class="info px-2">
                            <span class="user_id d-flex justify-flex-start">' . $row['REQUESTING_ID'] . '</span>
                            <div class="recent-msg">' . $msg . '</div>
                        </span>
                    </span>
                    <span class="col-2 msg-status">' . $readStatus . '</span>
                </div>';
        } else {
            $sql1 = mysqli_query($conn, "SELECT * FROM STUDENT WHERE UNAME = '{$row['ACCEPTING_ID']}'");
            $row1 = mysqli_fetch_assoc($sql1);

            $output .= '
                <div class="row frnd p-3 m-0 d-flex align-items-center">
                    <span class="col-10 text-center frnd-profile-pic d-flex justify-flex-start align-items-center">
                        <img src="../backend/Profile_pics/' . $row1['IMAGE'] . '">
                        <span class="info px-2">
                            <span class="user_id d-flex justify-flex-start">' . $row['ACCEPTING_ID'] . '</span>
                            <div class="recent-msg">' . $msg .'</div>
                        </span> 
                    </span>
                    <span class="col-2 msg-status">' . $readStatus . '</span>
                </div>';
        }
    }
} else {
    $output = '<div class="frnd p-3">
        <span class="col-sm-12 info px-2">You have no friends in your list</span>
        </div>';
}
echo $output;
