
<?php
 include "./auth_session.php"; 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>

   <?php
   require("./connection_db.php");

   if(isset($_POST['sing_in'])){
      extract($_POST);
      if( $email=="" || $pass=="" ){
         echo "Please Entered Field";
      }
      else{
         // echo $email."<br>";
         // echo $pass;
         $en_pass=md5($pass);
         
         $query="SELECT * FROM `user_reg` WHERE user_email='$email' AND password='$en_pass' ";
         $result=mysqli_query($con,$query);
         $num=mysqli_num_rows($result);
         $arr=mysqli_fetch_array($result);
         if($num==1){
            echo "login successfuly";
            $_SESSION['username']=$arr['user_name'];
            header('Location: ./dashboard.php');
         }
         else{
            echo "<div class='form'>
              <h3>no login successfuly.</h3><br/>
              <p class='link'>Click here to <a href='../index.html'>Login</a> again.</p>
              </div>";
         }
      }
   }

   ?>

</body>
</html>