<?php 

header('Content-Type: application/json');


function check_delete_brand($brand_id){
    global $conn;

    // check if brand is in products table
    $sql = "SELECT count(p_id) AS ans FROM brands 
    INNER JOIN products ON b_id = brand_id 
    WHERE b_id = $brand_id";
    $result = mysqli_query($conn,$sql) or die('Failed to perform query');
    $row = mysqli_fetch_assoc($result);

    if ($row['ans'] > 0 ){
        return 1;
    }    
   
    // Check if brand is in use in cart details table
    $sql = "SELECT count(b_id) AS ans FROM products 
    INNER JOIN  brands ON brand_id = b_id
    INNER JOIN cart_detail ON p_id = product_id 
    WHERE b_id = $brand_id";
    $result = mysqli_query($conn,$sql) or die('Failed to perform query');
    $row = mysqli_fetch_assoc($result);

    if ($row['ans'] > 0 ){
        return 1;
    }
   
    //  Check if brand is in use in order details table		
    $sql = "SELECT count(b_id) AS ans FROM products 
    INNER JOIN  brands ON brand_id = b_id
    INNER JOIN orders_details ON p_id = product_id
     WHERE b_id = $brand_id  AND order_status = 'Pending'";
    $result = mysqli_query($conn,$sql) or die('Failed to perform query');
    $row = mysqli_fetch_assoc($result);
        return $row['ans'];
}


session_start();
    
if(isset($_SESSION['admin_role'])){    

    //connecting with DB server
    require_once "../include/config.php";

    $data = json_decode(file_get_contents("php://input"),true);

    //retrieve variable values
    $brand_id = $data['brand_id'];
    
    //initialize variables
    $output =[];
    $output['error']=false;
 
    //Check if brand is in use in cart details table 
    //or in orders details table where order status is pending
    $ans = check_delete_brand($brand_id);

    //if brand exits then
    if($ans){
        $output['error']=true;

        //close db connection
        mysqli_close($conn);

        // return $output 
        echo json_encode($output,JSON_PRETTY_PRINT);

        exit();
    }else{
    
        $sql = "DELETE FROM brands WHERE b_id = $brand_id";
        $result2=mysqli_query($conn,$sql) or die('Failed to perform query');
    
        $output['message']='Brand successfully deleted.';

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
