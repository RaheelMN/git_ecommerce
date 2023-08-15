<?php 


    //start session
    session_start();

    
    if(isset($_SESSION['user_id'])){
        //Exception handling Settings
        require_once "../../include/error_handling.php";   
        ini_set('error_log', "../../log/error_log.txt");             

        //connecting with DB server
        require_once "../../include/config.php";

        //include verfication and validation functions
        require_once "../../include/validate.php";

        //retrieving ip address
        require_once "../../include/get_ip_address.php";

        //retrieve user ip address
        $ip_address = get_ip_address(); //used in deleting order from cart table
        
        $user_id = $_SESSION['user_id'];
        $invoice_number = mt_rand();
        $order_status = "Pending";

        $sql = "SELECT sum(total_cost) as amount_due, sum(quantity) as total_products from users as u inner join cart_detail c on u.ip_address = c.ip_address where user_id = $user_id";
        $result = mysqli_query($conn,$sql);

        $row = mysqli_fetch_assoc($result);
            
        $sql = "INSERT INTO user_orders (user_id,amount_due,invoice_number,total_products,order_date,order_status)
                VALUES ($user_id,{$row['amount_due']},$invoice_number,{$row['total_products']},NOW(),'$order_status')";

        $result = mysqli_query($conn,$sql);    

        //save invoice number
        $_SESSION['invoice_number']=$invoice_number;

        $sql = "SELECT product_id,quantity from users as u
        inner join cart_detail as c 
        on u.ip_address = c.ip_address
        where user_id = $user_id";
        $result = mysqli_query($conn,$sql);
        
        if(mysqli_num_rows($result)>0){
            $record = mysqli_fetch_all($result,MYSQLI_ASSOC);
            foreach($record as $row){
                $sql = "INSERT INTO orders_details (user_id,invoice_number,product_id,quantity,order_status) 
                        values ($user_id,$invoice_number,{$row['product_id']},{$row['quantity']},'$order_status')";

                $result = mysqli_query($conn,$sql);   
            }
        
            //delete data from cart_details table
            $sql = "DELETE FROM cart_detail where ip_address = '$ip_address' ";
            $result = mysqli_query($conn,$sql);
 
            mysqli_close($conn);     
        }                  

    }else{
        //redirect user if he access page without login
        header("location:../../home.html");        
    }



?>