<?php
    session_start();
    // Destroy session
    if(session_destroy()) {
        // Redirecting To Home Page
        header("Location: http://localhost/ghar_joda/index.html");
    }
?>