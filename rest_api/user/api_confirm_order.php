<?php 

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Access-Control-Allow-Methods,Access-Control-Allow-Origin,Content-Type,Authorization,X-Requested-With');

    //start session
    session_start();
    
    if(isset($_SESSION['user_id'])){

        //connecting with DB server
        include "../../include/config.php";

        //Retrive requested information
        $data = json_decode(file_get_contents('php://input'),true);
        // $order_id = $data['order_id'];
        $order_id = $_SESSION['order_id'];
        $payment_type = $data['payment_mode'];

        $output =[];
        $output['error']=false;
 

        //sql query to fetch user orders
        $sql = "SELECT invoice_number,amount_due FROM user_orders WHERE order_id = $order_id";
        $result = mysqli_query($conn,$sql) or die('Failed to perform DB query');

        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);
            $invoice = $row['invoice_number'];
            $amount = $row['amount_due'];

            //Insert order record in user payments table
            $sql = "INSERT INTO user_payments (order_id,invoice_no,amount,payment_mode,`date`)
            VALUES ($order_id,$invoice,$amount,$payment_type,NOW())";  
            $result = mysqli_query($conn,$sql) or die('Failed to perform DB query'); 
            
            //Update user orders table
            $sql = "UPDATE user_orders  SET order_status='Complete' where order_id = $order_id";        
            $result = mysqli_query($conn,$sql) or die('Failed to perform DB query'); 

            //Update user pending orders table
            //Retriving rows of same invoice number in pending order table
            $sql = "SELECT order_id FROM orders_details WHERE invoice_number = $invoice ";        
            $result = mysqli_query($conn,$sql) or die('Failed to perform DB query');

            if(mysqli_num_rows($result)>0){

                $records = mysqli_fetch_all($result,MYSQLI_ASSOC);

                foreach($records as $value){
                    //Update order_status for each order id
                    $sql = "UPDATE orders_details SET order_status='complete' where order_id={$value['order_id']}";
                    $result =mysqli_query($conn,$sql) or die("Failed to perform query");
                }
            }


            mysqli_close($conn);                 
            echo json_encode($output,JSON_PRETTY_PRINT);                 

        }else{
            $output['error']=true;
            $output['message']="order doesnot exist";   
            mysqli_close($conn);                 
            echo json_encode($output,JSON_PRETTY_PRINT);         
        }

    }else{
        //redirect user if he access page without login
        header("location:http://localhost/ecommerce/index.html");        
    }



?>