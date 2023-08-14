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
    $order_id = $data['order_id'];
    $output =[];
    $output['error']=false;

    //delete record in db
    $sql = "DELETE FROM user_orders WHERE  order_id = $order_id";
    $result = mysqli_query($conn,$sql) or die('Failed to preform query');  

    //close db connection
    mysqli_close($conn);

    //return output
    echo json_encode($output,JSON_PRETTY_PRINT); 
    exit(); 

}else{
    //    rediect host to login page
    header("location:http://localhost/ecommerce/admin/admin_login.php");
}


?>
