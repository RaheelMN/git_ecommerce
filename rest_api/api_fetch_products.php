<?php 

header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Access-Control-Allow-Methods,Access-Control-Allow-Origin,Content-Type,Authorization,X-Requested-With');


//connecting with DB server
include "../include/config.php";

$data = json_decode(file_get_contents("php://input"),true);

    $output = [];

    switch($data['card_type']){
        case 'all':
            //sql query to fetch all records
            $sql = "SELECT * FROM products order by rand() LIMIT 0,8";
            $result = mysqli_query($conn,$sql) or die('Failed to fetch all records from DB');
            if(mysqli_num_rows($result)>0){
                $output['data'] = mysqli_fetch_all($result,MYSQLI_ASSOC);
                $output['error']=false;
                echo json_encode($output,JSON_PRETTY_PRINT);
            }else{
                echo json_encode(array('message'=>"No record found", "error"=>true),JSON_PRETTY_PRINT);
            }
            break;

        case 'brand':

            $brand_id = $data['id'];

            //sql query to fetch all records
            $sql = "SELECT * FROM products WHERE brand_id = '$brand_id'";

            $result = mysqli_query($conn,$sql) or die('Failed to fetch brand records from DB');
            if(mysqli_num_rows($result)>0){
                $output['data'] = mysqli_fetch_all($result,MYSQLI_ASSOC);
                $output['error']=false;
                echo json_encode($output,JSON_PRETTY_PRINT);
            }else echo json_encode(array('message'=>"No record found", "error"=>true),JSON_PRETTY_PRINT);  
            break;

        case 'category':

            $category_id = $data['id'];

            //sql query to fetch all records
            $sql = "SELECT * FROM products WHERE category_id = '$category_id'";

            $result = mysqli_query($conn,$sql) or die('Failed to fetch brand records from DB');
            if(mysqli_num_rows($result)>0){
                $output['data'] = mysqli_fetch_all($result,MYSQLI_ASSOC);
                $output['error']=false;
                echo json_encode($output,JSON_PRETTY_PRINT);
            }else echo json_encode(array('message'=>"No record found", "error"=>true),JSON_PRETTY_PRINT);  
            break;
           
        case 'search':

            $search = $data['id'];

            //sql query to fetch all records
            $sql = "SELECT * FROM products WHERE keywords LIKE '%$search%'";

            $result = mysqli_query($conn,$sql) or die('Failed to fetch brand records from DB');
            if(mysqli_num_rows($result)>0){
                $output['data'] = mysqli_fetch_all($result,MYSQLI_ASSOC);
                $output['error']=false;
                echo json_encode($output,JSON_PRETTY_PRINT);
            }else echo json_encode(array('message'=>"No record found", "error"=>true),JSON_PRETTY_PRINT);               

    }


?>