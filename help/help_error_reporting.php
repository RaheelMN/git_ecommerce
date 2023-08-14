<?php
//MYSQLI ERROR FUNCTIONS

//Error functions can be used in die() function. There are two type of error functions for db connection
//1. mysqli_connect_error
//  It display error message when connection fails


$db_name = "test";
$server_name = "localhost";
$user_name = "roo";
$password = "";

// first of all set PHP error reporting in general
// in order to be sure we will see every error occurred in the script
ini_set('display_errors',1);
error_reporting(E_ALL);

/*** THIS! ***/
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
/*** ^^^^^ ***/
class ee extends Exception{

}
try{

    try{
    
        $conn = new mysqli($server_name,$user_name,$password,$db_name);
    }
    catch(Exception $e){
        throw new ee($e->getMessage());
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
}
catch(ee $ex){
    die('You died in ee: '.$ex->getMessage());
}



?>