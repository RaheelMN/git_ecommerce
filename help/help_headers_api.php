<?php


    header('Access-Control-Allow-Origin:http://localhost/ecommerce/help_header.php');
     header('Access-Control-Allow-Methods:POST');

    //Location:
    //It is used to redirect host to other page.
    //It is mostly used in session when host is not allowed to access resource without
    //permission
    // header('Location: http://localhost/ecommerce/index.html');

    //To generate Page Error
    // header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
    // http_response_code(404); 
    // header("HTTP/1.1 404 Not Found");
    // exit();

    //There should be no code before header functions including comments or server will
    //return error

    //----------Start of Cache headers----------------
    // To prevent cache use following code 

    //Pragma:
    //when user press refresh/reload. It forces cache to request new file althrough it has copy
    //  header('Pragma : no-cache'); 

    //Expires: it is old html header
    //Set expiry date that is clear. To prevent caching it should be in past
    // header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');

    //Cache-control: It can have multiple properties
    //cache-control: max-age must-revalidate.
    //It is time period after page is retrived from server after which cache request refresh page from server.
    //It is in seconds. I.E if max-age = 10; then cache request new page after 10 seconds
    //must-revalidate. it is used in combination with max-age.
    //If connection with server is disconnected and page has expired than browser allow cache to load stale
    //page. This command prevents it. It caused HTTP to validate resource from server and if new file is
    //present it is cached
    // header('Cache-Control: max-age=0 must-revalidate');

    //cache control: Public/Private
    //Public: it allows Content Delivery Networks(CDNs) to cache page for hosts for fast delivery. 
    //CDNs are proxy server that charge websites to cache their contents and pay ISP to store their 
    //data on them
    //Private: only host can cache file
    // header('Cache-Control: public');

    //cache control: no-cache
    //when host request page then HTTP first validates the page from server. If server has no new resource
    //then http uses cache respose. No cache means HTTP performs validation for each request but
    //resource is cached.
    // header('Cache-Control: no-cache');

    //Cache Control no store
    //This commands causes cache to not store server response. 
    // header('Cache-Control: no-store');

    //----------End of Cache headers----------------

    //Content Type
    //The Content-Type header is used to indicate the media type of the resource.
    //If server is sending html file then media type will be text/html
    //By default server sends text/html
    //If server sends json string then it has to be specified in header
    //header('Content-Type: application/json');


// GET
if(isset($_GET)){
    echo "<br>Global variable \$_GET is set<br>";
    echo "<pre>";
    print_r($_GET);
    echo "</pre>";
    if(empty($_GET)){
        echo "<br>Global variable \$_GET is empty<br>";
    }    
}

// POST
// if(isset($_POST)){
//     echo "<br>Global variable \$_POST is set<br>";
//     echo "<pre>";
//     print_r($_POST);
//     echo "</pre>";
//     if(empty($_POST)){
//         echo "<br>Global variable \$_POST is empty<br>";
//     }    
// }


//file_get_contents
//file_get_contents() is the preferred way to read the contents of a file into a string.

//php:input
//It is a read-only stream that allows you to read raw data from the request body.
//It retreives data from post request. 
// $data = file_get_contents("php://input");

//If browser has sent object in json format then it has to be decoded  with json_decode
// function with second parameter of function set to true. 
// $data = json_decode(file_get_contents("php://input"),true);

    // $output['message'] = 'hello world';
    // $output['error']='false';
    // //return string
    // echo json_encode($output,JSON_PRETTY_PRINT);

?>