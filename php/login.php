<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>

   <?php

   //Import PHPMailer classes into the global namespace
   //These must be at the top of your script, not inside a function
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception;

   //Load Composer's autoloader
   //require 'vendor/autoload.php';
   require('PHPMailer/Exception.php');
   require('PHPMailer/SMTP.php');
   require('PHPMailer/PHPMailer.php');
   require('../database/conn_db.php');


   session_start();

   //Get Request from the Login Page
   extract($_REQUEST);
   $email=$_POST["email"];
   $pass=$_POST["pass"];

   //Session start
   //session_start();

   if (isset($_REQUEST['email'])) {

     //Check user is exist in the database
     $query = "SELECT * FROM `user_reg` WHERE user_email='$email' AND password='" .md5($pass). "'";

     //$result = mysqli_query($con, $query) or die(mysql_error());
     $result = mysqli_query($con, $query);
     $rows = mysqli_num_rows($result);

     if ($rows == 1) {
         $_SESSION['email'] = $email;
         // Redirect to user dashboard page
         header("Location: dashboard.php");
     } else {
         echo 'Session is running';
        header("Location: ../index.html?id=1");
     }
   }
   else{
      echo 'Session is not running';
      header("Location: ../index.html?id=1");
   }


   ?>
   
</body>
</html>
