<?php 

    header('Content-Type: application/json');

    //Exception handling Settings
    require_once "../../include/error_handling.php";  
    ini_set('error_log', "../../log/error_log.txt");          

    //connecting with DB server
    require_once "../../include/config.php";

    //retrieving ip address
   require_once "../../include/get_ip_address.php";

    $data = json_decode(file_get_contents("php://input"),true);
    $user_email = $data['email'];
    $user_password = $data['password'];

    $output =[];
    $output['field_error']=false;
    $output['email']['error']=false;
    $output['password']['error']=false;

    //retrieve user ip address
    $client_ip = get_ip_address();
    
    //Check if user email exists then get its password
    $sql = "SELECT user_id,user_name,user_password FROM users where user_email='$user_email'";
 
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        //check user password
        $row  = mysqli_fetch_assoc($result);
        
        if(password_verify($user_password,$row['user_password'])){

            //start session
            session_start();

            //store user info
            $_SESSION['user_id']=$row['user_id'];
            $_SESSION['ip_address']=$client_ip;     //used in cart_details
            $_SESSION['user_name']=$output['user_name']=$row['user_name'];

            // update user ip address in users table 
            $sql = "UPDATE users SET ip_address= '$client_ip'  WHERE user_id = {$row['user_id']}";
            $result = mysqli_query($conn,$sql);
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