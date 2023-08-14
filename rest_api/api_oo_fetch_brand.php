<?php 

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Access-Control-Allow-Methods,Access-Control-Allow-Origin,Content-Type,Authorization,X-Requested-With');
   
    
    session_start();
    if(isset($_SESSION['admin_role'])){

        //connecting with DB server
        require_once "../include/oo_config.php";


        $data = json_decode(file_get_contents("php://input"),true);
        $brand_id = $data['brand_id'];

        $output=[];
        $output['error']=false;

        //sql query to fetch brand name
        // $sql = "SELECT b_id,b_name FROM brands WHERE b_id = $brand_id"; 
        // $result = mysqli_query($conn,$sql) or die('Failed to fetch all records from DB');

        $sql = "SELECT b_id,b_name FROM brands WHERE b_id = ?"; 
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i',$brand_id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id,$name);
        $stmt->fetch();
        $stmt->free_result();
        $stmt->close();
        die();


        //To prevent XSS attack browser ouput is displayed using htmlenttites() function
        //Browser parse or interpret server text when it is placed in .html()
        //If output is placed in input field of form or in .text() then browser doesnot
        //parse it therefore no need of htmlentities

        // $row = mysqli_fetch_assoc($result);
        // $output['id'] = $row['b_id'];
        // $output['name'] = $row['b_name'];

        // //close db connection
        // mysqli_close($conn);

        // echo json_encode($output,JSON_PRETTY_PRINT);

    }else{
        //redirect user if he access page without login
        header("location:http://localhost/ecommerce/admin/admin_login.php");          
    }


?>