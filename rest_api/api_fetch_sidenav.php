<?php 

    header('content_type: application/json');
    header('Access-Control-Allow-Origin:*');
    //connecting with DB server
    include "../include/config.php";

    //sql query to fetch all records
    $sql = "SELECT * FROM brands";
    $result = mysqli_query($conn,$sql) or die('Failed to fetch all records from DB');
    if(mysqli_num_rows($result)>0){
        $output['brands'] = mysqli_fetch_all($result,MYSQLI_ASSOC);
        //echo json_encode($output,JSON_PRETTY_PRINT);
    }else{
       $output['brands']= array('message'=>"No record found", "status"=>"false");
    } 

    //sql query to fetch all records
    $sql = "SELECT * FROM categories";
    $result = mysqli_query($conn,$sql) or die('Failed to fetch all records from DB');
    if(mysqli_num_rows($result)>0){
        $output['categories'] = mysqli_fetch_all($result,MYSQLI_ASSOC);

    }else {
        $output['categories']= array('message'=>"No record found", "status"=>"false");
    }

    echo json_encode($output,JSON_PRETTY_PRINT);

?>