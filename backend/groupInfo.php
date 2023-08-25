<?php
    session_start();
    include_once "config.php";

    $clubName = mysqli_escape_string($conn,$_GET['clubName']);
    $flag = 0;

    //for findind the admin
    $sql = mysqli_query($conn,"SELECT * FROM CLUBS WHERE CLUB_ID = '{$clubName}'");
    $row = mysqli_fetch_assoc($sql);
    $adminId = $row['ADMIN_ID'];

    //for displaying the profile image of the admin
    $sql1 = mysqli_query($conn,"SELECT * FROM STUDENT WHERE UNAME = '{$adminId}'");
    $row1 = mysqli_fetch_assoc($sql1);

    //to find the relationship between admin and the session user
    $Sql = mysqli_query($conn,"SELECT * FROM FRIEND_REQUEST WHERE (ACCEPTING_ID = '{$_SESSION['Id']}' AND REQUESTING_ID = '{$adminId}') OR  
    (ACCEPTING_ID = '{$adminId}' AND REQUESTING_ID = '{$_SESSION["Id"]}')");
    $Row = mysqli_fetch_assoc($Sql);

    //for displaying the members
    $sql2 = mysqli_query($conn,"SELECT * FROM STUDENT WHERE UNAME IN(SELECT REQUESTING_ID FROM CLUB_REQUEST WHERE CLUB_ID = '{$clubName}') ORDER BY UNAME");
    
    $output = '
    <div class="back-btn p-3"><i class="fas fa-arrow-left fa-2x text-white"></i></div>
    <div class="row container-fluid group-dp m-0 p-3">
        <img src="../backend/Club_profile_pics/'.$row['PROFILE_IMAGE'].'">
        <div class="edit-btn p-0"><i class="fas fa-pencil-alt fa-2x text-white"></i></div>
    </div>
    <div class="row container-fluid group-desc p-3">
        <div class="header">Group Description:-</div>
        <div class="desc">'.$row['DESCRIPTION'].'</div>
    </div>
    <div class="row container-fluid group-members m-0">
        <div class="header mb-2">Admin</div>
        <div class="row admin mb-3 py-2">';

        if(($Row>0 && $Row['FRIENDS'] == 2) || $adminId == $_SESSION['Id']){
            $output .='
            <span class="col-12 col-sm-12 text-center profile-pic d-flex justify-content-start align-items-center p-0">
                <img src="../backend/Profile_pics/'.$row1['IMAGE'].'">
                <span class="user_id px-3">'.$adminId.'</span>
            </span>';
        }

        else if($Row>0 && $Row['FRIENDS'] == 1 && $Row['REQUESTING_ID'] == $_SESSION['Id']){
            $output .='
            <span class="col-7 col-sm-7 col-lg-6 text-center profile-pic d-flex justify-content-start align-items-center p-0">
                <img src="../backend/Profile_pics/'.$row1['IMAGE'].'">
                <span class="user_id px-3">'.$adminId.'</span>
            </span>
            <span class="request col-5 col-sm-5 col-lg-6 m-0 d-flex justify-content-end">
                <button class="btn request-btn mr-auto">Requested</button>
            </span>';
        }
        else if($Row>0 && $Row['FRIENDS'] == 1 && $Row['ACCEPTING_ID'] == $_SESSION['Id']){
            $output .='
            <span class="col-7 col-sm-7 col-lg-6 text-center profile-pic d-flex justify-content-start align-items-center p-0">
                <img src="../backend/Profile_pics/'.$row1['IMAGE'].'">
                <span class="user_id px-3">'.$adminId.'</span>
            </span>
            <span class="request col-5 col-sm-5 col-lg-6 m-0 d-flex justify-content-end">
                <button class="btn request-btn">Accept</button>
                <button class="btn request-btn mx-2">Reject</button>
            </span>';
        }
        else{
            $output .='
            <span class="col-7 col-sm-7 col-lg-6 text-center profile-pic d-flex justify-content-start align-items-center p-0">
                <img src="../backend/Profile_pics/'.$row1['IMAGE'].'">
                <span class="user_id px-3">'.$adminId.'</span>
            </span>
            <span class="request col-5 col-sm-5 col-lg-6 m-0 d-flex justify-content-end">
                <button class="btn request-btn mr-auto">Request</button>
            </span>';
        }

    $output .= '
        </div>
        <div class="header">Club Members</div>';


    while($row2 = mysqli_fetch_assoc($sql2)){
        //checking relationship status
        $sql3 = mysqli_query($conn, "SELECT * FROM FRIEND_REQUEST WHERE (ACCEPTING_ID = '{$_SESSION['Id']}' AND REQUESTING_ID = '{$row2['UNAME']}') OR  
        (ACCEPTING_ID = '{$row2['UNAME']}' AND REQUESTING_ID = '{$_SESSION["Id"]}')");
        $row3 = mysqli_fetch_assoc($sql3);
        
        $flag = 1;
        if(($row3>0 && $row3['FRIENDS'] == 2 )|| $row2['UNAME'] == $_SESSION['Id']){
            $output .= '
            <div class="row member m-2 py-2">
                <span class="col-12 col-sm-12 text-center profile-pic d-flex justify-content-start align-items-center p-0">
                    <img src="../backend/Profile_pics/'.$row2['IMAGE'].'">
                    <span class="user_id px-3">'.$row2['UNAME'].'</span>
                </span>
            </div>';
        }
        else if($row3>0 && $row3['FRIENDS'] == 1 && $row3['REQUESTING_ID'] == $_SESSION['Id']){
            $output .= '
            <div class="row member m-2 py-2">
                <span class="col-7 col-sm-7 col-lg-6 text-center profile-pic  d-flex justify-content-start align-items-center p-0">
                    <img src="../backend/Profile_pics/'.$row2['IMAGE'].'">
                    <span class="user_id px-3">'.$row2['UNAME'].'</span>
                </span>
                <span class="request col-5 col-sm-5 col-lg-6 m-0 d-flex justify-content-end">
                    <button class="btn request-btn mr-auto">Requested</button>
                </span>
            </div>';
        }
        else if($row3>0 && $row3['FRIENDS'] == 1 && $row3['ACCEPTING_ID'] == $_SESSION['Id']){
            $output .= '
            <div class="row member m-2 py-2">
                <span class="col-7 col-sm-7 col-lg-6 text-center profile-pic  d-flex justify-content-start align-items-center p-0">
                    <img src="../backend/Profile_pics/'.$row2['IMAGE'].'">
                    <span class="user_id px-3">'.$row2['UNAME'].'</span>
                </span>
                <span class="request col-5 col-sm-5 col-lg-6 m-0 d-flex justify-content-end">
                    <button class="btn request-btn">Accept</button>
                    <button class="btn request-btn mx-2">Reject</button>
                </span>
            </div>';
        }
        else{
            $output .= '
            <div class="row member m-2 d-flex py-2">
                <span class="col-7 col-sm-7 col-lg-6 text-center profile-pic d-flex justify-content-start align-items-center p-0">
                    <img src="../backend/Profile_pics/'.$row2['IMAGE'].'">
                    <span class="user_id px-3">'.$row2['UNAME'].'</span>
                </span>
                <span class="request col-5 col-sm-5 col-lg-6 m-0 d-flex justify-content-end">
                    <button class="btn request-btn mr-auto">Request</button>
                </span>
            </div>';
        }
    }     

    if(!$flag){
        $output .= '
            <div class="member">&emsp;No members are joined or added yet...</div>
        ';
    }
    $output .= '</div>';
    echo $output;
?>