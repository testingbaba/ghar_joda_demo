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

   //Session start
   session_start();

   //Get Request from the Login Page
   extract($_REQUEST);
   $email=$_POST["email"];
   $password=$_POST["pass"];
   
   //Check user is exist in the database
   $query = "SELECT * FROM `user_reg` WHERE user_email='$email' AND password='". md5($password)."'";
   //$result = mysqli_query($con, $query) or die(mysql_error());
   $result = mysqli_query($con, $query);
   $rows = mysqli_num_rows($result);

   if ($rows == 1) {
      $_SESSION['username'] = $username;
      // Redirect to user dashboard page
      header("Location: dashboard.php");
   } else {
      echo "<div class='form'>
          <h3>Incorrect Username/password.</h3><br/>
          <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
          </div>";
    }


   ?>
