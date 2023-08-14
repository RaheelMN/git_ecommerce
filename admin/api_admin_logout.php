<?php 

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin:*');

    
    session_start();
    
    if(isset($_SESSION['admin_role'])){    
        
        //destroy browser cookie
        setcookie(session_name(), "", time() - (60*60*24*30),"/");

        //delete session variables
        session_unset();

        //delete session
        session_destroy();

    }

    //redirect user if he access page without login
    header("location:http://localhost/ecommerce/admin/admin_login.php");                

?>