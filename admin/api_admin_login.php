<?php 

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Access-Control-Allow-Methods,Access-Control-Allow-Origin,Content-Type,Authorization,X-Requested-With');


    //connecting with DB server
    include "../include/config.php";

    $data = json_decode(file_get_contents("php://input"),true);
    $email = $data['email'];
    $password = $data['password'];

    $output =[];
    $output['field_error']=false;
    $output['email']['error']=false;
    $output['password']['error']=false;
    $output['form_error']=false;
    
    //Check if user email exists then get its password
    $sql = "SELECT admin_id,admin_name,admin_password,admin_role FROM admins where admin_email='$email'";
    $result = mysqli_query($conn,$sql)or die('Failed to peform db query');

    if(mysqli_num_rows($result)>0){
        //check user password
        $row  = mysqli_fetch_assoc($result);
        $e_password = password_hash($password,PASSWORD_DEFAULT);
        // echo "<br> password defautl: $password";
        // echo "<br> password hast: $e_password";
        // die();
        if(password_verify($password,$row['admin_password'])){

            //start session
            session_start();
            //store user info
            $_SESSION['admin_role']=$row['admin_role'];
            $_SESSION['admin_name']=$row['admin_name'];   

            $output['form_msg']='User logged in successfully';

            //close db connection
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