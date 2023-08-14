<?php 

header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Access-Control-Allow-Methods,Access-Control-Allow-Origin,Content-Type,Authorization,X-Requested-With');


//connecting with DB server
include "../../include/config.php";


function pagination(){
    global $r;
    global $output;
    $class ="";
    for($i=1;$i<=$r['total_pages'];$i++)
    {
        if($i ==$r['page_no']){
            $class = "active_page"; 
        }else {$class = "";}
        $output['pagination'].="<a class=\"$class\" href=\"\" id=\"{$i}\">$i</a>";
    }
}

function get_records(){
    global $r;
    global $output;
    global $records;
    $r['total_pages'] =ceil($r['total_records'] /$r['limit']);
    
    //if admin has deleted record than page no will be updated
    if($r['page_no']  > $r['total_pages']){
        $r['page_no'] = $r['total_pages'];
    }    
    
    $r['offset'] = ($r['page_no'] -1)*$r['limit']; 
    $loop_end = $r['offset']+$r['limit'];
    if($loop_end > $r['total_records']){
        $loop_end = $r['total_records'];
    }
    
    for($i=$r['offset'];$i<$loop_end;$i++){
        $output['data'][]=$records[$i];
        
    }   

    if($r['total_pages']>1){
        pagination();
    }
    
}

$data = json_decode(file_get_contents("php://input"),true);

$output = [];
$output['pagination']='';
$output['error']=false;
$r=[];
$r['limit'] = 8;
$r['page_no'] = $data['page_no'];
$r['total_records'] = 0;
$r['total_pages'] =0;
$r['offset'] = 0;  
$records=[];


switch($data['search_type']){
    case 'all':

        //calculating total pages and page no
        $sql = "SELECT p_id, p_title, p_description,p_image1, p_price, `status` FROM products
                INNER JOIN inventory ON p_id = product_id";
        $result = mysqli_query($conn,$sql) or die("Error query failed"); 
        $r['total_records']  = mysqli_num_rows($result);

        if($r['total_records']  > 0){

            $records= mysqli_fetch_all($result,MYSQLI_ASSOC);

            //output number of records based on pagination
            get_records();

            //close db connection
            mysqli_close($conn);

            //free results
            mysqli_free_result($result);

            echo json_encode($output,JSON_PRETTY_PRINT);
        }else{
            $output['error']=true;
            $output['message']="No record found";

            //close db connection
            mysqli_close($conn);

            echo json_encode($output,JSON_PRETTY_PRINT);
        }
        break;

    case 'brand':

        $brand_id = $data['search_term'];

        //sql query to fetch all records
        $sql = "SELECT p_id, p_title, p_description,p_image1, p_price, `status` FROM products
                INNER JOIN inventory ON p_id = product_id WHERE brand_id = '$brand_id' ";        

        $result = mysqli_query($conn,$sql) or die('Failed to perform query');

        $r['total_records']  = mysqli_num_rows($result);              
        if($r['total_records']>0){

            $records= mysqli_fetch_all($result,MYSQLI_ASSOC);

            //output number of records based on pagination
            get_records();

            //close db connection
            mysqli_close($conn);

            //free results
            mysqli_free_result($result);

            echo json_encode($output,JSON_PRETTY_PRINT);

        }else{

            //close db connection
            mysqli_close($conn);

            echo json_encode(array('message'=>"No record found", "error"=>true),JSON_PRETTY_PRINT);  
        }
        break;

    case 'category':

        $category_id = $data['search_term'];

        //sql query to fetch all records
        $sql = "SELECT p_id, p_title, p_description,p_image1, p_price, `status` FROM products
                INNER JOIN inventory ON p_id = product_id WHERE category_id = '$category_id'"; 

        $result = mysqli_query($conn,$sql) or die('Failed to perform query');

        $r['total_records']  = mysqli_num_rows($result);              
        if($r['total_records']>0){

            $records= mysqli_fetch_all($result,MYSQLI_ASSOC);

            //output number of records based on pagination
            get_records();

            //close db connection
            mysqli_close($conn);

            //free results
            mysqli_free_result($result);

            echo json_encode($output,JSON_PRETTY_PRINT);        

        }else{

            //close db connection
            mysqli_close($conn);

            echo json_encode(array('message'=>"No record found", "error"=>true),JSON_PRETTY_PRINT);  
        }  
        break;
        
    case 'search':

        $search = $data['search_term'];
        //Secure db from sql injection
        $search_encode =mysqli_real_escape_string($conn, $search);

        //sql query to fetch all records
        $sql = "SELECT p_id, p_title, p_description,p_image1, p_price, `status` FROM products
                INNER JOIN inventory ON p_id = product_id WHERE keywords LIKE '%$search_encode%'"; 

        $result = mysqli_query($conn,$sql) or die('Failed to perform query');

        $r['total_records']  = mysqli_num_rows($result);              
        if($r['total_records']>0){

            $records= mysqli_fetch_all($result,MYSQLI_ASSOC);

            //output number of records based on pagination
            get_records();

            //close db connection
            mysqli_close($conn);

            //free results
            mysqli_free_result($result);

            echo json_encode($output,JSON_PRETTY_PRINT);              

        }else{

            //close db connection
            mysqli_close($conn);

            echo json_encode(array('message'=>"No record found", "error"=>true),JSON_PRETTY_PRINT);  
        }            

}


?>