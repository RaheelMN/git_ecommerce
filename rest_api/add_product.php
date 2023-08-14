<?php 

header('Content-Type: application/json');

session_start();
    
if(isset($_SESSION['admin_role'])){  

    //connecting with DB server
    require_once "../include/config.php";
    
    //verification function
    require_once "../include/validate.php";
    
    //retrieve variable values
    $pname = $_POST['add_pname'];
    $pdesc =  $_POST['add_pdesc'];
    $pkeyw =  $_POST['add_pkeyw'];
    $pbrand = $_POST['add_pform_brand'];
    $pcatg = $_POST['add_pform_category'];
    $pimg1 = $_FILES['add_pimg1'];
    $pimg2 = $_FILES['add_pimg2'];
    $pimg3 = $_FILES['add_pimg3'];
    $pprice = $_POST['add_pprice'];
    $pstock = $_POST['add_pstock'];
    $limit = $_POST['add_plimit'];
    
    //initialize variables
    $output =[];
    $output['field_error']=false;
    
    //verify product name
    $output['pname'] = verify($pname,'name',50);
    if($output['pname']['error']){
       $output['field_error']=true;    
    }else{
        
        //check if product already exist
        $sql = "SELECT * FROM products WHERE p_title='$pname'";
        
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
     $output['pimg1']=verify($pimg1,'image',0);
     if($output['pimg1']['error']){
        $output['field_error']=true;
     }
    
    
    //verfiy image 2 extension
    $output['pimg2']=verify($pimg2,'image',0);
    if($output['pimg2']['error']){
        $output['field_error']=true;
    }
    
    //verfiy image 3 extension
    $output['pimg3']=verify($pimg3,'image',0);
    if($output['pimg3']['error']){
        $output['field_error']=true;
    }     
    
    //verify product price
    $output['pprice'] = verify($pprice,'price',0);
    if($output['pprice']['error']){
        $output['field_error']=true;
     }    
    
    //verify product stock
    $output['pstock'] = verify($pstock,'stock',0);
    if($output['pstock']['error']){
        $output['field_error']=true;
     }  
     
    //verify product quantity limit per order
    $output['limit'] = verify($limit,'limit',0);
    if($output['limit']['error']){
        $output['field_error']=true;
     }         
        
     if($output['field_error']){
        mysqli_close($conn); 
        echo json_encode($output,JSON_PRETTY_PRINT);
    }else{
    
        //assigning folder to images in server
        $target_dir = 'images/';
        $img1_path = $target_dir.$pimg1['name'];
        $img2_path = $target_dir.$pimg2['name'];
        $img3_path = $target_dir.$pimg3['name'];
    
        //Enabling db server to store special characters in string
        $pname =mysqli_real_escape_string($conn, $pname);
        $pdesc =mysqli_real_escape_string($conn, $pdesc);
        $pkeyw =mysqli_real_escape_string($conn, $pkeyw);
    
        $sql = "INSERT INTO products (p_title,p_description,keywords,brand_id,category_id,p_image1,p_image2,p_image3,p_price,`date`) 
                VALUES ('$pname','$pdesc','$pkeyw',$pbrand,$pcatg,'$img1_path','$img2_path','$img3_path',$pprice,NOW())";       
    
        $result=mysqli_query($conn,$sql) or die("Failed to perform query");

        //Retrive product id
        $sql = "SELECT  p_id FROM products where p_title = '$pname'";
        $result = mysqli_query($conn,$sql) or die("Failed to perform query");
        $row = mysqli_fetch_assoc($result);
        $product_id = $row['p_id'];

        //check if stock is available
        if($pstock > 0){
            $stock_status = "Available";
        }else{
            $stock_status = "Unavailable";
        }

        //add product to invertory table
        $sql = "INSERT INTO inventory (product_id, stock, purchased, `status`,order_limit) VALUES ($product_id,$pstock,0,'$stock_status',$limit)";
        $result = mysqli_query($conn,$sql) or die("Failed to perform query");

        //upload images to server
        move_uploaded_file($pimg1['tmp_name'],"../".$img1_path); 
        move_uploaded_file($pimg2['tmp_name'],"../".$img2_path); 
        move_uploaded_file($pimg3['tmp_name'],"../".$img3_path); 
    
        $output['form_msg']='Record successfully inserted. Add another product.';
        mysqli_close($conn);
        echo json_encode($output,JSON_PRETTY_PRINT);  
    }
}else{
    //    rediect host to login page
    header("location:http://localhost/ecommerce/admin/admin_login.php");
}


?>
