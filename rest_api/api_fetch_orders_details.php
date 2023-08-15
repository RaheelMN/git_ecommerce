<?php 

    header('Content-Type: application/json');

   //Authenticate the host
   session_start();

   //check if host not authorize to access page
   if(!isset($_SESSION['admin_role'])){

        //rediect host to login page
       header("location:../admin/admin_login.html");
   }

    //connect to db
    require_once "../include/config.php";

    //initialize return variable
    $output=[];
    $output['error']=false;

    $sql = "SELECT p_id, p_title, p_image1, p_price,purchased,`stock`,`status`
      FROM products INNER JOIN inventory ON p_id=product_id ";
    $result = mysqli_query($conn,$sql) or die('Failed to perform query');

    if(mysqli_num_rows($result)>0){
        $output['records'] = mysqli_fetch_all($result,MYSQLI_ASSOC);

        //close db connection
        mysqli_close($conn);

        echo json_encode($output,JSON_PRETTY_PRINT);
    }else{
        $output['error']=true;
        $output['message']='no record found';

        //close db connection
        mysqli_close($conn);

        echo json_encode($output,JSON_PRETTY_PRINT);           
    }   

?>