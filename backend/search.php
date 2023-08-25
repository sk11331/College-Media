<?php
session_start();
include_once "config.php";
$searchTerm = $_POST['searchTerm'];
$sql = mysqli_query($conn, "SELECT * FROM STUDENT WHERE NOT UNAME = '{$_SESSION['Id']}' AND UNAME LIKE '{$searchTerm}%'");
$output = "";
if (mysqli_num_rows($sql)) {
    while ($row = mysqli_fetch_assoc($sql)) {
        $sql1 = mysqli_query($conn, "SELECT * FROM FRIEND_REQUEST WHERE REQUESTING_ID = '{$row['UNAME']}' OR ACCEPTING_ID = '{$row['UNAME']}'");
        $row1 = mysqli_fetch_assoc($sql1);

        $sql2 = mysqli_query($conn, "SELECT * FROM CHAT WHERE (SENDER = '{$_SESSION["Id"]}' AND RECEIVER = '{$row['UNAME']}') OR (SENDER = '{$row['UNAME']}' AND RECEIVER = '{$_SESSION["Id"]}') ORDER BY CHAT_ID DESC LIMIT 1");
        $row2 = mysqli_fetch_assoc($sql2);

        if (mysqli_num_rows($sql2) > 0) {
            if ($row2['SENDER'] == $_SESSION["Id"]) {
                if ($row2['READSTATUS'] == 0) {
                    $msg = substr($row2['MESSAGE'], 0, 30);
                    $readStatus = "SENT";
                } else {
                    $msg = substr($row2['MESSAGE'], 0, 30);
                    $readStatus = "SEEN";
                }
            } else {
                $msg = substr($row2['MESSAGE'], 0, 30);
                $readStatus = "";
            }
        } else {
            $msg = "No messages yet";
            $readStatus = "";
        } 

        if (mysqli_num_rows($sql1) && $row1['REQUESTING_ID'] == $row['UNAME'] && $row1['FRIENDS'] == 1) {
            $output .= '
                <div class="row frnd p-3 m-0 d-flex align-items-center">
                    <span class="col-6 col-sm-6 text-center frnd-profile-pic d-flex justify-flex-start align-items-center">
                        <img src="../backend/Profile_pics/' . $row['IMAGE'] . '">
                        <span class="info px-2">' . $row['UNAME'] . '</span>
                    </span>
                    <div class="request col-6 col-sm-6 d-flex justify-content-end">
                        <button class="btn request-btn">Accept</button>
                        <button class="btn request-btn mx-2">Reject</button>
                    </div>
                </div>';
        } else if (mysqli_num_rows($sql1) && $row1['ACCEPTING_ID'] == $row['UNAME'] && $row1['FRIENDS'] == 1) {
            $output .= '
                <div class="row frnd p-3 m-0 d-flex align-items-center">
                    <span class="col-6 col-sm-6 text-center frnd-profile-pic d-flex justify-flex-start align-items-center">
                        <img src="../backend/Profile_pics/' . $row['IMAGE'] . '">
                        <span class="info px-2">' . $row['UNAME'] . '</span>
                    </span>
                    <div class="request col-6 col-sm-6 d-flex justify-content-end">
                        <button class="btn request-btn">Requested</button>
                    </div>
                </div>';
        } else if (mysqli_num_rows($sql1) && $row1['FRIENDS'] == 2) {
            $output .= '
                <div class="row frnd p-3 m-0 d-flex align-items-center">
                    <span class="col-12 col-sm-12 text-center frnd-profile-pic d-flex justify-flex-start align-items-center">
                        <img src="../backend/Profile_pics/' . $row['IMAGE'] . '">
                        <span class="info px-2">
                            <span class="user_id d-flex justify-flex-start">' . $row['UNAME'] . '</span>
                            <div class="recent-msg">' . $msg . '
                                <span class="msg-status">'.$readStatus.'</span>
                            </div>
                        </span>
                    </span>
                </div>';
        } else {
            $output .= '
                <div class="row frnd p-3 m-0 d-flex align-items-center">
                    <span class="col-6 col-sm-6 text-center frnd-profile-pic d-flex justify-flex-start align-items-center">
                        <img src="../backend/Profile_pics/' . $row['IMAGE'] . '">
                        <span class="info px-2">' . $row['UNAME'] . '</span>
                    </span>
                    <div class="request col-6 col-sm-6 d-flex justify-content-end">
                        <button class="btn request-btn">Request</button>
                    </div>
                </div>';
        }
    }
} else {
    $output = '<div class="frnd p-3">
        <span class="col-sm-12 info px-2">No uers found</span>
        </div>';
}
echo $output;
