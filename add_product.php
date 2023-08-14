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
    $ver = [];
    $form_error='false';

    //verify product name
    $ver[] = verify($pname,'name',20);
    if($ver[0]['status']=='false'){
        $output['pname']['status']=$ver[0]['status'];
        $output['pname']['message']=$ver[0]['message'];
       
        //form has error
        $form_error = 'true';

        //clear result
        $ver=[];
    }else{
        //check if product already exist

        //clear result
        $ver=[];

        //sql query to check if record already exits
        $sql = "SELECT * FROM products WHERE name='$pname'";

        //execute query
        $result = mysqli_query($conn,$sql) or die('Failed to fetch all records from DB');
    
        //if record already exits
        if(mysqli_num_rows($result)>0){
            $output['pname']=array('message'=>"Record already exist", "status"=>"false");
            mysqli_free_result($result);

            //form has error
            $form_error = 'true';
        }else{
            $output['pname']=array("status"=>"true");
        }
    }

    //verify product description
    $ver[] = verify($pdesc,'desc',50);
    if($ver[0]['status']=='false'){
        $output['pdesc']['status']=$ver[0]['status'];
        $output['pdesc']['message']=$ver[0]['message'];
        
        //form has error
        $form_error = 'true';

        //clear result
        $ver=[];
    }

    echo json_encode($output,JSON_PRETTY_PRINT);





?>
