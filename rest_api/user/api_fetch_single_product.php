<?php 

    header('Content-Type: application/json');

    //Exception handling Settings
    require_once "../../include/error_handling.php"; 
    ini_set('error_log', "../../log/error_log.txt");           
    
    //connecting with DB server
    require_once "../../include/config.php";

    //retreive requested data
    $data = json_decode(file_get_contents("php://input"),true);
    $product_id = $data['product_id'];

    //sql query to fetch all records
    $sql = "SELECT p_id,p_title, p_description, c_name as category,
                   b_name as brand, p_image1,p_image2, p_image3, p_price,
                   `status` as stock_status FROM products p 
                   inner join categories c on p.category_id = c.c_id 
                   inner join brands b on p.brand_id=b.b_id
                   INNER JOIN inventory on p_id = product_id WHERE p.p_id ='$product_id'";
    $result = mysqli_query($conn,$sql);

    //To prevent XSS attack browser ouput is displayed using htmlenttites() function
    //Browser parse or interpret server text when it is placed in .html()
    //If output is placed in input field of form or in .text() then browser doesnot
    //parse it therefore no need of htmlentities

    $row = mysqli_fetch_assoc($result);
    $output['p_id'] = htmlentities($row['p_id']);
    $output['p_title'] = htmlentities($row['p_title']);
    $output['p_description'] = htmlentities($row['p_description']);
    $output['category'] = htmlentities($row['category']);
    $output['brand'] = htmlentities($row['brand']);
    $output['p_image1'] = htmlentities($row['p_image1']);
    $output['p_image2'] = htmlentities($row['p_image2']);
    $output['p_image3'] = htmlentities($row['p_image3']);
    $output['p_price'] = htmlentities($row['p_price']);
    $output['stock_status'] = htmlentities($row['stock_status']);

    //close db connection
    mysqli_close($conn);

    echo json_encode($output,JSON_PRETTY_PRINT); 
?>