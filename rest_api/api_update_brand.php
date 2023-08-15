<?php 

header('Content-Type: application/json');

session_start();
    
if(isset($_SESSION['admin_role'])){  
    
    //Exception handling Settings
    require_once "../include/error_handling.php";     

    //connecting with DB server
    require_once "../include/config.php";
    
    //verification function
    require_once "../include/validate.php";
    
    $output =[];

    $data = json_decode(file_get_contents("php://input"),true);

    //retrieve variable values
    $brand_id = $data['brand_id'];
    $brand_name = $data['brand_name'];
    
    //initialize variables
    $output =[];
    $output['field_error']=false;
 
    //verify brand name
    $output['name'] = verify($brand_name,'name',50);
    if($output['name']['error']){
       $output['field_error']=true;    
    }else{
        
        //check if brand already exist of same name
        $sql = "SELECT * FROM brands WHERE b_name='$brand_name' AND b_id != $brand_id";
        
        $result = mysqli_query($conn,$sql);
        
        //if record already exits of same name
        if(mysqli_num_rows($result)>0){

            $output['name']=array("error"=>true,'message'=>"Name already exist");
            $output['field_error']=true;

        }else{
            $output['name']['error']=false;
        }
    }
    
    
     if($output['field_error']){

        //close db connection
        mysqli_close($conn); 

        // return $output 
        echo json_encode($output,JSON_PRETTY_PRINT);

        exit();
    }else{
    
        //Enabling db server to store special characters in string
        $brand_name =mysqli_real_escape_string($conn, $brand_name);
    
        $sql = "UPDATE brands SET b_name='$brand_name' WHERE b_id = $brand_id";  
        $result=mysqli_query($conn,$sql);
    
        $output['form_msg']='Record successfully inserted.';

        //close db connection
        mysqli_close($conn);

        //return output
        echo json_encode($output,JSON_PRETTY_PRINT); 
        exit(); 
    }
}else{
    //    rediect host to login page
    header("location:../admin/admin_login.html");
}


?>
