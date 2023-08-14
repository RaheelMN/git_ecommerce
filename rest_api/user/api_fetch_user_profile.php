<?php 

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin:*');


    session_start();

    if(isset($_SESSION['user_id'])){  
        
        //connecting with DB server
        require_once "../../include/config.php";

        $output=[];
        $output['error']=false;        
        $user_id = $_SESSION['user_id'];

        //sql query to fetch user record
        $sql = "SELECT user_name,user_email,user_address,user_contact FROM users WHERE user_id = $user_id";
        $result = mysqli_query($conn,$sql) or die('Failed to fetch all records from DB');
 
        if(mysqli_num_rows($result)>0){
            $output['record'] = mysqli_fetch_assoc($result);
            //To prevent XSS attack encode user_address
            $output['record']['user_address']=htmlentities($output['record']['user_address']);

            //close db connection
            mysqli_close($conn);             
            echo json_encode($output,JSON_PRETTY_PRINT);
        }else{
            $output[]= array('message'=>"No record found", "error"=>true);

            //close db connection
            mysqli_close($conn);         
            echo json_encode($output,JSON_PRETTY_PRINT);
        } 
    }
    else{

        //redirect user if he access page without login
        header("location:../../index.html");        
    }    
?>