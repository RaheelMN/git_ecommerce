<?php 

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Access-Control-Allow-Methods,Access-Control-Allow-Origin,Content-Type,Authorization,X-Requested-With');


    //connecting with DB server
    include "../../include/config.php";

    $data = json_decode(file_get_contents("php://input"),true);
    $email = $data['email'];
    $password = $data['password'];

    $output =[];
    $output['field_error']=false;
    $output['email']['error']=false;
    $output['password']['error']=false;
    $output['form_error']=false;
    
    //Check if user email exists then get its password
    $sql = "SELECT user_id,user_name,user_password,ip_address FROM users where user_email='$user_email'";
 
    $result = mysqli_query($conn,$sql)or die('Failed to peform db query');
    if(mysqli_num_rows($result)>0){
        //check user password
        $row  = mysqli_fetch_assoc($result);
        
        if(password_verify($user_password,$row['user_password'])){

            //start session
            session_start();
            //store user info
            $_SESSION['user_id']=$row['user_id'];
            $_SESSION['ip_address']=$row['ip_address'];     //used in cart_details
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