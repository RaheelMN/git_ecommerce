<?php 

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Access-Control-Allow-Methods,Access-Control-Allow-Origin,Content-Type,Authorization,X-Requested-With');


    //connecting with DB server
    include "../include/config.php";
    //get current user ip address
    include "../include/get_ip_address.php";

    //include verfication and validation functions
    include "../include/validate.php";

    session_start();

    if(isset($_SESSION['user_id'])){

        $user_id = $_SESSION['user_id'];       
        $data = json_decode(file_get_contents("php://input"),true);
        $user_password = $data['password'];
        $user_opassword = $data['old_password'];
    
        //Initialize output associative array
        $output =[];
        $output['field_error']=false;
        $output['old_password']['error']=false;
        $output['password']['error']=false;
        $output['form_error']=false;


        //Verify old password
        $sql = "SELECT user_password FROM users where user_id='$user_id'";
        $result = mysqli_query($conn,$sql);
        //check user password
        $row  = mysqli_fetch_assoc($result);
        
        if(!password_verify($user_opassword,$row['user_password'])){
            $output['field_error']=true;
            $output['old_password']['error']=true;
            $output['old_password']['message']="Password not found";
        }

        //verify user password
        $output['password']=verify($user_password,"password",12);
        if($output['password']['error']){
            $output['field_error'] = true;
        } 

        if($output['field_error']){
            mysqli_close($conn); 
            echo json_encode($output,JSON_PRETTY_PRINT);
        }else{

            //convert password to its hashed form
            $hash_password = password_hash($user_password,PASSWORD_DEFAULT);            
    
            $sql = "UPDATE users SET user_password='$hash_password' where user_id = $user_id";       
    
            $result=mysqli_query($conn,$sql);
            if(!$result){
                $output['form_error']=true;
                $output['form_msg']='Failed to update record in DB';
    
                mysqli_close($conn);
                echo json_encode($output,JSON_PRETTY_PRINT);
            }else{
                $output['form_msg']='Record successfully inserted.';
                mysqli_close($conn);
                echo json_encode($output,JSON_PRETTY_PRINT);          
            } 
    
    
        }
    }    



?>