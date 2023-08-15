<?php 

    header('Content-Type: application/json');
    header('Cache-Control: no-cache');

    //Exception handling Settings
    require_once "../include/error_handling.php";    

    //connecting with DB server
    require_once "../include/config.php";

    $output=[];
    $output['brands']['error']=false;
    $output['categories']['error']=false;

    //sql query to fetch all records
    $sql = "SELECT * FROM brands";
    $result = mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result)>0){
        $output['brands']['data'] = mysqli_fetch_all($result,MYSQLI_ASSOC);

    }else{
    $output['brands']= array('message'=>"No record found", "error"=>true);
    } 

    //sql query to fetch all records
    $sql = "SELECT * FROM categories";
    include "jojo.php";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $output['categories']['data'] = mysqli_fetch_all($result,MYSQLI_ASSOC);

    }else {
        $output['categories']= array('message'=>"No record found", "error"=>true);
    }

    //close db connection
    mysqli_close($conn);

    //return output
    echo json_encode($output,JSON_PRETTY_PRINT);

?>