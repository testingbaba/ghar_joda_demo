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
   <h3>Email Verify :</h3><br>
   <?php

        //Import PHPMailer classes into the global namespace
        //These must be at the top of your script, not inside a function
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

        require('PHPMailer/Exception.php');
        require('PHPMailer/SMTP.php');
        require('PHPMailer/PHPMailer.php');
        include('../database/conn_db.php');

        session_start();
        $otp=$_SESSION['otp'];
        $name=$_SESSION['name'];
        $email=$_SESSION['email'];
        $phone=$_SESSION['phone'];
        $pass1=$_SESSION['pass1'] ;
        

        // extract($_REQUEST);
        // $send_otp=$_POST["send_otp"];
        $curDate = date("Y-m-d H:i:s");
    ?>
        <form action='' method="POST">                    
            <div class="tableheader">Enter OTP :</div>             
            <div class="tablerow">                     
                <input type="number" id="send_otp" name="send_otp" placeholder="One Time Password" class="login-input">
            </div>
            <div class="tableheader"><input type="submit" name="submit_otp" value="Submit" class="btn"><br>
            <input type="submit" name="resend_otp" value="Resend OTP" class="btn"></div>

            
        </form>
    <?php
    
    //click on Submit button 
    if(!empty($_POST["submit_otp"])) {

        extract($_REQUEST);
        $send_otp=$_POST["send_otp"];       
        if($send_otp!=$otp){
            echo "Invalid OTP";
               
            }
            else{
                $query= "INSERT into `user_reg` (user_name,user_email,user_contact,password,reg_datatime)
                           VALUES ('$name','$email','$phone','".md5($pass1)."','$curDate')";
                mysqli_query($con, "DELETE FROM `email_otp` WHERE `email` = '$email'");
                $result = mysqli_query($con, $query);
  
                //Result for registration
                if ($result) {
                   echo "<div class='form'>

                   <h3>You are registered successfully.</h3><br>

                   <p class='link'>Click here to <a href='../index.html'>Login</a></p>
                  </div>";
                } 
                else {
                  echo "<div class='form'>
                   <h3>Required fields are missing.</h3><br/>
                   <p class='link'>Click here to <a href='../index.html'>Please registration onace.</a> again.</p>
                   </div>";
                }
            }
        
    }
    //click on resend button 
    if(!empty($_POST["resend_otp"])) {
        
        mysqli_query($con, "DELETE FROM `email_otp` WHERE `email` = '$email'");
         // generate OTP
         $otp1 = rand(100000,999999);
         // Send OTP from mail
         $output = '';
 
         $output.='<p>OTP for ghar joda registration.</p>';
         //replace the site url
         $output.='OTP-'. $otp1 . '';
         $body = $output;
         $subject = "Email Varify";
         $email_to = $email;
 
         $mail = new PHPMailer();
 
         $mail->isSMTP();                                            //Send using SMTP
         $mail->Host       = 'testingbaba.com';                     //Set the SMTP server to send through
         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
         $mail->Username   = 'info@testingbaba.com';                     //SMTP username
         $mail->Password   = 'Testing@120';                             //SMTP password
         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
         $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
         $mail->IsHTML(true);
         $mail->From = "info@testingbaba.com";
         $mail->FromName = "Ghar Joda  - OTP Registration ";
 
 
         //Recipients
         // $mail->setFrom('info@testingbaba.com', 'Ghar Joda  - Forgot Password');
                             
 
         $mail->Subject = $subject;
         $mail->Body = $body;
         $mail->AddAddress($email_to);
         if (!$mail->Send()) { 
             echo "Mailer Error: " . $mail->ErrorInfo;
         } //if
         else{
            $_SESSION['otp']=$otp1;
            $otp=$_SESSION['otp'];
            echo "Check email for OTP sending....";
            //mysqli_query($con, "DELETE FROM `email_otp` WHERE `email` = '$email'");
            $otp_resend_query= "INSERT into `email_otp` (email,email_otp) VALUES ('$email','$otp')";
            $otp_resend_result = mysqli_query($con, $otp_resend_query);
            if ($otp_resend_result ) {
                echo "Check email for OTP";
            }
            else{
                echo "OTP sending faild!";
            }
         }


    }


    ?>

</body>
</html>