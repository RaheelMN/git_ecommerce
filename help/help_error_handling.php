<?php

    //Display error:
    //Display errors 1. Development stage
    //Display errors 0. Production stage
    //Setting display error in php.ini
    //display_errors=On 
    // It can be set perminantly in php.ini. Not possible on shared server
    //Setting display error in script php file
    //  ini_set('display_errors', 1); 
    //Setting it in ini_set function is bad practice because
    //It cannot catch fatal error as ini_set is set at runtime.
    //Setting display error in htaccess file
    // php_flag display_errors on
    //It can be set in htaccess file so that both production and development
    // websites have seperate settings.(recommended)

    //display startup errors:
    // Development Value: On
    // Production Value: Off
    // The display of errors which occur during PHP's startup sequence are handled
    // separately from display_errors. It should be off in production to prevent
    //hackers from getting system information
    //Setting display_startup_errors in php.ini
    //display_startup_errors=On
    //Setting display_startup_errors in script file
    // ini_set('display_startup_errors', 1);
    //Setting display_startup_errors in htaccess
    // php_flag display_errors on

    // LOG ERRORS
    //  Default Value: Off
    //  Development Value: On
    //  Production Value: On
    //  Besides displaying errors, PHP can also log errors to locations such as a
    //  server-specific log, STDERR, or a location specified by the error_log
    //  directive found below. While errors should not be displayed on productions
    //  servers they should still be monitored and logging is a great way to do that.
    // Setting display_startup_errors in php.ini
    // log_errors=On

    //Error Reporting:  
    //     Value	Constant	Description
    // 1	E_ERROR	Fatal run-time errors.
    // 2	E_WARNING	Run-time warnings (non-fatal errors).
    // 4	E_PARSE	Compile-time parse errors.
    // 8	E_NOTICE	Run-time notices.
    // 16	E_CORE_ERROR	Fatal errors that occur during PHP's initial startup.
    // 32	E_CORE_WARNING	Warnings (non-fatal errors) that occur during PHP's initial startup.
    // 64	E_COMPILE_ERROR	Fatal compile-time errors.
    // 128	E_COMPILE_WARNING	Compile-time warnings (non-fatal errors).
    // 256	E_USER_ERROR	User-generated error message.
    // 512	E_USER_WARNING	User-generated warning message.
    // 1024	E_USER_NOTICE	User-generated notice message.
    // 2048	E_STRICT	If Enabled PHP suggests changes to your code to ensure interoperability and forward compatibility of your code.
    // 4096	E_RECOVERABLE_ERROR	Catchable fatal error.
    // 8192	E_DEPRECATED	Run-time notices.
    // 16384	E_USER_DEPRECATED	User-generated warning message.
    // 32767	E_ALL	All errors and warnings, E_STRICT

    // Error Reporting in php.ini setting (Cannot use in shared server)
    // ; error_reporting
    // ;   Development Value: E_ALL
    // ;   Production Value: E_ALL & ~E_DEPRECATED & ~E_STRICT 

    //Error Reporting setting in script php file
    // error_reporting(E_ALL); //development setting
    error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);     
    //Examples
    //Report all
    // error_reporting(E_ALL);
    //Report None
    // error_reporting(0);
    //Report Fatal and Warning 
    // error_reporting(E_ERROR | E_WARNING);
    // Report all errors except E_NOTICE
    // error_reporting(E_ALL & ~E_USER_NOTICE);


    //----------End of PHP errors Settings-------------------

    //Set time Zone
    date_default_timezone_set("Asia/Karachi");

    // register_shutdown_function
    //This function is used catch php errors at application shutdown.
    //fatal error are not caught by set_error_handler function
    register_shutdown_function(function ()
    {
        $error = error_get_last();
        if ($error !== null) {
            // echo "<pre>";
            // print_r($error);
            // echo "</pre>"; 
            $start = "--register_shutdown-- ";
            $error = $start.implode(" -- ",$error);
            error_log($error);
            exit();            
        }
    });

    //Set function for exception handling. 
    //Argument is name of callback function to which exceptions are thrown by parser
    // set_exception_handler('myException'); 

    //Set function for error handling
    //Its argument is a callback function to which error code is sent by parser
    set_error_handler('myErrorHandler'); 

    //Create function used in set_exception_handler function
    //Its argument is object of class Exception
    function myException($e) {
        $date = date('d-m-y h:i:s');
         $error_msg = "-- myException -- Error[{$e->getCode()}] in line: ".$e->getLine()."-- File Name: " .$e->getFile()." -- Message:  ".$e->getMessage();
 
        //Debugging Mode
        echo "<br> $error_msg";
        error_log($error_msg);
        exit();

        // Production Mode
        // http_response_code(500); 
        // echo ' <p style="text-align: center;font-size: 24px;color: red;margin: 100px 0px;">Error Code 500: Database Server Error</p>';      
        // // header("location: http://".$_SERVER['SERVER_NAME']."/web_ecommerce/errors1/db_server_error.html");
        // exit();
      }
      
      //Create function used in set_error_handler
      //arguments are error number,message, file, line
      function myErrorHandler($errno,$errstr, $errfile, $errline){

         $error_msg = "-- myErrorHandler -- Error[$errno] in line: ".$errline."-- File Name: " .$errfile." -- Message:  ".$errstr;

         //Debugging Mode
          echo "<br> $error_msg";
          error_log($error_msg);
        
        // Production Mode Type 2
        //Send Warining to error log file and exit
        // throw new ErrorException($errstr, $errno,$errno,$errfile,$errline);
      }

      // FATAL ERRORS            //uses set_exception_handler
      //  $a = 2/0;    //divide by zero
      // sum(2);      //Calling function without definition
      $array = "hello";        //intialize string
      $array['name']='rahel';  //store array in string
      // $components = parse_url(); //Calling function with different arguments


    //   E_USER_NOTICE      //uses set_error_handler
    //   1024	E_USER_NOTICE	User-generated notice message.  
      // trigger_error('This is error');


    // WARNINGS             //uses set_error_handler
    // 2	E_WARNING	Run-time warnings (non-fatal errors).
      include "jim.php"; //include file that doesnot exist
    // $parts = explode(",", $integers); //pass variable as argument that doesnot exist
    
    
    echo "<br>hello world";

    // Mysqli report settings
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
      // $conn = mysqli_connect('localhost','root','i','web_ecommerce') or die("Failed to connect to database");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rough</title>
</head>
<body>
    
</body>
</html>