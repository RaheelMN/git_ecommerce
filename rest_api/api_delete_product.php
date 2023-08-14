<?php 

header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Access-Control-Allow-Methods,Access-Control-Allow-Origin,Content-Type,Authorization,X-Requested-With');

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
    $sql = "call check_delete_product($product_id)";
    $result=mysqli_query($conn,$sql) or die('Failed to perform query');
    $row = mysqli_fetch_assoc($result);

    //clear result buffer
    mysqli_free_result($result);

    //prepare buffer for next result
    mysqli_next_result($conn);

    //if product exists in cart or order detail tables then
    if($row['output']){
        $output['error']=true;

        //close db connection
        mysqli_close($conn);

        // return $output 
        echo json_encode($output,JSON_PRETTY_PRINT);

        exit();
    }else{

        //delete record in db
        $sql = "DELETE FROM products WHERE  p_id = $product_id";
        $result = mysqli_query($conn,$sql) or die('Failed to preform query');  

        //close db connection
        mysqli_close($conn);

        //return output
        echo json_encode($output,JSON_PRETTY_PRINT); 
        exit(); 
    }
}else{
    //    rediect host to login page
    header("location:http://localhost/ecommerce/admin/admin_login.php");
}


?>
