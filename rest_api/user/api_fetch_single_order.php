<?php 

    header('Content-Type: application/json');
  
    session_start();

    if(isset($_SESSION['user_id'])){

        //connecting with DB server
        require_once "../../include/config.php";

        //retreive requested data
        $data = json_decode(file_get_contents("php://input"),true);
        $order_id = $data['order_id'];

        //initialize output
        $output=[];
        $output['error']=false;
   
        //sql query to fetch user orders
        $sql = "SELECT order_id,invoice_number,amount_due FROM user_orders WHERE order_id = $order_id";
        $result = mysqli_query($conn,$sql) or die('Failed to fetch records from DB');

        $output['record'] = mysqli_fetch_assoc($result);
        $_SESSION['order_id']=$output['record']['order_id'];

        //close db connection
        mysqli_close($conn);

        // return output 
        echo json_encode($output,JSON_PRETTY_PRINT);

    }else{
        //redirect user if he access page without login
        header("location:../../index.html"); 
    }

?>