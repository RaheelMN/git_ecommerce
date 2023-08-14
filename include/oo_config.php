<?php
//MYSQLI OBJECT
$server_name = "localhost";
$user_name = "root";
$password = "";
$db_name = "new_ecommerce";

try{

    $conn = new mysqli($server_name,$user_name,$password,$db_name);
}catch(Exception $e){
    $date = date('d-m-y h:i:s');
    $error_msg = "\n$date -- Error in line: ".$e->getLine()."-- File Name: " .$e->getFile()." -- Message:  ".$e->getMessage();
    $file = "error_log.txt";
    if(file_exists($file)){       
        //append text
        $fopen = fopen($file,'a+');
        fwrite($fopen,$error_msg);
        fclose($fopen);  
    }
    die("Error: Failed to connect with database");
}    


?>