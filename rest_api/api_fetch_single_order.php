<?php 

    header('content_type: application/json');
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Access-Control-Allow-Methods,Access-Control-Allow-Origin,Content-Type,Authorization,X-Requested-With');


    //connecting with DB server
    include "../include/config.php";

    $data = json_decode(file_get_contents("php://input"),true);
    $order_id = $data['order_id'];
    $output=[];
    $output['error']=false;

    session_start();
    if(isset($_SESSION['user_id'])){
   
        //sql query to fetch user orders
        $sql = "SELECT order_id,invoice_number,amount_due FROM user_orders WHERE order_id = $order_id";
        $result = mysqli_query($conn,$sql) or die('Failed to fetch records from DB');
        if(mysqli_num_rows($result)>0){
            $output['record'] = mysqli_fetch_assoc($result);
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