<?php 

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin:*');

    //connecting with DB server
    include "../include/config.php";

    session_start();
    //delete session variables
    session_unset();
    //delete session
    session_destroy();
    echo "<br>sesson destroyed<br>";
?>