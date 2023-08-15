<?php 

header('Content-Type: application/json');

function check_delete_category($category_id){
    global $conn;

    // check if category is in products table
    $sql = "SELECT count(p_id) AS ans FROM categories 
    INNER JOIN products ON c_id = category_id 
    WHERE c_id = $category_id";
    $result = mysqli_query($conn,$sql) or die('Failed to perform query');
    $row = mysqli_fetch_assoc($result);

    if ($row['ans'] > 0 ){
        return 1;
    }    
   
    // Check if category is in use in cart details table
    $sql = "SELECT count(c_id) AS ans FROM products 
    INNER JOIN  categories ON category_id = c_id
    INNER JOIN cart_detail ON p_id = product_id 
    WHERE c_id = $category_id";
    $result = mysqli_query($conn,$sql) or die('Failed to perform query');
    $row = mysqli_fetch_assoc($result);

    if ($row['ans'] > 0 ){
        return 1;
    }
   
    //  Check if category is in use in order details table		
    $sql = "SELECT count(c_id) AS ans FROM products 
    INNER JOIN  categories ON category_id = c_id
    INNER JOIN orders_details ON p_id = product_id
     WHERE c_id = $category_id  AND order_status = 'Pending'";
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
    $category_id = $data['category_id'];
    
    //initialize variables
    $output =[];
    $output['error']=false;
 
    //Check if category is in use in cart details table 
    //or in orders details table where order status is pending
    $ans = check_delete_category($category_id);

    //if category exits then
    if($ans){
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
    header("location:../admin/admin_login.html");
}


?>
