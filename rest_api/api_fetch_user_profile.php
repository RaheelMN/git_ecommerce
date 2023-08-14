<?php 

    header('content_type: application/json');
    header('Access-Control-Allow-Origin:*');
    //connecting with DB server
    include "../include/config.php";

    $output=[];
    $output['error']=false;

    session_start();
    $user_id = $_SESSION['user_id'];

    //sql query to fetch user record
    $sql = "SELECT user_name,user_email,user_address,user_contact FROM users WHERE user_id = $user_id";
    $result = mysqli_query($conn,$sql) or die('Failed to fetch all records from DB');
    if(mysqli_num_rows($result)>0){
        $output['record'] = mysqli_fetch_assoc($result);
        //To prevent XSS attack encode user_address
        $output['record']['user_address']=htmlentities($output['record']['user_address']);
        echo json_encode($output,JSON_PRETTY_PRINT);
    }else{
       $output[]= array('message'=>"No record found", "error"=>true);
       echo json_encode($output,JSON_PRETTY_PRINT);

    } 

?>