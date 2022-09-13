
<?php
use PHPMailer\PHPMailer\PHPMailer;
?>
<html>
    <head>
        <title>Password Recovery using PHP and MySQL</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    </head>
    <body>

    <div class="container">
                <div class="d-flex justify-content-center align-items-center" style="height:100vh; width:100%;">
                <div class="forget-form py-4 px-5 bg-light rounded shadow border">

                    <?php
                    include('../database/conn_db.php');
                    
                    if (isset($_POST["email"]) && (!empty($_POST["email"]))) {
                        $email = $_POST["email"];
                        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
                        if (!$email) {
                            $error .="<p class='text-danger my-3'>Invalid email address</p>";
                        } else {
                            $sel_query = "SELECT * FROM `user_reg` WHERE user_email='" . $email . "'";
                            $results = mysqli_query($con, $sel_query);
                            $row = mysqli_num_rows($results);
                            if ($row == "") {
                                $error .= "<p class='text-danger my-3'>User Not Found</p>";
                            }
                        }
                        if ($error != "") {
                            echo $error;
                        } 
                        else {

                            $output = '';

                            $expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y"));
                            $expDate = date("Y-m-d H:i:s", $expFormat);
                            $key = md5(time());
                            $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
                            $key = $key . $addKey;
                            // Insert Temp Table
                            mysqli_query($con, "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES ('" . $email . "', '" . $key . "', '" . $expDate . "');");


                            $output.='<p>Please click on the following link to reset your password.</p>';
                            //replace the site url
                            $output.='<p><a href="http://localhost/all_project_here/ghar_joda/php/reset_password.php?key=' . $key . '&email=' . $email . '&action=reset" target="_blank">http://localhost/all_project_here/ghar_joda/php/reset_password.php?key=' . $key . '&email=' . $email . '&action=reset</a></p>';
                            $body = $output;
                            $subject = "Password Recovery";

                            $email_to = $email;


                            //autoload the PHPMailer
                            //require("vendor/autoload.php");
                            require('PHPMailer/Exception.php');
                            require('PHPMailer/SMTP.php');
                            require('PHPMailer/PHPMailer.php');
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
                            $mail->FromName = "Ghar Joda  - Forgot Password ";


                            //Recipients
                           // $mail->setFrom('kinshuk.maity@testingbaba.com', 'Ghar Joda  - Forgot Password');
                            

                            $mail->Subject = $subject;
                            $mail->Body = $body;
                            $mail->AddAddress($email_to);
                            if (!$mail->Send()) {
                                echo "<p class='text-danger my-3'> Mailer Error: " . $mail->ErrorInfo."</p>";
                            } else {
                                echo "<p class='my-3'>An email has been sent<p>";
                                //header("Location: http://localhost/ghar_joda/index.html");
                            }
                        }
                    }
                    ?>


                    <!-- Forgot Password form section -->
                    <form method="post" action="" name="reset">
                        <h1 class="my-3">Forgot Password</h1>
                        <div class="form-group my-4">
                           <label class="my-2"><strong>Enter Your Email Address:</strong></label>
                            <input type="email" name="email" placeholder="username@email.com" class="form-control" required/>
                        </div>

                        <div class="form-group mt-4 d-flex justify-content-between">
                            <input type="submit" id="reset" value="Reset Password"  class="btn btn-primary"/>&nbsp;&nbsp;
                            <a href="../index.html" class="btn btn-primary">Log In</a>
                        </div>
                    </form>

                    </div>

                </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>