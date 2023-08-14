<?php 

    header('Content-Type: application/json');

    //Exception handling Settings
    require_once "../include/error_handling.php";
    
    //connecting with DB server
    require_once "../include/config.php";

    $data = json_decode(file_get_contents("php://input"),true);
    $email = $data['email'];
    $password = $data['password'];

    $output =[];
    $output['field_error']=false;
    $output['email']['error']=false;
    $output['password']['error']=false;
    
    //Check if user email exists then get its password
    $sql = "SELECT admin_id,admin_name,admin_password,admin_role FROM admins where admin_email='$email'";
    $result = mysqli_query($conn,$sql)or die('Failed to peform db query');

    if(mysqli_num_rows($result)>0){

        //check user password
        $row  = mysqli_fetch_assoc($result);
        $e_password = password_hash($password,PASSWORD_DEFAULT);
        if(password_verify($password,$row['admin_password'])){

            //start session
            session_start();

            //store user info
            $_SESSION['admin_role']=$row['admin_role'];
            $_SESSION['admin_name']=$row['admin_name'];         

            $output['form_msg']='User logged in successfully';

            //close db connection
            mysqli_close($conn);

            // return output 
            echo json_encode($output,JSON_PRETTY_PRINT);
        }
        else{
            $output['field_error']= true;
            $output['password']['error']=true;
            $output['password']['message']='Password not found';

            //close db connection
            mysqli_close($conn);

            // return output 
            echo json_encode($output,JSON_PRETTY_PRINT);            
        }
    }else{
        $output['field_error']= true;
        $output['email']['error']=true;
        $output['email']['message']='Email not found';  
        
        //close db connection
        mysqli_close($conn);

        // return output 
        echo json_encode($output,JSON_PRETTY_PRINT);              
    }


?>