<?php 

    //Exception handling Settings
    require_once "../include/error_handling.php";
    
   //Authenticate the host
   session_start();

   //check if host not authorize to access page
   if(!isset($_SESSION['admin_role'])){

    //rediect host to login page
       header("location:./admin_login.html");
   }
    
    //destroy browser cookie
    setcookie(session_name(), "", time() - (60*60*24*30),"/");

    //delete session variables
    session_unset();

    //delete session
    session_destroy();            

?>