<?php

  $servername = "localhost";
  $username = "root";
  $password = "";

/*  $conn = new mysqli($servername,$username,$password);  // Establising connection with server.

  if($conn->connect_error)
    die("Connection Failure:".$conn->connect_error);

  $sql = "CREATE DATABASE COLLEGE_MEDIA"; // Query to create the database

  if($conn->query($sql) == TRUE)
    echo "Database creation successful!\n";
  else
    die("Error in database creation ".$conn->error);
  $conn->close();
*/

  $db = "COLLEGE_MEDIA";
  $conn = new mysqli($servername,$username,$password,$db);  // Establising connection with server.

  //creation of student table
  $sql = "CREATE TABLE STUDENT(
    S_ROLLNO INT,
    UNAME VARCHAR(50) NOT NULL PRIMARY KEY,
    SNAME VARCHAR(50) NOT NULL,
    DEPT VARCHAR(50),
    IMAGE VARCHAR(50),
    PASSWORD VARCHAR(100),
    STATUS VARCHAR(20)
  )";
  if($conn->query($sql) == TRUE)
    echo "STUDENT table created successfully!";
  else
    die("Error in STUDENT table creation".$conn->error);


    // Creation of clubs table
    $sql = "CREATE TABLE CLUBS(
      CLUB_ID INT PRIMARY KEY AUTO_INCREMENT,
      CLUB_NAME VARCHAR(60),
      U_ID VARCHAR(50),
      FOREIGN KEY(U_ID) REFERENCES STUDENT(UNAME)
    )";
    if($conn->query($sql))
      echo "CLUBS table created successfully!";
    else
      die("Error in CLUBS table creation".$conn->error);


      // Creation of ACTIVITIES table
          $sql = "CREATE TABLE ACTIVITIES(
            ACT_ID INT PRIMARY KEY AUTO_INCREMENT,
            ACT_NAME VARCHAR(60),
            C_ID INT,
            DATEOFACT DATE,
            FOREIGN KEY(C_ID) REFERENCES CLUBS(CLUB_ID)
          )";
          if($conn->query($sql))
            echo "ACTIVITIES table created successfully!";
          else
            die("Error in ACTIVITIES table creation".$conn->error);


            // Creation of CHAT table
            $sql = "CREATE TABLE CHAT(
              CHAT_ID INT PRIMARY KEY AUTO_INCREMENT,
              SENDER VARCHAR(50),
              RECEIVER VARCHAR(50),
              MESSAGE VARCHAR(200),
              READSTATUS INT,
              CHECK (READSTATUS IN (0,1)),
              FOREIGN KEY(SENDER) REFERENCES STUDENT(UNAME),
              FOREIGN KEY(RECEIVER) REFERENCES STUDENT(UNAME)
            )";
            if($conn->query($sql))
              echo "CHAT table created successfully!";
            else
              die("Error in CHAT table creation".$conn->error);


                // Creation of groupchat
                $sql = "CREATE TABLE GROUPCHAT(
                  SENDER VARCHAR(50),
                  C_ID INT,
                  TIMESTMP TIMESTAMP,
                  CHAT_ID INT PRIMARY KEY AUTO_INCREMENT,
                  MESSAGE VARCHAR(200),
                  FOREIGN KEY(SENDER) REFERENCES STUDENT(UNAME)
                )";
                if($conn->query($sql))
                  echo "GROUPCHAT table created successfully!";
                else
                  die("Error in GROUPCHAT table creation".$conn->error);

                    //creation of friend request table
                    $sql = "CREATE TABLE FRIEND_REQUEST(
                    ID INT PRIMARY KEY AUTO_INCREMENT,
                    ACCEPTING_ID VARCHAR(50),
                    REQUESTING_ID VARCHAR(50),
                    FRIENDS INT,
                    FOREIGN KEY(ACCEPTING_ID) REFERENCES STUDENT(UNAME),
                    FOREIGN KEY(REQUESTING_ID) REFERENCES STUDENT(UNAME)
                    )";
                    if($conn->query($sql))
                      echo "GROUPCHAT table created successfully!";
                    else
                       die("Error in GROUPCHAT table creation".$conn->error);
  
  $conn->close(); //Closing connection to server
?>
