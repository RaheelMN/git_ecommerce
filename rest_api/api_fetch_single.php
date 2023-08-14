<?php 

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin:*');
    //connecting with DB server
    include "include/config.php";


    $data = json_decode(file_get_contents("php://input"),true);
    $employee_id = $data['eid'];

    //sql query to fetch all records
    $sql = "SELECT * FROM `employees` WHERE `id`=$employee_id";
    $result = mysqli_query($conn,$sql) or die('Failed to fetch all records from DB');
    if(mysqli_num_rows($result)>0){
        $output = mysqli_fetch_assoc($result);
        echo json_encode($output,JSON_PRETTY_PRINT);
    }else echo json_encode(array('message'=>"No record found", "status"=>"false"),JSON_PRETTY_PRINT);

?>