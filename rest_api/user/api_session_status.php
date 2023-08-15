<?php 

    header('Content-Type: application/json');

    //Exception handling Settings
    require_once "../../include/error_handling.php";
    ini_set('error_log', "../../log/error_log.txt");        

    session_start();

    $output=[];
    $output['session_active']=false;

    if(isset($_SESSION['user_name'])){
        $output['session_active']=true;
        $output['user_name']=$_SESSION['user_name'];
    }

     echo json_encode($output,JSON_PRETTY_PRINT);

?>