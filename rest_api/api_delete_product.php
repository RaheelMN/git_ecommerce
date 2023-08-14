<?php 

header('Content-Type: application/json');

function check_delete_product($product_id){
    global $conn;
    // Check if product is in use in cart details table

    $sql = "SELECT count(p_id) AS ans FROM products 
    INNER JOIN cart_detail ON p_id = product_id 
    WHERE p_id = $product_id";
    $result = mysqli_query($conn,$sql) or die('Failed to perform query');
    $row = mysqli_fetch_assoc($result);

    if ($row['ans'] > 0 ){
        return 1;
    }
    
    //  Check if product is in use in cart details table		
    $sql = "SELECT count(p_id) AS ans FROM products 
     INNER JOIN orders_details ON p_id = product_id
     WHERE p_id = $product_id  AND order_status = 'Pending'";
    $result = mysqli_query($conn,$sql) or die('Failed to perform query');
    $row = mysqli_fetch_assoc($result);
        return $row['ans'];
}

session_start();
    
if(isset($_SESSION['admin_role'])){ 

    //connecting with DB server
    require_once "../include/config.php";
    
    $data = json_decode(file_get_contents("php://input"),true);
    $product_id = $data['product_id'];
    $output =[];
    $output['error']=false;
 
    //Check if product is in use in cart details table 
    //or in orders details table where order status is pending
    $ans = check_delete_product($product_id);

    //if product exists in cart or order detail tables then
    if($ans){
        $output['error']=true;

        //close db connection
        mysqli_close($conn);

        // return $output 
        echo json_encode($output,JSON_PRETTY_PRINT);

        exit();
    }else{

        //delete product from product table
        $sql = "DELETE FROM products WHERE  p_id = $product_id";
        $result = mysqli_query($conn,$sql) or die('Failed to preform query'); 

        //delete product from inventory table
        $sql = "DELETE FROM inventory WHERE  product_id = $product_id";
        $result = mysqli_query($conn,$sql) or die('Failed to preform query');        

        //close db connection
        mysqli_close($conn);

        //return output
        echo json_encode($output,JSON_PRETTY_PRINT); 
        exit(); 
    }
}else{
    //    rediect host to login page
    header("location:../admin/admin_login.php");
}


?>
