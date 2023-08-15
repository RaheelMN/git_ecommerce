<?php 

    header('Content-Type: application/json');
    
    session_start();  
    
    if(isset($_SESSION['user_id'])){ 

        //Exception handling Settings
        require_once "../../include/error_handling.php";
        ini_set('error_log', "../../log/error_log.txt");                    
        
        $output = [];
        $output['error']=false;
        
        //destroy browser cookie
        setcookie(session_name(), "", time() - (60*60*24*30),"/");

        //delete session variables
        session_unset();

        //delete session
        session_destroy();

        echo json_encode($output, JSON_PRETTY_PRINT);

    }else{
        //redirect user if he access page without login
        header("location:../../home.html");                
    }

?>