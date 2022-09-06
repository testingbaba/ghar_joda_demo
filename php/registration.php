<?php 
 require('./auth_session.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration | Ghar Joda</title>
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
   require('./connection_db.php');

   //Get Request from the Registration Page
//    extract($_REQUEST);
//    $name=$_POST["name"];
//    $email=$_POST["email"];
//    $phone=$_POST["phone"];
//    $pass1=$_POST["pass1"];
//    $pass2=$_POST["pass2"];
//    $curDate = date("Y-m-d H:i:s");

   // security function
   function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

   // died function invoked explicitly when error comes
//    function died($error) {
//       echo "We are very sorry From Ghar Joda, but there were error(s) found with the form you submitted. ";
//       echo "These errors appear below.<br /><br />";
//       echo $error . "<br /><br />";
//       echo "Please go back and filup properly.<br /><br />";
//       die();
//     }

    if(isset($_POST['user_reg'])){
        extract($_POST);
        if($name!="" && $email!="" && $phone!="" && $pass1!="" && $pass2!=""){
            if($pass1 == $pass2){

                $name=test_input($name);
                $email=test_input($email);
                $phone=test_input($phone);
                $pass1=test_input($pass1);
                $curDate = date("Y-m-d H:i:s");

                $query= "INSERT into `user_reg` (user_name,user_email,user_contact,password, reg_datatime) VALUES ('$name', '$email','$phone', '" . md5($pass1) . "', '$curDate')";

                $result = mysqli_query($con, $query);

                if ($result) {
                    echo "<div class='form'>
                          <h3>You are registered successfully.</h3><br/>
                          <p class='link'>Click here to <a href='../index.html'>Login</a></p>
                          </div>";
                } else {
                    echo "<div class='form'>
                          <h3>Required fields are missing.</h3><br/>
                          <p class='link'>Click here to <a href='../index.html'>registration</a> again.</p>
                          </div>";
                }
            }
            else{
                ?>
                <script>
                alert("Not match Password");
                window.location.href="../index.html"
                </script>
                <?php
            }
        }
        else{
            ?>
            <script>
            alert("Not complate field of form ");
            window.location.href="../index.html"
            </script>
            <?php
        }
    }

?>

</body>
</html>