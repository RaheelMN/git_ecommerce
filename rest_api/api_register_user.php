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

    $data = json_decode(file_get_contents("php://input"),true);
    $user_name = $data['name'];
    $user_email = $data['email'];
    $user_password = $data['password'];
    $user_address = $data['address'];
    $user_contact = $data['contact'];
    $ip_address = get_ip_address();

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
        $sql = "SELECT * FROM users WHERE user_email='$user_email'";
        
        $result = mysqli_query($conn,$sql) or die('Failed to fetch all records from DB');
        
        //if record already exits
        if(mysqli_num_rows($result)>0){
                $output['email']=array("error"=>true,'message'=>"Email already exist. Try another email");
                mysqli_free_result($result);
                $output['field_error']=true;
            }else{
                    $output['email']['error']=false;
                }
    }
            
    
    // //verify user password
    $output['password']=verify($user_password,"password",12);
    if($output['password']['error']){
        $output['field_error'] = true;
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

        //convert password to its hashed form
        $hash_password = password_hash($user_password,PASSWORD_DEFAULT);

        //Address is stored in encoded form to prevent sql injection
        $user_address =mysqli_real_escape_string($conn, $user_address);

        $sql = "INSERT INTO users (user_name,user_email,user_password,user_address,user_contact,ip_address) 
                VALUES ('$user_name','$user_email','$hash_password','$user_address','$user_contact','$ip_address')";       

        $result=mysqli_query($conn,$sql);
        if(!$result){
            $output['form_error']=true;
            $output['form_msg']='Failed to insert record in DB';

            mysqli_close($conn);
            echo json_encode($output,JSON_PRETTY_PRINT);
        }else{

            $sql = "SELECT user_id FROM users where user_email='$user_email'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            //start session
            session_start();
            //store user info
            $_SESSION['user_id']=$row['user_id'];
            $_SESSION['ip_address']=$ip_address;    //used in cart_detail
            $_SESSION['user_name']=$user_name;            

            $output['user_name']=$user_name;
            $output['form_msg']='Record successfully inserted.';
            mysqli_close($conn);
            echo json_encode($output,JSON_PRETTY_PRINT);          
        }

    }
    



?>