<?php 

    //connecting with DB server
    include "include/config.php";

    //verification function
    include "include/validate.php";

    //retrieve variable values
    $pname = $_POST['add_pname'];
    $pdesc = $_POST['add_pdesc'];
    $pkeyw = $_POST['add_pkeyw'];
    $pbrand = $_POST['add_pform_brand'];
    $pcatg = $_POST['add_pform_category'];
    $pimg1 = $_FILES['add_pimg1'];
    $pimg2 = $_FILES['add_pimg2'];
    $pimg3 = $_FILES['add_pimg3'];
    $pprice = $_POST['add_pprice'];

    //initialize variables
    $output =[];
    $form_error=false;
    $field_error = false;

    //verify product name
    $output['pname'] = verify($pname,'name',20);
    if($output['pname']['error']){
        $field_error=true;    
    }else{
        
        //check if product already exist
        $sql = "SELECT * FROM products WHERE name='$pname'";
        
        $result = mysqli_query($conn,$sql) or die('Failed to fetch all records from DB');
        
        //if record already exits
        if(mysqli_num_rows($result)>0){
            $output['pname']=array("error"=>true,'message'=>"Record already exist");
            mysqli_free_result($result);
            $field_error = true;
        }else{
            $output['pname']['error']=false;
        }
    }

    //verify product description
    $output['pdesc'] = verify($pdesc,'desc',50);
    if($output['pdesc']['error']){
        $field_error=true;
    } 

    //verify product keywords
    $output['pkeyw'] = verify($pkeyw,'keyw',50);
    if($output['pkeyw']['error']){
        $field_error=true;
    }     

    //verfiy image 1 extension
     $output['pimg1']=verify($pimg1['name'],'image',0);
     if($output['pimg1']['error']){
        $field_error=true;
     }


    //verfiy image 2 extension
    $output['pimg2']=verify($pimg2['name'],'image',0);
    if($output['pimg2']['error']){
       $field_error=true;
    }

    //verfiy image 3 extension
    $output['pimg3']=verify($pimg3['name'],'image',0);
    if($output['pimg3']['error']){
       $field_error=true;
    }     

    //verify product price
    $output['pprice'] = verify($pprice,'price',0);
    if($output['pprice']['error']){
        $field_error=true;
     }    
    
    
     if($field_error){
        $output['field_error']=true;
        mysqli_close($conn); 
        echo json_encode($output,JSON_PRETTY_PRINT);
    }else{
        $target_dir = 'images/';
        $img1_path = $target_dir.$pimg1['name'];
        $img2_path = $target_dir.$pimg2['name'];
        $img3_path = $target_dir.$pimg3['name'];
        $sql = "INSERT INTO products (name,description,keywords,brand,category,image1,image2,image3,price) 
                VALUES ('$pname','$pdesc','$pkeyw','$pbrand','$pcatg','$img1_path','$img2_path','$img3_path',$pprice)";       

        $result=mysqli_query($conn,$sql);
        if(!$result){
            $output['field_error']=false;
            $output['form_error']=true;
            $output['form_msg']='Failed to insert record in DB';

            mysqli_close($conn);
            echo json_encode($output,JSON_PRETTY_PRINT);
        }

        //upload images to server
        move_uploaded_file($pimg1['tmp_name'],$img1_path); 
        move_uploaded_file($pimg2['tmp_name'],$img2_path); 
        move_uploaded_file($pimg3['tmp_name'],$img3_path); 

        $output['field_error']=false;
        $output['form_error']=false;
        $output['form_msg']='Record successfully inserted.';
        mysqli_close($conn);
        echo json_encode($output,JSON_PRETTY_PRINT);  

    }

?>
