<?php 

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods:POST');
    
    //connecting with DB server
    include "../include/config.php";


    $data = json_decode(file_get_contents("php://input"),true);
    $product_id = $data['product_id'];

    //sql query to fetch all records
    $sql = "SELECT p.p_id,p.p_title, p.p_description, c.c_name as category,b.b_name as brand, p.p_image1,p.p_image2, p.p_image3, p.p_price, p.status as stock FROM products p join categories c on p.category_id = c.c_id join brands b on p.brand_id=b.b_id WHERE p.p_id ='$product_id'";
    // $sql = "SELECT e.id,e.name,e.age,e.gender,c.name as country from employees e join country c on e.country = c.id WHERE e.country=$cid";
    $result = mysqli_query($conn,$sql) or die('Failed to fetch all records from DB');
    if(mysqli_num_rows($result)>0){
        $output['data'] = mysqli_fetch_assoc($result);
        echo json_encode($output,JSON_PRETTY_PRINT);
    }else echo json_encode(array('message'=>"No record found", "status"=>"false"),JSON_PRETTY_PRINT);

?>