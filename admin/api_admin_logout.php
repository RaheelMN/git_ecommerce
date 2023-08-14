<?php 

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin:*');


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
   
      
        
    //destroy browser cookie
    setcookie(session_name(), "", time() - (60*60*24*30),"/");

    //delete session variables
    session_unset();

    //delete session
    session_destroy();
    
    //rediect admin to login page
    header("location:http://localhost/ecommerce/admin/admin_login.php");            

?>