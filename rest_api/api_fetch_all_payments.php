<?php 

    header('Content-Type: application/json');
        
    session_start();
    
    if(isset($_SESSION['admin_role'])){ 

        //Exception handling Settings
        require_once "../include/error_handling.php";           

        //connecting with DB server
       require_once "../include/config.php";

        $output=[];
        $output['error']=false;

        $sql = "SELECT payment_id,invoice_no,amount,pay_type,`date` FROM user_payments
                INNER JOIN payment_type ON payment_mode = pay_id";
        $result = mysqli_query($conn,$sql);
        
        if(mysqli_num_rows($result)>0){
            $output['records'] = mysqli_fetch_all($result,MYSQLI_ASSOC);

            //close db connection
            mysqli_close($conn);
            echo json_encode($output,JSON_PRETTY_PRINT);
        }else{
           $output['message']= "No payments";
           $output['error'] =true;

            //close db connection
            mysqli_close($conn);          
           echo json_encode($output,JSON_PRETTY_PRINT);
    
        } 
    }else{
        //redirect user if he access page without login
        header("location:../admin/admin_login.html");
    }

?>