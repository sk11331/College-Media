<?php
    session_start();
    include_once "config.php";
    $uname = mysqli_real_escape_string($conn,$_POST['username']);
    $pwd = mysqli_real_escape_string($conn,$_POST['password']);
    $status = "Online";
    
    //Checking whether all input fields are filled or not
    if(!empty($uname) && !empty($pwd)){
        
            $sql = mysqli_query($conn,"SELECT * FROM STUDENT WHERE UNAME = '{$uname}' AND PASSWORD = '{$pwd}'");

            //checking whether the user exists
            if(mysqli_num_rows($sql)>0){
                //updating the online status of the user
                $sql1 = mysqli_query($conn,"UPDATE STUDENT SET STATUS = '{$status}' WHERE UNAME = '{$uname}' AND PASSWORD = '{$pwd}'");
                if($sql1){
                    $res = mysqli_fetch_assoc($sql);
                    //setting the username as session id 
                    $_SESSION['Id'] = $res['UNAME'];
                    echo "Success";
                }
            }
            else{
                echo "Username or Password is invalid";
            }     
    }
    else{
        echo "All input fields are required";
    }   
?>