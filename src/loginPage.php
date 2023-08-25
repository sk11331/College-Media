<!DOCTYPE html>
<html>

<head>
    <title>Project#01</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <link rel="stylesheet" href="../CSS/loginPage.css">
    <script type="text/javascript" src="../assets/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../assets/js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <!----------------Main Container--------------------->
    <div class="container-fluid">

        <!----------------Login--------------------->
        <div class="form-container login-container mb-3 mb-lg-0">
            <div class="login-form m-auto align-items-center" id="login-form">
                <form id="login" onsubmit="return false;">
                    <div class="login-logo mb-4 text-center">
                        <i class="fas fa-user fa-6x"></i>
                    </div>
                    <div class="error_msg text-center mb-3">Error message</div>
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-transparent">
                            <img src="../assets/bootstrap-icons-1.4.1/person-fill.svg">
                        </span>
                        <input type="text" name="username" class="form-control input_user" placeholder="">
                    </div>
                    <div class="input-group mb-4">
                        <span class="input-group-text bg-transparent">
                            <img src="../assets/bootstrap-icons-1.4.1/lock-fill.svg">
                        </span>
                        <input type="password" name="password" class="form-control input_pass" placeholder="">
                        <!---------------------paswword-eye-icon---------------------------->

                        <button class="input-group-text bg-transparent pwd-show-icon">
                            <img src="../assets/bootstrap-icons-1.4.1/eye-fill.svg">
                        </button>

                        <!-----------------------paswword-eye-icon---------------------------->
                    </div>
                    <div class="submit-btn text-center mb-3">
                        <button class="btn text-white px-4">Login</button>
                    </div>
                    <div class="text-center">
                        <a href="#" class="text text-decoration-none">Forget Password?</a><br>
                        <a class="text nav-link">Don't have an account? Signup</a>
                    </div>
                </form>
            </div>
        </div>
        <!----------------Login--------------------->

        <!----------------signup--------------------->
        <div class="form-container signup-container">
            <div class="signup-form m-auto" id="signup-form">
                <form id="signup" onsubmit="return false;">
                    <div class="signup-logo mb-3 text-center">
                        <i class="fas fa-user-plus fa-6x"></i>
                    </div>
                    <div class="error_msg text-center mb-3">Error message</div>
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-transparent">
                            <img src="../assets/bootstrap-icons-1.4.1/person-fill.svg">
                        </span>
                        <input type="text" name="username" class="form-control input_user" placeholder="Enter a username">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-transparent">
                            <img src="../assets/bootstrap-icons-1.4.1/lock-fill.svg">
                        </span>
                        <input type="password" name="password" class="form-control input_pass" id="input_pass" placeholder="Enter a password">
                        <!---------------------paswword-eye-icon-------------------------->

                        <button class="input-group-text bg-transparent pwd-show-icon">
                            <img src="../assets/bootstrap-icons-1.4.1/eye-fill.svg">
                        </button>

                        <!---------------------paswword-eye-icon---------------------------->
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-transparent">
                            <img src="../assets/bootstrap-icons-1.4.1/lock-fill.svg">
                        </span>
                        <input type="password" name="conf_password" class="form-control input_pass" placeholder="Confirm password">
                        <!---------------------paswword-eye-icon---------------------------->

                        <button class="input-group-text bg-transparent pwd-show-icon">
                            <img src="../assets/bootstrap-icons-1.4.1/eye-fill.svg">
                        </button>

                        <!---------------------paswword-eye-icon---------------------------->
                    </div>
                    <div class="submit-btn text-center mb-3">
                        <button class="btn text-white px-4">Signup</button>
                    </div>
                    <div class="text-center">
                        <a href="#" class=" text nav-link">Already have an account? Login</a>
                    </div>
                </form>
            </div>
        </div>
        <!----------------signup--------------------->

        <!--------------Overlay--------------------->
        <div class="panel-left" id="panel-left">
            <div class="panel-content">
                <i class="fas fa-eye"></i>
                <h2 class="text-center text-uppercase mb-4">Log in to Explore further!</h2>
                <div class="login-nav text-center">
                    <button class="btn bg-transaparent login">Login</button>
                    <button class="btn bg-transaparent"><a href="index.php" class="text-decoration-none text-white">Cancel</a></button>
                </div>
            </div>
        </div>
        <div class="panel-right" id="panel-right">
            <div class="panel-content">
                <i class="fas fa-eye"></i>
                <h2 class="text-center text-uppercase mb-4">Join us to Explore!</h2>
                <p class="text-center text-uppercase mb-4">Interact, Integrate & have Insights about our CEG here!</p>
                <div class="signup-nav text-center">
                    <button class="btn bg-transaparent signup">Signup</button>
                    <button class="btn bg-transaparent"><a href="index.php" class="text-decoration-none text-white">Cancel</a></button>
                </div>
            </div>
        </div>
        <!--------------Overlay--------------------->

    </div>
    <!----------------Main Container--------------------->
    <script type="text/javascript" src="../JS/login-panel-toggle.js"></script>
    <script type="text/javascript" src="../JS/password-show-hide.js"></script>
    <script type="text/javascript" src="../JS/Signup.js"></script>
    <script type="text/javascript" src="../JS/Login.js"></script>
</body>

</html>