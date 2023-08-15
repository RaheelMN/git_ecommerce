<?php 

    header('Content-Type: application/json');    

    session_start();

    if(isset($_SESSION['user_id'])){

        //Exception handling Settings
        require_once "../../include/error_handling.php";
        ini_set('error_log', "../../log/error_log.txt");                   

        //connecting with DB server
       require_once "../../include/config.php";

        //include verfication and validation functions
       require_once "../../include/validate.php";        

       //retreive user session id
        $user_id = $_SESSION['user_id']; 
        
        //retreive requested data
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

            //close db connection
            mysqli_close($conn);
            
            //return output
            echo json_encode($output,JSON_PRETTY_PRINT);
        }else{

            //convert password to its hashed form
            $hash_password = password_hash($user_password,PASSWORD_DEFAULT);            
    
            $sql = "UPDATE users SET user_password='$hash_password' where user_id = $user_id";       
    
            $result=mysqli_query($conn,$sql);

            $output['form_msg']='Record successfully inserted.';

            //close db connection
            mysqli_close($conn);

            //return output
            echo json_encode($output,JSON_PRETTY_PRINT);          
       
        }
    }else{

        //redirect user if he access page without login
        header("location:../../home.html");        
    }    



?>