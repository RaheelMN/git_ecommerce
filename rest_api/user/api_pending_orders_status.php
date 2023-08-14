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

        $sql = "SELECT count(order_status) as total FROM user_orders where user_id = $user_id AND order_status='Pending'";
        $result = mysqli_query($conn,$sql)or die('Failed to perfom DB query');
 
        $row = mysqli_fetch_assoc($result);
        $output['orders'] = $row['total'];

        //close db connection
        mysqli_close($conn); 
        
        //return output
        echo json_encode($output,JSON_PRETTY_PRINT);
      
    }else{
        //redirect user if he access page without login
        header("location:http://localhost/ecommerce/index.html");             
    }
?>