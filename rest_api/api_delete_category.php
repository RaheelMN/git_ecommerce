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

    //retrieve variable values
    $category_id = $data['category_id'];
    
    //initialize variables
    $output =[];
    $output['error']=false;
 
    //Check if category is in use in cart details table 
    //or in orders details table where order status is pending
    $sql = "call check_delete_category($category_id)";
    $result=mysqli_query($conn,$sql) or die('Failed to perform query');
    $row = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_next_result($conn);

    //if category exits then
    if($row['output']){
        $output['error']=true;

        //close db connection
        mysqli_close($conn);

        // return $output 
        echo json_encode($output,JSON_PRETTY_PRINT);

        exit();
    }else{
    
        $sql = "DELETE FROM categories WHERE c_id = $category_id";
        $result2=mysqli_query($conn,$sql) or die('Failed to perform query');
    
        $output['message']='Category successfully deleted.';

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
