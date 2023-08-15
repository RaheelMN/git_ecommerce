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
        $brand_name = $data['bname'];

        $output =[];
        $output['field_error']=false;

        //verify brand name
        $output['bname']=verify($brand_name,"name",50);
        if($output['bname']['error']){
            $output['field_error'] = true;

            //close db connection
            mysqli_close($conn);

            //return output
            echo json_encode($output,JSON_PRETTY_PRINT);

            exit();
        }else{

            //sql query to check if record already exits
            $sql = "SELECT * FROM brands WHERE b_name='$brand_name'";
            $result = mysqli_query($conn,$sql);
        
            //if record already exits
            if(mysqli_num_rows($result)>0){
                $output['field_error']=true; //is there error in input feild
                $output['bname']['error'] = true;
                $output['bname']['message'] = "Record already exist";

                //close db connection
                mysqli_close($conn);

                //return output                
                echo json_encode($output,JSON_PRETTY_PRINT);
            }else{

                //query to insert record in database
                $sql = "INSERT INTO brands (b_name) VALUES ('$brand_name')"; 
                $result = mysqli_query($conn,$sql);

                $output['form_msg']="Record successfully inserted. Add another brand.";

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