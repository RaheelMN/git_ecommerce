<?php 

    header('content_type: application/json');
    header('Access-Control-Allow-Origin:*');
    //connecting with DB server
    include "../include/config.php";

    //sql query to fetch all records
    $sql = "SELECT * FROM products order by rand()";
    $result = mysqli_query($conn,$sql) or die('Failed to fetch all records from DB');
    if(mysqli_num_rows($result)>0){
        $output['data'] = mysqli_fetch_all($result,MYSQLI_ASSOC);
        $output['error']=false;
        echo json_encode($output,JSON_PRETTY_PRINT);
    }else echo json_encode(array('message'=>"No record found", "error"=>true),JSON_PRETTY_PRINT);

?>