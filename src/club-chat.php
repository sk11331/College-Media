<?php
session_start();
include_once "../backend/config.php";
$sql1 = mysqli_query($conn, "SELECT * FROM STUDENT WHERE UNAME = '{$_SESSION["Id"]}'");
$res = mysqli_fetch_assoc($sql1);
if (!isset($_SESSION['Id'])) {
    header("location: loginPage.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Project#01</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <link rel="stylesheet" href="../CSS/clubs.css">
    <script type="text/javascript" src="../assets/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../assets/js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="chat-ui container-fluid ">
        <div class="row">
            <!---------------------left-side chat ui friends list--------------------------------->


            <div class="clubs-list-ui col-12 col-md-6 col-lg-5 p-3 m-0">
                <div class="main-container">
                    <div class="clubs-list-header p-0 sticky-top">
                        <div class="logo-header p-0">
                            <a href="index.php" class="back-btn text-center text-white"><i class="fas fa-arrow-left fa-1x"></i></a>
                            <div class="user-name p-1">
                                <?php
                                echo '
                                    <img src="../backend/Profile_pics/' . $res['IMAGE'] . '" border="2">
                                    <div class="user_id">' . $res['UNAME'] . '</div>
                                    ';
                                ?>
                            </div>
                            <div class="logout text-center">
                                <a href="../backend/logout.php?logout_id=<?php echo $res['UNAME']; ?>" class="btn logout-btn"><i class="fas fa-sign-out-alt fa-1x text-white"></i></a>
                            </div>
                        </div>
                        <!---------------------friends list search bar--------------------------------->

                        <div class="search-bar input-group p-3">
                            <input type="search" class="form-control" placeholder="Search clubs list...">
                            <span class="input-group-text"><img src="../assets/bootstrap-icons-1.4.1/search.svg"></span>
                        </div>

                        <!---------------------friends list search bar--------------------------------->

                        <div class="search-clubs-list">
                        </div>

                    </div>

                    <div class="clubs-list">
                        <!---------------------friends list ui--------------------------------->
                        <div class="joined-clubs-list">
                        </div>

                        <!---------------------friends list ui--------------------------------->

                        <!---------------------other users list ui--------------------------------->

                        <div class="other-clubs-list">
                        </div>

                        <!---------------------other users list ui--------------------------------->

                    </div>
                </div>


            </div>

            <!---------------------left-side chat ui friends list--------------------------------->



            <!---------------------right-side chat ui--------------------------------->

            <div class="chat-box-container col-12 col-md-6 col-lg-7 p-3">
                <div class="chat-box p-0">
                    <div class="initial-info d-flex justify-content-center align-items-center h-100">
                        <img src="../assets/Images/Chat-stuff-themes/Handshake.jpg" width="50%">
                    </div>
                </div>
            </div>

            <!---------------------right-side chat ui--------------------------------->

            <form method="POST" enctype="multipart/form-data" class="profile-dp" id="profile-dp" onsubmit="return false;">
                <input type="file" name="dp" class="dp">
            </form>

        </div>
    </div>
    <script type="text/javascript" src="../JS/joined_clubs.js"></script>
    <script type="text/javascript" src="../JS/other_clubs.js"></script>
    <script type="text/javascript" src="../JS/group_chat.js"></script>
    <script type="text/javascript" src="../JS/join_club.js"></script>
    <script type="text/javascript" src="../JS/club_search.js"></script>
    <script type="text/javascript" src="../JS/unfollow.js"></script>
    <script type="text/javascript" src="../JS/groupInfo.js"></script>
    <script type="text/javascript" src="../JS/changeDp.js"></script>
    <script type="text/javascript">
        $(document).ready(() => {
            setInterval(() => {
                if ($(window).width() < 768) {
                    $(".clubs-list").on("click", ".joined-clubs-list .frnd", () => {
                        console.log("yes");
                        $(".clubs-list-ui").hide("fast");
                        $(".chat-box-container").show("fast");
                    });
                    $(".chat-box").on("click", ".chat-box-header .back-btn", () => {
                        $(".clubs-list-ui").show("fast");
                        $(".chat-box-container").hide("fast");
                    });

                } else {
                    $(".clubs-list-ui").show("fast");
                    $(".chat-box-container").show("fast");
                }
            }, 500);

        });
    </script>
</body>

</html>