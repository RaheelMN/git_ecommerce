<?php 

    header('Content-Type: application/json');

    session_start();
    
    //check if admin is sending request 
    if(isset($_SESSION['admin_role'])){ 

        //Exception handling Settings
        require_once "../include/error_handling.php";          

        //connecting with DB server
        require_once "../include/config.php";

        //include verfication and validation functions
        require_once "../include/validate.php";

        $data = json_decode(file_get_contents("php://input"),true);
        $category_name = $data['cname'];

        $output =[];
        $output['field_error']=false;

        //verify name
        $output['cname']=verify($category_name,"name",50);

        if($output['cname']['error']){
            $output['field_error']=true; //is there error in input feild
            echo json_encode($output,JSON_PRETTY_PRINT);
        }else{
            //sql query to check if record already exits
            $sql = "SELECT * FROM categories WHERE c_name='$category_name'";
            $result = mysqli_query($conn,$sql);
        
            //if record already exits
            if(mysqli_num_rows($result)>0){
                $output['field_error']=true; //is there error in input feild
                $output['cname']['error'] = true;
                $output['cname']['message'] = "Record already exist";

                //close db connection
                mysqli_close($conn);

                //return output
                echo json_encode($output,JSON_PRETTY_PRINT); 
            }else{

                //query to insert record in database
                $sql = "INSERT INTO categories (c_name) VALUES ('$category_name')";
                $result = mysqli_query($conn,$sql);

                $output['form_msg']="Record successfully inserted. Add another category.";

                //close db connection
                mysqli_close($conn);

                //return output                
                echo json_encode($output,JSON_PRETTY_PRINT);                
            } 
        }
    }else{
        //rediect host to login page
        header("location:../admin/admin_login.html");
    }

?>