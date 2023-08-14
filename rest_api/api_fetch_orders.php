<?php 

    header('content_type: application/json');
    header('Access-Control-Allow-Origin:*');
    //connecting with DB server
    include "../include/config.php";

    $output=[];
    $output['error']=false;

    session_start();
    if(isset($_SESSION['user_id'])){

        $user_id = $_SESSION['user_id'];
    
        //sql query to fetch user orders
        $sql = "SELECT order_id,invoice_number,total_products,amount_due,order_date,order_status FROM user_orders WHERE user_id = $user_id";
        $result = mysqli_query($conn,$sql) or die('Failed to fetch records from DB');
        if(mysqli_num_rows($result)>0){
            $output['records'] = mysqli_fetch_all($result,MYSQLI_ASSOC);
            echo json_encode($output,JSON_PRETTY_PRINT);
        }else{
           $output[]= array('message'=>"No record found", "error"=>true);
           echo json_encode($output,JSON_PRETTY_PRINT);
    
        } 
    }else{
        $output['error']=true;
        $output['message']="Session not set";
        mysqli_close($conn);
        echo json_encode($output,JSON_PRETTY_PRINT);
    }

?>