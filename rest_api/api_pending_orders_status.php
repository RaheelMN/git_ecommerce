<?php 

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin:*');
 
    //connecting with DB server
    include "../include/config.php";

    session_start();

    $output =[];
    $output['error']=false;

    if(isset($_SESSION['user_id'])){

        $user_id = $_SESSION['user_id'];

        $sql = "SELECT count(order_status) as total FROM user_orders where user_id = $user_id AND order_status='Pending'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $output['orders'] = $row['total'];
        echo json_encode($output,JSON_PRETTY_PRINT);
      
    }
?>