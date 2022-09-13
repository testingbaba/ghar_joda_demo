<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration | Ghar Joda</title>
    <link rel="stylesheet" href="style.css"/>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
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
   include('../database/conn_db.php');

   session_start();
   //Get Request from the Registration Page
   extract($_REQUEST);
   $name=$_POST["name"];
   $email=$_POST["email"];
   $phone=$_POST["phone"];
   $pass1=$_POST["pass1"];
   $pass2=$_POST["pass2"];
   $curDate = date("Y-m-d H:i:s");
   // died function invoked explicitly when error comes
   function died($error) {
      // your error code can go here
      echo "We are very sorry From Ghar Joda, but there were error(s) found with the form you submitted. ";
      echo "These errors appear below.<br /><br />";
      echo $error . "<br /><br />";
      echo "Please go back and filup properly.<br /><br />";
      die();
    }

    //To Check the mandatory fields
    if(!isset($_POST['name']) ||
       !isset($_POST['email']) ||
       !isset($_POST['phone']) ||
       !isset($_POST['pass1']) ||
       !isset($_POST['pass2'])){
           died('Error found with the form you submitted.');
    }

    if(isset($_POST['email'])){
      $sel_query = "SELECT * FROM `user_reg` WHERE user_email='" . $email . "'";
      $results_1 = mysqli_query($con, $sel_query);
      $row = mysqli_num_rows($results_1);
      if ($row != "") {
        $error .= "User already Registered.";
        died("User already Registered");
      }
      else{  //1
        // generate OTP
        $otp = rand(100000,999999);
        // Send OTP from mail
        $output = '';

        $output.='<p>OTP for ghar joda registration.</p>';
        //replace the site url
        $output.='OTP-'. $otp . '';
        $body = $output;
        $subject = "Email Varify";
        $email_to = $email;

        $mail = new PHPMailer();

        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'testingbaba.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'kinshuk.maity@testingbaba.com';                     //SMTP username
        $mail->Password   = 'Maity@123';                             //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->IsHTML(true);
        $mail->From = "kinshuk.maity@testingbaba.com";
        $mail->FromName = "Ghar Joda  - OTP Registration ";


        //Recipients
        // $mail->setFrom('info@testingbaba.com', 'Ghar Joda  - Forgot Password');
                            

        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($email_to);
          if (!$mail->Send()) { 
            echo "Mailer Error: " . $mail->ErrorInfo;
          } //if
          else { 
            echo "Check email for OTP";
            $query= "INSERT into `email_otp` (email,email_otp) VALUES ('$email','$otp')";
            // $query_reg= "INSERT into `user_reg` (user_name,user_email,user_contact,password,reg_datatime)
            //               VALUES ('$name','$email','$phone','".md5($pass1)."','$curDate')";
            $otp_send_result = mysqli_query($con, $query);
            // $reg_result=mysqli_query($con, $query_reg);
            //header("Location: http://localhost/ghar_joda/index.html");
            if ($otp_send_result ) {//3
                 $_SESSION['name'] =$name;
                 $_SESSION['email'] =$email;
                 $_SESSION['phone'] =$phone;
                 $_SESSION['pass1'] =$pass1;
                 $_SESSION['pass2'] =$pass2;
                 $_SESSION['otp'] =$otp;                
                header("Location: otp_email.php");  

            }  //if
            else{ 
                echo "Mail not send";
                //header("Location: http://localhost/ghar_joda/index.html");
            } //else
        }// else
    }
}
 
?>

</body>
</html>