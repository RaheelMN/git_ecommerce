<?php 

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Access-Control-Allow-Methods,Access-Control-Allow-Origin,Content-Type,Authorization,X-Requested-With');


    //connecting with DB server
    include "../include/config.php";

    //include verfication and validation functions
    include "../include/validate.php";

    $data = json_decode(file_get_contents("php://input"),true);
    $brand_name = $data['bname'];

    //verify name
    $verify=verify($brand_name,"name");

    if($verify['status']=='false'){
        echo json_encode($verify,JSON_PRETTY_PRINT);
    }else{
        //sql query to check if record already exits
        $sql = "SELECT * FROM brands WHERE bname='$brand_name'";
        $result = mysqli_query($conn,$sql) or die('Failed to fetch all records from DB');
    
        //if record already exits
        if(mysqli_num_rows($result)>0){
            echo json_encode(array('message'=>"Record already exist", "status"=>"false"),JSON_PRETTY_PRINT);
        }else{
            //query to insert record in database
            $sql = "INSERT INTO brands (bname) VALUES ('$brand_name')";
    
            //if query is successfully executed
            if(mysqli_query($conn,$sql)){
                echo json_encode(array('message'=>"Record successfully inserted.", "status"=>"true"),JSON_PRETTY_PRINT);
            }
            else {
                echo json_encode(array('message'=>"Record not inserted", "status"=>"false"),JSON_PRETTY_PRINT);
            }  
        } 
    }


?>