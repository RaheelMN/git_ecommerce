<?php 

header('Content-Type: application/json');

session_start();
    
if(isset($_SESSION['admin_role'])){    

    //connecting with DB server
    require_once "../include/config.php";
    
    //verification function
    require_once "../include/validate.php";

    $data = json_decode(file_get_contents("php://input"),true);

    //retrieve variable values
    $category_id = $data['category_id'];
    $category_name = $data['category_name'];
    
    //initialize variables
    $output =[];
    $output['field_error']=false;
 
    //verify category name
    $output['name'] = verify($category_name,'name',50);
    if($output['name']['error']){
       $output['field_error']=true;    
    }else{
        
        //check if category already exist of same name
        $sql = "SELECT * FROM categories WHERE c_name='$category_name' AND c_id != $category_id";
        
        $result = mysqli_query($conn,$sql) or die('Failed to fetch all records from DB');
        
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
        $category_name =mysqli_real_escape_string($conn, $category_name);
    
        $sql = "UPDATE categories SET c_name='$category_name' WHERE c_id = $category_id";  
        $result=mysqli_query($conn,$sql) or die('Failed to perform query');
    
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
