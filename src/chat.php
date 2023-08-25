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
    <link rel="stylesheet" href="../CSS/chat.css">
    <script type="text/javascript" src="../assets/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../assets/js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="chat-ui container-fluid ">
        <div class="row">
            <!---------------------left-side chat ui friends list--------------------------------->


            <div class="friends-list-ui col-12 col-md-6 col-lg-5 p-2 m-0">
                <div class="main-container">
                    <div class="friends-list-header p-0 sticky-top">
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
                            <input type="search" class="form-control" placeholder="Search your friends list...">
                            <span class="input-group-text"><img src="../assets/bootstrap-icons-1.4.1/search.svg"></span>
                        </div>

                        <!---------------------friends list search bar--------------------------------->

                        <div class="search-users-list col-sm-12">
                        </div>

                    </div>
                    <div class="users-list">
                        <!---------------------friends list ui--------------------------------->

                        <div class="friends-list">
                        </div>

                        <!---------------------friends list ui--------------------------------->

                        <!---------------------other users list ui--------------------------------->

                        <div class="other-users-list">
                        </div>

                        <!---------------------other users list ui--------------------------------->

                    </div>
                </div>

            </div>

            <!---------------------left-side chat ui friends list--------------------------------->



            <!---------------------right-side chat ui--------------------------------->

            <div class="chat-box-container col-12 col-md-6 col-lg-7 p-2">
                <div class="chat-box p-0">
                    <div class="initial-info d-flex justify-content-center align-items-center h-100">
                        <img src="../assets/Images/Chat-stuff-themes/Handshake.jpg" width="50%">
                    </div>
                    <!---------------------text-box--------------------------------->

                    <!---------------------text-box--------------------------------->
                </div>
            </div>

            <!--used for image sending in chat -->
            <input type="file" name="img" class="img_sender" style="display:none">
            <!--used for image sending in chat -->


            <!---------------------right-side chat ui--------------------------------->
        </div>
    </div>
    <script type="text/javascript" src="../JS/friends.js"></script>
    <script type="text/javascript" src="../JS/others.js"></script>
    <script type="text/javascript" src="../JS/chat-box.js"></script>
    <script type="text/javascript" src="../JS/make_friends.js"></script>
    <script type="text/javascript" src="../JS/search.js"></script>
    <script type="text/javascript" src="../JS/unfollow.js"></script>
    <script type="text/javascript">
        $(document).ready(() => {
            setInterval(() => {
                if ($(window).width() < 768) {
                    $(".users-list").on("click", ".friends-list .frnd", () => {
                        console.log("yes");
                        $(".friends-list-ui").hide("fast");
                        $(".chat-box-container").show("fast");
                    });
                    $(".chat-box").on("click", ".chat-box-header .back-btn", () => {
                        $(".friends-list-ui").show("fast");
                        $(".chat-box-container").hide("fast");
                    });

                } else {
                    $(".friends-list-ui").show("fast");
                    $(".chat-box-container").show("fast");
                }
            }, 500);

        });
    </script>
</body>

</html>