<?php 

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin:*');
        
    session_start();
    
    if(isset($_SESSION['user_id'])){

        //connecting with DB server
       require_once "../../include/config.php";

        $output=[];
        $output['error']=false;

        $user_id = $_SESSION['user_id'];
    
        //sql query to fetch user orders
        $sql = "SELECT order_id,invoice_number,total_products,amount_due,order_date,order_status FROM user_orders WHERE user_id = $user_id";
        $result = mysqli_query($conn,$sql) or die('Failed to fetch records from DB');
        
        if(mysqli_num_rows($result)>0){
            $output['records'] = mysqli_fetch_all($result,MYSQLI_ASSOC);

            //close db connection
            mysqli_close($conn);
            echo json_encode($output,JSON_PRETTY_PRINT);
        }else{
           $output['message']= "You have no orders";
           $output['error'] =true;

            //close db connection
            mysqli_close($conn);          
           echo json_encode($output,JSON_PRETTY_PRINT);
    
        } 
    }else{
        //redirect user if he access page without login
        header("location:../../index.html"); 
    }

?>