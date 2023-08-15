<?php 
    
    session_start();
    
    if(isset($_SESSION['user_id'])){ 

        //Exception handling Settings
        require_once "../../include/error_handling.php";   
        ini_set('error_log', "../../log/error_log.txt");                 

        //connecting with DB server
       require_once "../../include/config.php";        
    
        //retreive user id from session
        $user_id = $_SESSION['user_id'];

        //delete account from db
        $sql = "DELETE FROM users where user_id = $user_id";
        $result = mysqli_query($conn,$sql);
        
        //destroy browser cookie
        setcookie(session_name(), "", time() - (60*60*24*30),"/");

        //delete session variables
        session_unset();

        //delete session
        session_destroy();

        //close db connection
        mysqli_close($conn);

    }else{
        //redirect user if he access page without login
        header("location:../../home.html");                
    }

?>