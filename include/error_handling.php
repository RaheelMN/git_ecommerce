<?php

    // Error Reporting 
    // ;   Development Value: E_ALL
    // ;   Production Value: E_ALL & ~E_DEPRECATED & ~E_STRICT
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
    //Error Reporting setting 
    error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);     

    //Set time Zone
    date_default_timezone_set("Asia/Karachi");

    //Set function for exception handling. 
    //Argument is name of callback function to which exceptions are thrown by parser
    set_exception_handler('myException'); 

    //Set function for error handling
    //Its argument is a callback function to which error code is sent by parser
    set_error_handler('myErrorHandler'); 

    //Create function used in set_exception_handler function
    //Its argument is object of class Exception
    function myException($e) {
        $code = $e->getCode();
         $error_msg = "-- myException -- Error[$code] in line: ".$e->getLine()."-- File Name: " .$e->getFile()." -- Message:  ".$e->getMessage();
        $error_msg = htmlentities($error_msg);
        //Debugging Mode 
        // echo "$error_msg";
        // error_log($error_msg);
        // exit();

        // Production Mode
        // error_log($error_msg);
        http_response_code(500); 
        echo ' <p style="text-align: center;font-size: 24px;color: red;margin: 100px 0px;">Error Code 500: Database Server Error</p>';      
        exit();        
      }
      
      //Create function used in set_error_handler
      //arguments are error number,message, file, line
      function myErrorHandler($errno,$errstr, $errfile, $errline){

         $error_msg = "-- myErrorHandler -- Error[$errno] in line: ".$errline."-- File Name: " .$errfile." -- Message:  ".$errstr;

         //Debugging Mode
          echo "<br> $error_msg";
          error_log($error_msg);
        
        // Production Mode Type 1
        // error_log($error_msg);
        //Send Warining to error log file and exit

        // Production Mode Type 2
        // throw new ErrorException($errstr, $errno,$errno,$errfile,$errline);
      }


?>
