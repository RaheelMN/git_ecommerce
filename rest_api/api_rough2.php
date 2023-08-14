<?php 

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin:*');
    // header('Access-Control-Allow-Methods:POST');
    // header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Access-Control-Allow-Methods,Access-Control-Allow-Origin,Content-Type,Authorization,X-Requested-With');


    //connecting with DB server
    $conn = mysqli_connect('localhost','root','','project1') or die("Failed to connect to database");




    // $data = json_decode(file_get_contents("php://input"),true);
    $count = 0;
    $output =[];
    $output['error']=false;
    $output['num_of_items']=0;
    $output['total_price']=0;
    $sql = "call inbrand($count);";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
        $output['data']=mysqli_fetch_all($result,MYSQLI_ASSOC);
        echo "<pre>";
        print_r($output['data']);
        echo "</pre>";
        echo "<br> count: $count<br>";
    }
?>