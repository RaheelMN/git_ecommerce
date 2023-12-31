<?php 

    header('Content-Type: application/json');
    
    session_start();
    if(isset($_SESSION['admin_role'])){

        //Exception handling Settings
        require_once "../include/error_handling.php";         

        //connecting with DB server
        require_once "../include/config.php";

        $data = json_decode(file_get_contents("php://input"),true);
        $product_id = $data['product_id'];

        $output=[];
        $output['error']=false;

        //sql query to fetch all records
        $sql = "SELECT p_id,p_title, p_description,keywords,c_name as category,
                    b_name as brand, p_image1,p_image2, p_image3, p_price,
                    stock,order_limit FROM products p 
                    inner join categories c on p.category_id = c.c_id 
                    inner join brands b on p.brand_id=b.b_id 
                    inner join inventory i on p_id= product_id 
                    WHERE p_id ='$product_id'";
        $result = mysqli_query($conn,$sql);

        //To prevent XSS attack browser ouput is displayed using htmlenttites() function
        //Browser parse or interpret server text when it is placed in .html()
        //If output is placed in input field of form or in .text() then browser doesnot
        //parse it therefore no need of htmlentities

        $row = mysqli_fetch_assoc($result);
        $output['p_id'] = $row['p_id'];
        $output['p_title'] = $row['p_title'];
        $output['p_description'] = $row['p_description'];
        $output['keywords'] = $row['keywords'];
        $output['category'] = $row['category'];
        $output['brand'] = $row['brand'];
        $output['p_image1'] = $row['p_image1'];
        $output['p_image2'] = $row['p_image2'];
        $output['p_image3'] = $row['p_image3'];
        $output['p_price'] = $row['p_price'];
        $output['stock'] = $row['stock'];
        $output['limit'] = $row['order_limit'];

        //unset $result
        mysqli_free_result($result);

        //close db connection
        mysqli_close($conn);

        echo json_encode($output,JSON_PRETTY_PRINT);

    }else{
        //redirect user if he access page without login
        header("location:../admin/admin_login.html");          
    }


?>