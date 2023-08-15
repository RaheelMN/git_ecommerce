<?php 

    header('Content-Type: application/json');

    //Exception handling Settings
    require_once "../../include/error_handling.php"; 
    ini_set('error_log', "../../log/error_log.txt");           

    //connecting with DB server
   require_once "../../include/config.php";

   //retrieving ip address
   require_once "../../include/get_ip_address.php";

    function calculate_navbar_cart_info(){
        global $conn;
        global $client_ip;
        global $output;

        //calculate number of items user has in cart and their total cost
        $sql = "SELECT sum(quantity) as total_quantity, sum(total_cost) as total_cost FROM cart_detail where ip_address = '$client_ip'";
        $result = mysqli_query($conn,$sql);
        $record = mysqli_fetch_assoc($result);
        
        //If user has items in cart then
        if(!is_null($record['total_quantity'])){
            $output['num_of_items']= $record['total_quantity'];
        }

        if(!is_null($record['total_cost'])){
            $output['total_price']= $record['total_cost'];
        }
        
    }

    //Retrive requested data
    $data = json_decode(file_get_contents("php://input"),true);
    $product_id = $data['product_id'];
    $op_type = $data['op_type'];
    $quantity= $data['quantity'];
    $records = $data['records'];

    //initialize output variables
    $output =[];
    $output['error']=false;
    $output['num_of_items']=0;
    $output['total_price']=0;

    //retrieve user ip address
    $client_ip = get_ip_address();


    switch($op_type){

        //check if user has opened website or refreshed page
        case 'refresh':

            calculate_navbar_cart_info();

            // close db connection 
            mysqli_close($conn);

            //return $output
            echo json_encode($output,JSON_PRETTY_PRINT);
            exit();
        
        case 'add':
            //check if user has already put product in cart
            $sql = "SELECT * FROM cart_detail where ip_address = '$client_ip' and product_id = $product_id";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result)>0){

                $output['error'] = true;
                $output['message']="Product is already in cart";

                // close db connection 
                mysqli_close($conn);

                //return $output                
                echo json_encode($output,JSON_PRETTY_PRINT);        
            }else{

                //Retrive product price against product id
                $sql = "SELECT p_price FROM products where p_id = $product_id";
                $result = mysqli_query($conn,$sql);
                $record = mysqli_fetch_assoc($result);

                $sql = "INSERT INTO cart_detail (product_id,ip_address,quantity,total_cost) VALUES ($product_id,'$client_ip',$quantity,{$record['p_price']})";
                $result = mysqli_query($conn,$sql);

                calculate_navbar_cart_info();
                $output['message']="Product added to cart.";
                
                // close db connection 
                mysqli_close($conn);

                //return $output   
                echo json_encode($output,JSON_PRETTY_PRINT);
            }
            break;

        case 'update':

                foreach($records as $value){

                    //Retrive product price against product id
                    $sql = "SELECT p_price FROM products inner join cart_detail on p_id = product_id where cart_id ={$value[0]}";
                    $result = mysqli_query($conn,$sql);
                    $record = mysqli_fetch_assoc($result);

                    $sql = "UPDATE cart_detail SET quantity={$value[1]}, total_cost=($value[1]*{$record['p_price']}) where cart_id={$value[0]}";
                    $result = mysqli_query($conn,$sql);
                }

                calculate_navbar_cart_info();
                $output['message']="Record updated.";
                
                // close db connection 
                mysqli_close($conn);

                //return $output   
                echo json_encode($output,JSON_PRETTY_PRINT);

            break;

            case 'delete':
                           
                $str = implode(",",$records);
                $sql = "DELETE FROM cart_detail WHERE cart_id IN ({$str})";
                $result = mysqli_query($conn,$sql);

                calculate_navbar_cart_info();
                $output['message']="Record deleted.";
                
                // close db connection 
                mysqli_close($conn);

                //return $output   
                echo json_encode($output,JSON_PRETTY_PRINT);

                break;
                
            case 'table':

                calculate_navbar_cart_info();

                $sql = "SELECT cart_id,p_title,p_image1,quantity,p_price,total_cost,
                LEAST(stock,order_limit) AS purchase_limit FROM products AS p
                INNER JOIN cart_detail c ON p.p_id = c.product_id
                INNER JOIN inventory i ON p.p_id = i.product_id
                 where ip_address = '$client_ip'";
                $result = mysqli_query($conn,$sql);

                if(mysqli_num_rows($result)>0){

                    //calculate total price and number of items
                    $output['data'] = mysqli_fetch_all($result,MYSQLI_ASSOC);
                    
                    // close db connection 
                    mysqli_close($conn);

                    //return $output   
                    echo json_encode($output,JSON_PRETTY_PRINT);
                }else {
                    $output['error'] = true;//is there error in executing query
                    $output['message']="No items in cart";
                    
                    // close db connection 
                    mysqli_close($conn);

                    //return $output   
                    echo json_encode($output,JSON_PRETTY_PRINT);
                }                                             
    }

?>