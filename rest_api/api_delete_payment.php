<?php 

header('Content-Type: application/json');

session_start();
    
if(isset($_SESSION['admin_role'])){    

    //connecting with DB server
    require_once "../include/config.php";
    
    $data = json_decode(file_get_contents("php://input"),true);
    $p_id = $data['p_id'];
    $output =[];
    $output['error']=false;

    //delete record in db
    $sql = "DELETE FROM user_payments WHERE  payment_id = $p_id";
    $result = mysqli_query($conn,$sql) or die('Failed to preform query');  

    //close db connection
    mysqli_close($conn);

    //return output
    echo json_encode($output,JSON_PRETTY_PRINT); 
    exit(); 

}else{
    //    rediect host to login page
    header("location:../admin/admin_login.php");
}


?>