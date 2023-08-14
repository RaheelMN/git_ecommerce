<?php 

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Access-Control-Allow-Methods,Access-Control-Allow-Origin,Content-Type,Authorization,X-Requested-With');


    //connecting with DB server
    include "../include/config.php";

    //include verfication and validation functions
    include "../include/validate.php";

    $output =[];
    $output['error']=false;

    //start session
    session_start();
    
    if(isset($_SESSION['user_id'])){
        $ip_address = $_SESSION['ip_address']; //used in cart details
        $user_id = $_SESSION['user_id'];
        $invoice_number = mt_rand();
        $order_status = "Pending";

        $sql = "SELECT sum(total_cost) as amount_due, sum(quantity) as total_products from users as u inner join cart_detail c on u.ip_address = c.ip_address where user_id = $user_id";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);
            
        $sql = "INSERT INTO user_orders (user_id,amount_due,invoice_number,total_products,order_date,order_status)
                VALUES ($user_id,{$row['amount_due']},$invoice_number,{$row['total_products']},NOW(),'$order_status')";
                $result = mysqli_query($conn,$sql);    
                if($result){
                    //save invoice number
                    $_SESSION['invoice_number']=$invoice_number;

                    $sql = "SELECT product_id,quantity from users as u
                    inner join cart_detail as c 
                    on u.ip_address = c.ip_address
                    where user_id = $user_id";
                    $result = mysqli_query($conn,$sql) or die('Failed to perfom DB query');
            
                    if(mysqli_num_rows($result)>0){
                        $record = mysqli_fetch_all($result,MYSQLI_ASSOC);
                        foreach($record as $row){
                            $sql = "INSERT INTO orders_pending (user_id,invoice_number,product_id,quantity,order_status) 
                                    values ($user_id,$invoice_number,{$row['product_id']},{$row['quantity']},'$order_status')";
                                $result = mysqli_query($conn,$sql);    
                        }
    
                
                        //delete data from cart_details table
                        $sql = "DELETE FROM cart_detail where ip_address = '$ip_address' ";
                        $result = mysqli_query($conn,$sql);
            
                        $output['message']="order successfully added";  
                        mysqli_close($conn);    
                        echo json_encode($output,JSON_PRETTY_PRINT);  
                    }                  
                }else{
                    $output['error']=true;
                    $output['message']="failed to add order into db"; 
                    mysqli_close($conn);                            
                    echo json_encode($output,JSON_PRETTY_PRINT);                      
                }        
        }else{
            $output['error']=true;
            $output['message']="Cart is empty";   
            mysqli_close($conn);                 
            echo json_encode($output,JSON_PRETTY_PRINT);         
        }

    }else{
        $output['error']=true;
        $output['message']="user is not logged in";  
        mysqli_close($conn);          
        echo json_encode($output,JSON_PRETTY_PRINT);         

    }



?>