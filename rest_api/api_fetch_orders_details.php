<?php 

    header('Access-Control-Allow-Origin:*');
    //connecting with DB server

   //Authenticate the host
   session_start();

   //check if host not authorize to access page
   if(!isset($_SESSION['admin_role'])){


        // //check if host has sent cookie
        if(!empty($_COOKIE)){
    
            //destroy host's browser cookie
            $cookie_name="";
            foreach($_COOKIE as $key=>$value){
                $cookie_name = $key;
            }
                setcookie($cookie_name,"",time()-42000,"/");
        }
        else{
            //destroy new session
            setcookie(session_name(),"",time()-42000,"/");
        }


    //    rediect host to login page
       header("location:http://localhost/ecommerce/admin/admin_login.php");
   }


    //connect to db
    include "../include/config.php";

    //initialize return variable
    $output=[];
    $output['error']=false;

    //sql query to fetch order details
    $sql = "SELECT * FROM view_order_details";
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