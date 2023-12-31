<?php 

    header('Content-Type: application/json');

    //start session
    session_start();
    
    if(isset($_SESSION['user_id'])){

        //Exception handling Settings
        require_once "../../include/error_handling.php";          
        ini_set('error_log', "../../log/error_log.txt");  

        //connecting with DB server
       require_once "../../include/config.php";

        //Retrive requested information
        $data = json_decode(file_get_contents('php://input'),true);
        $order_id = $_SESSION['order_id'];
        $payment_type = $data['payment_mode'];

        //initialize output
        $output =[];
        $output['error']=false;
        $output['error_message']=[];
        $user_id = $_SESSION['user_id'];

        //sql query to fetch data from user order
        $sql = "SELECT invoice_number,amount_due FROM user_orders WHERE order_id = $order_id";
        $result = mysqli_query($conn,$sql);

        $row = mysqli_fetch_assoc($result);
        $invoice = $row['invoice_number'];
        $amount = $row['amount_due'];       //used in payment table

        //sql query to fetch product stock status with respect to user order
        $sql = "SELECT p_title, quantity,stock FROM orders_details AS o 
        INNER JOIN products AS p ON o.product_id = p.p_id
        INNER JOIN inventory AS i ON o.product_id = i.product_id
        WHERE user_id = $user_id AND invoice_number = $invoice";     
         
        $result = mysqli_query($conn,$sql);
        $records = mysqli_fetch_all($result,MYSQLI_ASSOC);

        //check if stock is low with respect to user order
        foreach($records as $key=>$value){

            if($value['quantity'] > $value['stock']){
                $output['error']=true;
                 unset($value['stock']);
                 $value['stock_message']="Product's stock is low";
                $output['data'][$key]= $value;
            }else{
                unset($value['stock']);
                $value['stock_message']="Product's stock is normal";
                $output['data'][$key]= $value;
            }

        }

        //if stock is low then 
        if($output['error']){

            //sql query to cencel user order in user_orders table
            $sql = "UPDATE user_orders SET order_status = 'Canceled' WHERE order_id = $order_id ";
            $result = mysqli_query($conn,$sql);

            //sql query to cencel user order in orders_details table
            $sql = "UPDATE  orders_details SET order_status = 'Canceled' WHERE invoice_number = $invoice 
            AND user_id = $user_id";
            $result = mysqli_query($conn,$sql); 
            
            //close db connection
            mysqli_close($conn);

            //return output
            $output['invoice']=$invoice;
            echo json_encode($output,JSON_PRETTY_PRINT);
            exit();
        }else{
            unset($output);
            $output['error']=false;
        }


        //Insert order record in user payments table
        $sql = "INSERT INTO user_payments (order_id,invoice_no,amount,payment_mode,`date`)
        VALUES ($order_id,$invoice,$amount,$payment_type,NOW())";  
        $result = mysqli_query($conn,$sql); 
            
        //Update user orders table
        $sql = "UPDATE user_orders  SET order_status='Complete' where order_id = $order_id";        
        $result = mysqli_query($conn,$sql); 
 
        
        //Update user orders details table and inventory table
        //Retriving rows of same invoice number in pending order table
        $sql = "SELECT order_id,product_id,quantity FROM orders_details WHERE invoice_number = $invoice ";        
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)>0){

            $records = mysqli_fetch_all($result,MYSQLI_ASSOC);

            foreach($records as $value){
                //Update order_status for each order id
                $sql = "UPDATE orders_details SET order_status='complete' where order_id={$value['order_id']}";
                $result =mysqli_query($conn,$sql);

                //Update inventory
                $sql = "UPDATE inventory SET `status` = CASE WHEN (stock -  {$value['quantity']}) <= 0 THEN
                            'Unavailable' ELSE  'Available' END, 
                            stock = (stock -  {$value['quantity']}), purchased = (purchased +  {$value['quantity']})
                 WHERE product_Id = {$value['product_id']}";
                $result =mysqli_query($conn,$sql);
            }
        }  
        
        //close db connection
        mysqli_close($conn); 
        
        //return output
        echo json_encode($output,JSON_PRETTY_PRINT);                 


    }else{
        //redirect user if he access page without login
        header("location:../../home.html");        
    }

?>