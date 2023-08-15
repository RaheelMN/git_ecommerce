<?php 

session_start();
    
if(isset($_SESSION['admin_role'])){    

    //connecting with DB server
    include "../include/config.php";
    
    //verification function
    include "../include/validate.php";
    
    $output =[];

    //retrieve variable values
    $p_id = $_POST['p_id'];
    $pname = $_POST['edit_pname'];
    $pdesc =  $_POST['edit_pdesc'];
    $pkeyw =  $_POST['edit_pkeyw'];
    $pbrand = $_POST['edit_pform_brand'];
    $pcatg = $_POST['edit_pform_category'];
    $pimg1 = $_FILES['edit_pimg1'];
    $pimg2 = $_FILES['edit_pimg2'];
    $pimg3 = $_FILES['edit_pimg3'];
    $pprice = $_POST['edit_pprice'];
    $stock = $_POST['edit_pstock'];
    $limit = $_POST['edit_plimit']; 
    
    //initialize variables
    $output =[];
    $output['field_error']=false;
    $output['pimg1']['error']=false;
    $output['pimg2']['error']=false;
    $output['pimg3']['error']=false;

    //check if admin has uploaded image 1
    $update_img1=true;
    if(empty($pimg1['name'])){
        $update_img1=false; 
    }

    //check if admin has uploaded image 2
    $update_img2=true;
    if(empty($pimg2['name'])){
        $update_img2=false; 
    }

    //check if admin has uploaded image 3
    $update_img3=true;
    if(empty($pimg3['name'])){
        $update_img3=false; 
    }  
 

    //verify product name
    $output['pname'] = verify($pname,'name',50);
    if($output['pname']['error']){
       $output['field_error']=true;    
    }else{
        
        //check if product already exist
        $sql = "SELECT * FROM products WHERE p_title='$pname' AND p_id != $p_id";
        
        $result = mysqli_query($conn,$sql) or die('Failed to fetch all records from DB');
        
        //if record already exits
        if(mysqli_num_rows($result)>0){
            $output['pname']=array("error"=>true,'message'=>"Record already exist");
            mysqli_free_result($result);
            $output['field_error']=true;
        }else{
            $output['pname']['error']=false;
        }
    }
    
    //verify product description
    $output['pdesc'] = verify($pdesc,'desc',150);
    if($output['pdesc']['error']){
        $output['field_error']=true;
    } 
    
    //verify product keywords
    $output['pkeyw'] = verify($pkeyw,'keyw',100);
    if($output['pkeyw']['error']){
        $output['field_error']=true;
    }     
    
    //verfiy image 1 extension
    if($update_img1){
        $output['pimg1']=verify($pimg1,'image',0);
        if($output['pimg1']['error']){
           $output['field_error']=true;
        }
    }
    
    
    //verfiy image 2 extension
    if($update_img2){    
        $output['pimg2']=verify($pimg2,'image',0);
        if($output['pimg2']['error']){
            $output['field_error']=true;
        }
    }
    
    //verfiy image 3 extension
    if($update_img3){    
        $output['pimg3']=verify($pimg3,'image',0);
        if($output['pimg3']['error']){
            $output['field_error']=true;
        } 
    }        
    
    //verify product price
    $output['pprice'] = verify($pprice,'price',0);
    if($output['pprice']['error']){
        $output['field_error']=true;
     }   
     
    //verify product stock
    $output['pstock'] = verify($stock,'stock',0);
    if($output['pstock']['error']){
        $output['field_error']=true;
     } 
     
    //verify product per order upper limit
    $output['plimit'] = verify($limit,'limit',0);
    if($output['plimit']['error']){
        $output['field_error']=true;
     }      
    
    
     if($output['field_error']){

        //close db connection
        mysqli_close($conn); 

        // return $output 
        echo json_encode($output,JSON_PRETTY_PRINT);

        exit();
    }else{

        //Retrieve images stored in db
        $sql = "SELECT p_image1,p_image2,p_image3 FROM products WHERE  p_id = $p_id";
        $result = mysqli_query($conn,$sql) or die('Failed to fetch all records from DB');  
        $record = mysqli_fetch_assoc($result);
        $img1_path_db =$record['p_image1'];   
        $img2_path_db =$record['p_image2'];
        $img3_path_db =$record['p_image3'];


        //assigning folder to images in server
        $target_dir = 'images/';

        //if admin has upload image then image path should be of it else it should be of db image
        if($update_img1){
            $img1_path = $target_dir.$pimg1['name'];
        }else{
            $img1_path = $img1_path_db;
        }    


        //if admin has upload image then image path should be of it else it should be of db image
        if($update_img2){
            $img2_path = $target_dir.$pimg2['name'];
        }else{
            $img2_path = $img2_path_db;
        }

        //if admin has upload image then image path should be of it else it should be of db image
        if($update_img3){
            $img3_path = $target_dir.$pimg3['name'];
        }else{
            $img3_path = $img3_path_db;
        }
    
        //Enabling db server to store special characters in string
        $pname =mysqli_real_escape_string($conn, $pname);
        $pdesc =mysqli_real_escape_string($conn, $pdesc);
        $pkeyw =mysqli_real_escape_string($conn, $pkeyw);
    
        $sql = "UPDATE products SET p_title='$pname',p_description='$pdesc',keywords='$pkeyw',brand_id=$pbrand,
        category_id=$pcatg,p_image1='$img1_path',p_image2='$img2_path',p_image3='$img3_path',p_price=$pprice
        WHERE p_id = $p_id";  
        $result=mysqli_query($conn,$sql) or die('Failed to perform query');

        $stock_status = '';
        //check if stock is available
        if($stock > 0){
            $stock_status = "Available";
        }else{
            $stock_status = "Unavailable";
        }

        $sql = "UPDATE inventory SET stock = $stock, order_limit = $limit,`status`= '$stock_status' WHERE product_id = $p_id";
        $result=mysqli_query($conn,$sql) or die('Failed to perform query');

        //upload images to server
        if($update_img1){
            move_uploaded_file($pimg1['tmp_name'],"../".$img1_path); 
        } 
 
        if($update_img2){
            move_uploaded_file($pimg2['tmp_name'],"../".$img2_path); 
        }             
        if($update_img3){
            move_uploaded_file($pimg3['tmp_name'],"../".$img3_path); 
        }      
        $output['form_msg']='Record successfully inserted.';

        //close db connection
        mysqli_close($conn);

        //return output
        echo json_encode($output,JSON_PRETTY_PRINT); 
        exit(); 
    }
}else{
    //    rediect host to login page
    header("location:http://localhost/ecommerce/admin/admin_login.html");
}


?>
