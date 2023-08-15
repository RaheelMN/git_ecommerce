<?php 

    header('Content-Type: application/json');
    
    session_start();
    
    if(isset($_SESSION['user_id'])){

        //Exception handling Settings
        require_once "../../include/error_handling.php";
        ini_set('error_log', "../../log/error_log.txt");                    

        //connecting with DB server
        require_once "../../include/config.php";
    
        // initialize output 
        $output =[];
        $output['error']=false;

        //retrieve user id from session
        $user_id = $_SESSION['user_id'];

        $sql = "SELECT count(order_status) as total FROM user_orders where user_id = $user_id AND order_status='Pending'";
        $result = mysqli_query($conn,$sql);
 
        $row = mysqli_fetch_assoc($result);
        $output['orders'] = $row['total'];

        //close db connection
        mysqli_close($conn); 
        
        //return output
        echo json_encode($output,JSON_PRETTY_PRINT);
      
    }else{
        //redirect user if he access page without login
        header("location:../../home.html");             
    }
?>