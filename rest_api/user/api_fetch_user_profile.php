<?php 

    header('Content-Type: application/json');

    session_start();

    if(isset($_SESSION['user_id'])){  

        //Exception handling Settings
        require_once "../../include/error_handling.php"; 
        ini_set('error_log', "../../log/error_log.txt");                   
        
        //connecting with DB server
        require_once "../../include/config.php";

        $output=[];      
        $user_id = $_SESSION['user_id'];

        //sql query to fetch user record
        $sql = "SELECT user_name,user_email,user_address,user_contact FROM users WHERE user_id = $user_id";
        $result = mysqli_query($conn,$sql);

        //store record in output
        $output['record'] = mysqli_fetch_assoc($result);

        //close db connection
        mysqli_close($conn);             
        echo json_encode($output,JSON_PRETTY_PRINT);
 
    }
    else{

        //redirect user if he access page without login
        header("location:../../home.html");        
    }    
?>