<?php 

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Access-Control-Allow-Methods,Access-Control-Allow-Origin,Content-Type,Authorization,X-Requested-With');
   
    session_start();
    
    if(isset($_SESSION['user_id'])){
        
        //connecting with DB server
       require_once "../../include/config.php";
    
        //include verfication and validation functions
       require_once "../../include/validate.php";

        $user_id = $_SESSION['user_id'];       
        $data = json_decode(file_get_contents("php://input"),true);
        $user_name = $data['name'];
        $user_email = $data['email'];
        $user_address = $data['address'];
        $user_contact = $data['contact'];
    
        $output =[];
        $output['field_error']=false;
        $output['form_error']=false;
    
        // //verify user name
        $output['name']=verify($user_name,"name",50);
        if($output['name']['error']){
            $output['field_error'] = true;
        }
        
        // //verify email
        $output['email'] = verify($user_email,'email',255);
        if($output['email']['error']){
            $output['field_error']=true;    
        }else{
            
            //check if email already exist
            $sql = "SELECT * FROM users WHERE user_email='$user_email' AND user_id != $user_id";
            
            $result = mysqli_query($conn,$sql) or die('Failed to pefrom db query');
            
            //if record already exits
            if(mysqli_num_rows($result)>0){
                    $output['email']=array("error"=>true,'message'=>"Email already exist. Try another email");
                    mysqli_free_result($result);
                    $output['field_error']=true;
                }else{

                   $output['email']['error']=false;
                }
        }
                    
        // //verify user address
        $output['address']=verify($user_address,"address",255);
        if($output['address']['error']){
            $output['field_error'] = true;
        } 
         
        //verify user contact
        $output['contact']=verify($user_contact,"phone",11);
        if($output['contact']['error']){
            $output['field_error'] = true;
        }  
        
        if($output['field_error']){
            mysqli_close($conn); 
            echo json_encode($output,JSON_PRETTY_PRINT);
        }else{
    
            $sql = "UPDATE users SET user_name='$user_name',user_email='$user_email',user_address='$user_address',user_contact='$user_contact' where user_id = $user_id";       
    
            $result=mysqli_query($conn,$sql)or die('Failed to pefrom db query');
    
            $output['form_msg']='Record successfully inserted.';
            mysqli_close($conn);
            echo json_encode($output,JSON_PRETTY_PRINT);          
    
        }
    }else{

        //redirect user if he access page without login
        header("location:../../index.html");    
    }
    
?>