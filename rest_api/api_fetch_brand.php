<?php 

    header('Content-Type: application/json'); 
    
    session_start();
    if(isset($_SESSION['admin_role'])){

        //Exception handling Settings
        require_once "../include/error_handling.php";           

        //connecting with DB server
        require_once "../include/config.php";

        $data = json_decode(file_get_contents("php://input"),true);
        $brand_id = $data['brand_id'];

        $output=[];
        $output['error']=false;

        //sql query to fetch brand name
        $sql = "SELECT b_id,b_name FROM brands WHERE b_id = $brand_id"; 
        $result = mysqli_query($conn,$sql);

        //To prevent XSS attack browser ouput is displayed using htmlenttites() function
        //Browser parse or interpret server text when it is placed in .html()
        //If output is placed in input field of form or in .text() then browser doesnot
        //parse it therefore no need of htmlentities

        $row = mysqli_fetch_assoc($result);
        $output['id'] = $row['b_id'];
        $output['name'] = $row['b_name'];

        //close db connection
        mysqli_close($conn);

        echo json_encode($output,JSON_PRETTY_PRINT);

    }else{
        //redirect user if he access page without login
        header("location:../admin/admin_login.html");          
    }


?>