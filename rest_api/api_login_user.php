<?php 

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Access-Control-Allow-Methods,Access-Control-Allow-Origin,Content-Type,Authorization,X-Requested-With');


    //connecting with DB server
    include "../include/config.php";

    $data = json_decode(file_get_contents("php://input"),true);
    $user_email = $data['email'];
    $user_password = $data['password'];

    $output =[];
    $output['field_error']=false;
    $output['email']['error']=false;
    $output['password']['error']=false;
    $output['form_error']=false;
    
    //Check if user email exists then get its password
    $sql = "SELECT user_name,user_password FROM users where user_email='$user_email'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        //check user password
        $row  = mysqli_fetch_assoc($result);
        
        if(password_verify($user_password,$row['user_password'])){

            //start session
            session_start();
            //store user name
            $_SESSION['user_name']=$output['user_name']=$row['user_name'];

            $output['form_msg']='User logged in successfully';
            mysqli_close($conn);
            echo json_encode($output,JSON_PRETTY_PRINT);
        }
        else{
            $output['field_error']= true;
            $output['password']['error']=true;
            $output['password']['message']='Password not found';
            mysqli_close($conn);
            echo json_encode($output,JSON_PRETTY_PRINT);            
        }
    }else{
        $output['field_error']= true;
        $output['email']['error']=true;
        $output['email']['message']='Email not found';  
        mysqli_close($conn);
        echo json_encode($output,JSON_PRETTY_PRINT);              
    }


?>