<?php
session_start();
include_once "../backend/config.php";
if (isset($_SESSION['Id'])) {
  $sql1 = mysqli_query($conn, "SELECT * FROM STUDENT WHERE UNAME = '{$_SESSION["Id"]}'");
  $res = mysqli_fetch_assoc($sql1);
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
  <link rel="stylesheet" href="../CSS/home.css">
  <script type="text/javascript" src="../assets/js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../assets/js/bootstrap.min.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="nav-w-slogan">
    <!-----------navbar section------------->
    <section id="navigation">
      <nav class="navbar navbar-expand-md">
        <div class="container-fluid">
        <div class="appName text-uppercase text-danger" style="color:orangered;font-size:30px;font-weight:bold;">college media</div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
          </button>
          <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">  
            <ul class="navbar-nav d-flex">
              <li class="nav-item">
                <a class="nav-link text-dark" href="index.php">Home</a>
              </li>
              <!-- <li class="nav-item dropdown">
                <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Gallery
                </a>
                <div class="dropdown-menu" aria-labelledby="#navbarDropdown">
                  <a class="dropdown-item text-dark" href="gallery.html">Techofes</a>
                </div>
              </li> -->
              <li class="nav-item">
                <a class="nav-link text-dark" href="myProfile.php">My Profile</a>
              </li>
              <?php
              if (isset($_SESSION['Id'])) {
                echo '<div class="logout">
                <a href="../backend/logout.php?logout_id='.$res['UNAME'].'" class="btn logout-btn"><i class="fas fa-sign-out-alt fa-1x text-dark"></i></a></div>';
              }
              ?>
          </div>
    </section>
    <!-----------navbar section------------->


    <!---------------Slogan----------------->
    <section class="slogan d-flex justify-content-center align-items-center">
      <div class="container-fluid">
        <div class="clg-name d-flex flex-column">
          <div class="clg-logo text-center">
          <img src="../assets/Images/Guru_Ghasidas_Vishwavidyalaya_Logo.png" width="80"/>
          </div>
            <h1 class="text-dark text-center text-uppercase">Guru Ghasidas University</h1>
        </div>
        <div class="logo-name text-center">
          <p class="fill-text"><i class="fas fa-eye mx-3"></i><i class="fas fa-plus me-3"></i><i class="fas fa-plus mx-2"></i></p>
        </div>
        <?php
        if (!isset($_SESSION['Id'])) {
          echo '<div class="log-sign-btns text-center"><a href="loginPage.php" class="btn login-btn bg-transaparent px-4 text-center">Login</a>
                  <a href="loginPage.php" class="btn signup-btn bg-transaparent px-4 mx-2 text-center">Signup</a></div>';
        } else {
          echo '<div class="chat-btn text-center"><a href="chat.php" class="btn bg-transaparent px-4 text-center">1-1 Chat</a>
                    <a href="club-chat.php" class="btn bg-transaparent px-4 text-center">Group Chat</a></div>';
        }
        ?>
      </div>
    </section>
    <!---------------Slogan----------------->
  </div>


  <!----------features-------->
  <div class="Cards d-flex">
    <!--------------Card-1------------------>

    <div class="card feature-1 my-5 m-auto">
      <div class="card-body text-center">
        <h1>C</h1>
        <p class="card-text">Find your friends....Organise members into groups and share messsages regarding events and activities.</p>
        <div class="button">
          <a href="chat.php" class="btn text-uppercase text-white font-weight-bolder text-decoration-none">Chat</a>
        </div>
      </div>
    </div>

    <!--------------Card-1------------------>

    <!--------------Card-2------------------>

    <div class="card feature-1 my-5 m-auto">
      <div class="card-body text-center">
        <h1>E</h1>
        <p class="card-text">Get updated with our College events and get your hands dirty..</p>
        <div class="button">
          <a href="club-chat.php" class="btn text-uppercase text-white font-weight-bolder text-decoration-none">Events</a>
        </div>
      </div>
    </div>
    <!----------features-------->


    <!--------------Card-2------------------>

    <!--------------Card-3------------------>

    <!-- <div class="card feature-1 my-5 m-auto">
      <div class="card-body text-center">
        <h1>G</h1>
        <p class="card-text">You can see Collection of images of College's inter and intra culturals..</p>
        <div class="button">
          <a href="gallery.html" class="btn text-uppercase text-white font-weight-bolder text-decoration-none">Gallery</a>
        </div>
      </div>
    </div> -->

    <!--------------Card-3------------------>
  </div>

  <!--------footer------------>
  <footer class="bg-dark text-center text-white">
    <!--------footer------------>
    <footer class="bg-dark text-center text-white">
      <!-- Grid container -->
      <div class="container p-4">

        <!-- Section: Text -->
        <section class="mb-4">
          <p>
            Done by: 
          </p>
        </section>
        <!-- Section: Text -->
        <section class="report">
          <p>Report to us if any issues..</p>
          <form id="report-form">
            <div class="input-group my-2">
              <input type="email" name="sender-mail" class="form-control mail">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <div class="input-group my-2">
              <input type="text" name="sender-issue" class="form-control msg">
              <span class="input-group-text"><i class="fas fa-paper-plane"></i></span>
            </div>
            <div class="btn">Send</div>
          </form>
        </section>
        <div class="copyright-text">
          <p>&copy;Copyrights reserved 2021</p>
        </div>
      </div>
      <!-- Grid container -->
    </footer>
    <!-- Footer -->
    <script src="../JS/report.js"></script>
</body>

</html>