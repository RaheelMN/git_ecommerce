<?php 

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin:*');

    
    session_start();
    
    if(isset($_SESSION['user_id'])){ 

        //connecting with DB server
        include "../../include/config.php";        

        $output =[];
        $output['error']=false;
        
        $user_id = $_SESSION['user_id'];

        //delete account from db
        $sql = "DELETE FROM users where user_id = $user_id";
        $result = mysqli_query($conn,$sql) or die('Failed to perform DB query');
        
        //destroy browser cookie
        setcookie(session_name(), "", time() - (60*60*24*30),"/");

        //delete session variables
        session_unset();

        //delete session
        session_destroy();

        //close db connection
        mysqli_close($conn);
        
        echo json_encode($output,JSON_PRETTY_PRINT);

    }else{
        //redirect user if he access page without login
        header("location:http://localhost/ecommerce/index.html");                
    }

?>