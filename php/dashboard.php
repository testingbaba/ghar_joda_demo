<?php

include "./auth_session.php";

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
        <h1>Hey <b><?php echo $_SESSION['username']; ?></b>!</h1>
        <h2>You are now user dashboard page.</h2>
        <h3><a href="logout.php">Logout</a></h3>
    </div>
</body>
</html>