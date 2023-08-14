<?php 

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Access-Control-Allow-Methods,Access-Control-Allow-Origin,Content-Type,Authorization,X-Requested-With');


    //connecting with DB server
    include "../include/config.php";

    function get_ip_address(){
        $ip = "";
        //When ip is from shared internet
        if(isset($_SERVER['HTTP_CLIENT_IP'])){
            $ip = $_SERVER['HTTP_CLIENT_IP'];
            //when ip is from proxy server
        }elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }elseif(isset($_SERVER['REMOTE_ADDR'])){
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    $data = json_decode(file_get_contents("php://input"),true);
    $product_id = $data['product_id'];
    $output =[];
    $output['error']=false;
    $client_ip = get_ip_address();


    $str = implode(",",$product_id);


    $sql = "DELETE FROM cart_detail WHERE cart_id IN ({$str})";
    if(mysqli_query($conn,$sql)){
        $output['message']="Record deleted.";
        echo json_encode($output,JSON_PRETTY_PRINT);
    }else{
        $output['error'] = true;//is there error in executing query
        $output['message']="Cannot delete record";
        echo json_encode($output,JSON_PRETTY_PRINT);   
    }   

?>