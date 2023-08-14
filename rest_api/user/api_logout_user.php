<?php 

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin:*');

    
    session_start();
    
    if(isset($_SESSION['user_id'])){    
        
        //destroy browser cookie
        setcookie(session_name(), "", time() - (60*60*24*30),"/");

        //delete session variables
        session_unset();

        //delete session
        session_destroy();

    }else{
        //redirect user if he access page without login
        header("location:http://localhost/ecommerce/index.html");                
    }

?>