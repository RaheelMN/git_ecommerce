<?php 

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Access-Control-Allow-Methods,Access-Control-Allow-Origin,Content-Type,Authorization,X-Requested-With');


    //connecting with DB server
    include "../include/config.php";

    $data = json_decode(file_get_contents("php://input"),true);
    echo "<pre>";
    print_r($data);
    echo "</pre>";

    echo "<br> {$data['info']['message']}<br>";


?>