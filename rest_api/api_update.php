<?php 

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods:PUT');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Access-Control-Allow-Methods,Access-Control-Allow-Origin,Content-Type,Authorization,X-Requested-With');

    //connecting with DB server
    include "include/config.php";


    $data = json_decode(file_get_contents("php://input"),true);
    $id = $data['eid'];
    $name = $data['ename'];
    $age = $data['eage'];
    $gender=$data['egender'];
    $country = $data['ecountry'];

    //sql query to fetch all records
    $sql = "UPDATE `employees` SET `name`= '$name',`age`=$age,`gender`='$gender',`country`='$country' WHERE `id` = $id";
    if(mysqli_query($conn,$sql)){
        echo json_encode(array('message'=>"Record successfully updated.", "status"=>"true"),JSON_PRETTY_PRINT);
    }
    else echo json_encode(array('message'=>"Record not inserted", "status"=>"false"),JSON_PRETTY_PRINT);

?>