<?php 

    header('content_type: application/json');
    header('Access-Control-Allow-Origin:*');
    //connecting with DB server
    include "../include/config.php";

    session_start();

    $output=[];
    $output['session_active']=false;

    if(isset($_SESSION['user_name'])){
        $output['session_active']=true;
        $output['name']=$_SESSION['user_name'];
    }

     echo json_encode($output,JSON_PRETTY_PRINT);

?>