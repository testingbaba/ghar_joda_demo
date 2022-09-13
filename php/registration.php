
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

    if(isset($_POST['email'])){  //1
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
        // $mail->setFrom('kinshuk.maity@testingbaba.com', 'Ghar Joda  - Forgot Password');
                            

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
?>
                
		        <!-- <h1>Check your email for the OTP</h1> -->
                <!-- <form action='otp_email.php' method="POST">
                    
                  <div class="tableheader">Enter OTP :</div>
                  
			
		          <div class="tablerow">
                    
			        <input type="number" id="send_otp" name="send_otp" placeholder="One Time Password" class="login-input" required>
		          </div>
		          <div class="tableheader"><input type="submit" name="submit_otp" value="Submit" class="btn"></div>
                  <a href="#" class="btn">Resend OTP</a>
                </form> -->
<?php   
                           
            }  //if
            else{ 
                echo "Mail not send";
                //header("Location: http://localhost/ghar_joda/index.html");
            } //else
        }// else
    }
    // if(!empty($_POST["submit_otp"])) {
    //     $check_otp=$_POST["otp"];
    //     if($check_otp!=$otp){
    //         echo "Invalid OTP";
    //             mysqli_query($con, "DELETE FROM `email_otp` WHERE `email` = '$email'");
    //         }
    //         else{
    //             $query= "INSERT into `user_reg` (user_name,user_email,user_contact,password,reg_datatime)
    //                       VALUES ('$name','$email','$phone','".md5($pass1)."','$curDate')";
    //             mysqli_query($con, "DELETE FROM `email_otp` WHERE `email` = '$email'");
    //             $result = mysqli_query($con, $query);
  
    //             //Result for registration
    //             if ($result) {
    //                echo "<div class='form'>

    //                <h3>You are registered successfully.</h3><br>

    //                <p class='link'>Click here to <a href='../index.html'>Login</a></p>
    //               </div>";
    //             } 
    //             else {
    //               echo "<div class='form'>
    //                <h3>Required fields are missing.</h3><br/>
    //                <p class='link'>Click here to <a href='../index.html'>Please registration onace.</a> again.</p>
    //                </div>";
    //             }
    //         }
        
    // }
   
  


    //Name validation
    // $string_exp = "^(?:((([^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]'’,\-.\s])){1,}(['’,\-\.]){0,1}){2,}(([^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]'’,\-. ]))*(([ ]+){0,1}(((([^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]'’,\-\.\s])){1,})(['’\-,\.]){0,1}){2,}((([^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]'’,\-\.\s])){2,})?)*)$";
    // if (!preg_match($string_exp, $name)) {
    //     $error_message .= 'The First Name you entered does not appear to be valid.<br />';
    // }

    //Email Validation
    // $email_exp = "(?![_.-])((?![_.-][_.-])[a-zA-Z\d_.-]){0,63}[a-zA-Z\d]@((?!-)((?!--)[a-zA-Z\d-]){0,63}[a-zA-Z\d]\.){1,2}([a-zA-Z]{2,14}\.)?[a-zA-Z]{2,14}";
    // if (!preg_match($email_exp, $email)) {
    //     $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
    // }

    //Contact Validation
    // $phone_exp="^[1-9]\d{9}$";
    // if(!preg_match($phone_exp,$phone)){
    //     $error_message .= "The Contact number you entered does not appear to be valid.<br />";
    // }
    
    //Password Validation
    // $password_exp="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})";
    // if(!preg_match($password_exp,$pass1)){
    //     $error_message .= " The Password must be a minimum of 8 characters including number, Upper, Lower And one special character.<br />";
    // }


    // When form submitted, insert values into the database.
    // $query= "INSERT into `user_reg` (user_name,user_email,user_contact,password,reg_datatime)
    //                  VALUES ('$name','$email','$phone','".md5($pass1)."','$curDate')";
    // $result = mysqli_query($con, $query);
  
    //Result for registration
    // if ($result) {
    //     echo "<div class='form'>

    //           <h3>You are registered successfully.</h3><br>

    //           <p class='link'>Click here to <a href='../index.html'>Login</a></p>
    //           </div>";
    // } 
    // else {
    //     echo "<div class='form'>
    //           <h3>Required fields are missing.</h3><br/>
    //           <p class='link'>Click here to <a href='../index.html'>Please registration onace.</a> again.</p>
    //           </div>";
    // }


?>

</body>
</html>