<html>
    <head>
        <title>Reset Password</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    </head>

    <style>
        .message-box {
            position: fixed;
            top: 100px;
            right: 10px;
            padding: 10px 15px;
            border-radius: 5px;
            z-index: 100;
        }
    </style>

    <body>

    <div class="outer-form-div d-flex justify-content-center align-items-center" style="height:100vh;">
    <div class="inner-form-div py-4 px-5 bg-light rounded-4 shadow border" >
<?php
    include('../database/conn_db.php');
    if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"] == "reset") && !isset($_POST["action"])) {
        $key = $_GET["key"];
        $email = $_GET["email"];
        $curDate = date("Y-m-d H:i:s");
        $query = mysqli_query($con, "SELECT * FROM `password_reset_temp` WHERE `key`='" . $key . "' and `email`='" . $email . "';");
        $row = mysqli_num_rows($query);
        if ($row == "") {
            $error .= '<h2 class="my-3 text-danger">Invalid Link</h2>';
        } else {
            $row = mysqli_fetch_assoc($query);
            $expDate = $row['expDate'];
            if ($expDate >= $curDate) {
                ?> 
                
    <h1 class="my-3">Reset Password</h1>   
    <form method="post" action="">

        <input type="hidden" name="action" value="update" class="form-control"/>

        <div class="form-group">
            <label class="mt-3"><strong>Enter New Password:</strong></label>
            <input type="password"  name="pass1"  class="form-control" required/>
        </div>

        <div class="form-group">
            <label class="mt-3"><strong>Re-Enter New Password:</strong></label>
            <input type="password"  name="pass2" class="form-control" required/>
        </div>

        <input type="hidden" name="email" value="<?php echo $email; ?>"/>

        <div class="form-group">
            <input type="submit" id="reset" value="Reset Password"  class="btn btn-primary my-4"/>
        </div>

        </form>
    
                <?php
            } else {
                $error .= "<h2 class='my-3 text-danger'>Link Expired</h2>";
            }
        }
        if ($error != "") {
            echo "<div class='my-3 text-danger'>" . $error . "</div>";
        }
    }


    if (isset($_POST["email"]) && isset($_POST["action"]) ) {
    // if (isset($_POST["email"]) ) {
        $error = "";
        $pass1 = mysqli_real_escape_string($con, $_POST["pass1"]);
        $pass2 = mysqli_real_escape_string($con, $_POST["pass2"]);
        // $pass1= $_POST['pass1'];
        // $pass2= $_POST['pass2'];
        $email = $_POST["email"];
        //echo "$email";
        $curDate = date("Y-m-d H:i:s");
        if ($pass1 != $pass2) {
            $error .= "<p class='text-danger my-3'>Password do not match, both password should be same.</p>";
        }
        if ($error != "") {
            echo $error;
        } else {
            $pass1 = md5($pass1);
            
            $queryfinal= mysqli_query($con, "UPDATE `user_reg` SET `password` = '" . $pass1 . "' WHERE `user_email` = '" . $email . "'");
            mysqli_query($con, "DELETE FROM `password_reset_temp` WHERE `email` = '$email'");
            //echo $email."Email Id";
            //$result = mysqli_query($con, $queryfinal);
            //$rows = mysqli_num_rows($result);
            
            // if ($rows == "") 
            //    echo "Faild !";
            // else{                              
                echo '<div class="my-3"><p>Con;gratulations! Your password has been updated successfully .</p>';
            //  }
        }
    }
?>
</div>
</div>
<!-- <div class="message-box text-light bg-secondary">
        <p class="m-0">
            Lorem ipsum dolor sit amet
        </p>
</div> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>