<?php 

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods:DELETE');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Access-Control-Allow-Methods,Access-Control-Allow-Origin,Content-Type,Authorization,X-Requested-With');
   
    //connecting with DB server
    include "include/config.php";


    $data = json_decode(file_get_contents("php://input"),true);
    $employee_id = $data['eid'];

    //verify record exit
    $sql = "SELECT * FROM `employees` WHERE `id` = $employee_id";
    $result = mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result)==0){
        echo json_encode(array('message'=>"Record not found", "status"=>"false"),JSON_PRETTY_PRINT);
    }
    else{
        //sql query to fetch record
        $sql = "DELETE FROM `employees` WHERE `id`=$employee_id";
        $result=mysqli_query($conn,$sql);
        echo json_encode(array('message'=>"Record successfully deleted.", "status"=>"true"),JSON_PRETTY_PRINT);
    }

?>