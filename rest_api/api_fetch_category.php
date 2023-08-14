<?php 

    header('Content-Type: application/json');
    
    session_start();
    if(isset($_SESSION['admin_role'])){

        //connecting with DB server
        require_once "../include/config.php";

        $data = json_decode(file_get_contents("php://input"),true);
        $category_id = $data['category_id'];

        $output=[];
        $output['error']=false;

        //sql query to fetch category name
        $sql = "SELECT c_id,c_name FROM categories WHERE c_id = $category_id"; 
        $result = mysqli_query($conn,$sql) or die('Failed to fetch all records from DB');

        //To prevent XSS attack browser ouput is displayed using htmlenttites() function
        //Browser parse or interpret server text when it is placed in .html()
        //If output is placed in input field of form or in .text() then browser doesnot
        //parse it therefore no need of htmlentities

        $row = mysqli_fetch_assoc($result);
        $output['id'] = $row['c_id'];
        $output['name'] = $row['c_name'];

        //close db connection
        mysqli_close($conn);

        echo json_encode($output,JSON_PRETTY_PRINT);

    }else{
        //redirect user if he access page without login
        header("location:../admin/admin_login.php");          
    }


?>