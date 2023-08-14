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
    $category_name = $data['cname'];

    $output =[];

    //verify name
    $verify=verify($category_name,"name",20);

    if($verify['error']){
        $output['field_err']=true; //is there error in input feild
        $output['cname'] = $verify['message'];
        echo json_encode($output,JSON_PRETTY_PRINT);
    }else{
        //sql query to check if record already exits
        $sql = "SELECT * FROM categories WHERE cname='$category_name'";
        $result = mysqli_query($conn,$sql) or die('Failed to fetch all records from DB');
    
        //if record already exits
        if(mysqli_num_rows($result)>0){
            $output['field_err']=true; //is there error in input feild
            $output['cname'] = "Record already exist";
            echo json_encode($output,JSON_PRETTY_PRINT); 
        }else{
            //query to insert record in database
            $sql = "INSERT INTO categories (cname) VALUES ('$category_name')";
    
            //if query is successfully executed
            if(mysqli_query($conn,$sql)){
                $output['field_err']=false; //is there error in input feild
                $output['form_err'] = false;//is there error in executing query
                $output['form_msg']="Record successfully inserted.";
                echo json_encode($output,JSON_PRETTY_PRINT);                
            }
            else {
                $output['field_err']=false; //is there error in input feild
                $output['form_err'] = true;//is there error in executing query
                $output['form_msg']="Record not inserted";
                echo json_encode($output,JSON_PRETTY_PRINT);                
            }  
        } 
    }


?>