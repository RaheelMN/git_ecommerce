<?php 

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods:POST');
    
    //connecting with DB server
    include "../../include/config.php";


    $data = json_decode(file_get_contents("php://input"),true);
    $product_id = $data['product_id'];

    //sql query to fetch all records
    $sql = "SELECT p_id,p_title, p_description, c_name as category,
                   b_name as brand, p_image1,p_image2, p_image3, p_price,
                   status as stock FROM products p 
                   inner join categories c on p.category_id = c.c_id 
                   inner join brands b on p.brand_id=b.b_id WHERE p.p_id ='$product_id'";
    $result = mysqli_query($conn,$sql) or die('Failed to fetch all records from DB');
    if(mysqli_num_rows($result)>0){

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
        $output['stock'] = htmlentities($row['stock']);

        //free $result memory at server
        mysqli_free_result($result);

        //close db connection
        mysqli_close($conn);

        echo json_encode($output,JSON_PRETTY_PRINT);
    }else{
        $output['error']=true;
        $output['message']="no record found";

        //close db connection
        mysqli_close($conn);

        echo json_encode($output,JSON_PRETTY_PRINT);            
    } 
?>