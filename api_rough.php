<?php 

    header('content_type: application/json');
    header('Access-Control-Allow-Origin:*');
    //connecting with DB server
    include "include/config.php";

    //sql query to fetch all records

    $output=[];
    $output['name']='raheel';
    $output['number']=22;
    $output['flag']=true;
    echo json_encode($output,JSON_PRETTY_PRINT);

?>