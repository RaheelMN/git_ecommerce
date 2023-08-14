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

    $output =[];
    $output['field_error']=false;
    $output['form_error']=false;

    //verify brand name
    $output['bname']=verify($brand_name,"name",50);
    if($output['bname']['error']){
        $output['field_error'] = true;
        echo json_encode($output,JSON_PRETTY_PRINT);
    }else{
        //sql query to check if record already exits
        $sql = "SELECT * FROM brands WHERE b_name='$brand_name'";
        $result = mysqli_query($conn,$sql) or die('Failed to fetch all records from DB');
    
        //if record already exits
        if(mysqli_num_rows($result)>0){
            $output['field_error']=true; //is there error in input feild
            $output['bname']['error'] = true;
            $output['bname']['message'] = "Record already exist";
            echo json_encode($output,JSON_PRETTY_PRINT);
        }else{
            //query to insert record in database
            $sql = "INSERT INTO brands (b_name) VALUES ('$brand_name')"; 
            //if query is successfully executed
            if(mysqli_query($conn,$sql)){
                $output['form_msg']="Record successfully inserted.";
                echo json_encode($output,JSON_PRETTY_PRINT);
            }
            else {
                $output['form_err'] = true;//is there error in executing query
                $output['form_msg']="Record not inserted";
                echo json_encode($output,JSON_PRETTY_PRINT);
            }  
        } 
    }


?>