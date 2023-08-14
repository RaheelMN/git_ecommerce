<?php 

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin:*');

    //connecting with DB server
    include "../include/config.php";

    session_start();
    // $params = session_get_cookie_params();
    setcookie(session_name(), "", time() - (60*60*24*30),"/");    
    //delete session variables
    session_unset();
    //delete session
    session_destroy();
    echo "<br>sesson destroyed<br>";

?>