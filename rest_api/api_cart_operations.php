<?php 

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Access-Control-Allow-Methods,Access-Control-Allow-Origin,Content-Type,Authorization,X-Requested-With');


    //connecting with DB server
    include "../include/config.php";

    function get_ip_address(){
        $ip = "";
        //When ip is from shared internet
        if(isset($_SERVER['HTTP_CLIENT_IP'])){
            $ip = $_SERVER['HTTP_CLIENT_IP'];
            //when ip is from proxy server
        }elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }elseif(isset($_SERVER['REMOTE_ADDR'])){
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    function calculate_navbar_cart_info(){
            global $conn;
            global $client_ip;
            global $output;
            //calculate number of items user has in cart
            $sql = "SELECT * FROM cart_detail where ip_address = '$client_ip'";
            $result = mysqli_query($conn,$sql);
            $output['num_of_items']= mysqli_num_rows($result);

            //Calculate total price of items in cart
            $sql = "select p.p_price from products p inner join cart_detail c on p.p_id = c.product_id where c.ip_address = '$client_ip'";
            $result = mysqli_query($conn,$sql);
            $price_column = mysqli_fetch_all($result,MYSQLI_ASSOC);
            foreach($price_column as $key){
                $output['total_price'] += $key['p_price'];
            }
    }

    $data = json_decode(file_get_contents("php://input"),true);
    $product_id = $data['product_id'];
    $op_type = $data['op_type'];
    $quantity= $data['quantity'];
    $records = $data['records'];
    $output =[];
    $output['error']=false;
    $output['num_of_items']=0;
    $output['total_price']=0;
    $client_ip = get_ip_address();

    switch($op_type){
        //check if user has opened website or refreshed page
        case 'refresh':
            calculate_navbar_cart_info();
            echo json_encode($output,JSON_PRETTY_PRINT);
            break;
        
        case 'add':
            //check if user has already put product in cart
            $sql = "SELECT * FROM cart_detail where ip_address = '$client_ip' and product_id = $product_id";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                $output['error'] = true;//is there error in executing query
                $output['message']="Product is already in cart";
                echo json_encode($output,JSON_PRETTY_PRINT);        
            }else{
                $sql = "INSERT INTO cart_detail (product_id,ip_address,quantity) VALUES ($product_id,'$client_ip',$quantity)";
                if(mysqli_query($conn,$sql)){
                    calculate_navbar_cart_info();
                    $output['message']="Product added to cart.";
                    echo json_encode($output,JSON_PRETTY_PRINT);
                }
                else {
                    $output['error'] = true;//is there error in executing query
                    $output['message']="Cannot add product to cart. DB error";
                    echo json_encode($output,JSON_PRETTY_PRINT);
                } 
            }
            break;

        case 'update':

                foreach($records as $value){
                    // echo "<br>id: {$value[0]}. quantity: {$value[1]}<br>";
                    $sql = "UPDATE cart_detail SET quantity={$value[1]} where cart_id={$value[0]}";
                    if(!mysqli_query($conn,$sql)){
                        $output['error'] = true;//is there error in executing query
                        $output['message']="Cannot update record";
                        echo json_encode($output,JSON_PRETTY_PRINT);
                    }
                }
                $output['message']="Record updated.";
                echo json_encode($output,JSON_PRETTY_PRINT);
            break;

            case 'delete':
                           
                $str = implode(",",$records);
                $sql = "DELETE FROM cart_detail WHERE cart_id IN ({$str})";
                if(mysqli_query($conn,$sql)){
                    $output['message']="Record deleted.";
                    echo json_encode($output,JSON_PRETTY_PRINT);
                }else{
                    $output['error'] = true;//is there error in executing query
                    $output['message']="Cannot delete record";
                    echo json_encode($output,JSON_PRETTY_PRINT);   
                }   
                break;
                
            case 'table':

                $sql = "select c.cart_id,p.p_title,p.p_image1,c.quantity,p.p_price from products p inner join cart_detail c on p.p_id = c.product_id where c.ip_address = '$client_ip'";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    $output['data'] = mysqli_fetch_all($result,MYSQLI_ASSOC);
                    echo json_encode($output,JSON_PRETTY_PRINT);
                }else {
                    $output['error'] = true;//is there error in executing query
                    $output['message']="No items in cart";
                    echo json_encode($output,JSON_PRETTY_PRINT);
                }                
                              

    }

?>