<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
include("../database/conn_db.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Ghar Joda</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="form">
        
        <p>Hey, <?php echo $_SESSION['email']; ?>!</p>

        <p>You are now user dashboard page.</p>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>