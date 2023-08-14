<?php


// Start of validation

    //filter_var
    //It filters variables
    //It is used against user input

    // $var = .01;
    // if(filter_var($var,FILTER_VALIDATE_FLOAT,array('options'=>array('min_range'=>.1, 'max_range'=>10000)))){
    //     echo "<br> variable is float";
    // }else{
    //     echo "<br> price is outside defined limit";
    // }

    //preg_match
    //It uses regular expression to match with variable
    // preg_match('/^[a-zA-Z]+[ ,.\#+\-\/&a-zA-Z0-9]*$/i',$x);

//End of validation

//Start of SQL injection

    // mysqli_real_escape_string
    //It prevents sql injection
    // $pname =mysqli_real_escape_string($conn, $pname);

// End of SQL injection

//Start of XSS Attacks
    //htmlentities
    //It converts special characters into encoded form.
    //It prevents XSS attacks.
    // It prevents html attacks where user input is display in browser

    // $str = "<b> 'hello'</b>";
    // $str_en = htmlentities($str);
    // echo "<br>$str_en<br>";

    // $email = "raheel'<@gmail.com";
    // if(filter_var($email,FILTER_VALIDATE_EMAIL)){
    //     echo "<br>email is valid<br>";
    // }else{
    //     echo "<br>email is not valid<br>";
    // }
    // $email_encode = htmlentities($email);
    // echo "<br>$email_encode<br>";

    //Display all sepecial characters encoded form using htmlentities
    // echo "<pre>";
    // print_r(get_html_translation_table(HTML_ENTITIES));
    // echo "</pre>";

//End of XSS Attacks


//Prevent Bot login

//Start of Password Encoding/conversion

    //MD5. Message Digest 5
    //It converts password into 32 byte hexa number by default
    //It takes two parameters. First variable second raw. RAW is false by default. If it is true
    //then it converts variable into 16 characters binary format

    // echo "<br>MD5<br>";
    // $password = 'hello';
    // $password_md5 = md5($password);
    // $raw = true;
    // echo "<br>$password_md5<br>";
    // $password_md5 = md5($password,$raw);
    // echo "<br>$password_md5<br>";

    //SHA1. US secure hash 1
    //It more secure than MD5
    //It takes two parameters. First is variable second is RAW.
    //By default raw is false and variable is converted into 40 bytes hex number.
    //If it is true than it converts variable to 20 characters binary format
    // echo "<br>SHA1<br>";
    // $password = 'hello';
    // $password_sha1 = sha1($password);
    // $raw = true;
    // echo "<br>$password_sha1<br>";
    // $password_sha1 = sha1($password,$raw);
    // echo "<br>$password_sha1<br>";

    //verify password
    // if(md5($password,TRUE)==$password_md5){
    //     echo "<br>password matched<br>";
    // }

    //password_hash()
    //It is more secure than md5 and sha1 
    // password_hash($password,PASSWORD_DEFAULT);   
    //verify password
    // password_verify($password,$stored_hash);

//End of Password Encoding/conversion 

//Start of cookies

    // session_start();
    // $params = session_get_cookie_params();
    //set cookie parameters for localhost
    //name
    //value
    //time after which it expires. It should include time()
    //path from which cookie can be accessed./ means it can be accessed from any page on website

    //next parameters are for online website
    // $session_name = session_name();
    // $session_value = session_id();
    // echo "<br>$session_name<br>";
    // echo "<br>$session_value<br>";
    // setcookie(session_name(),session_id(),time()+10,"/");

    //If hackers access page without session then it should redirect them to user index page
    //if(isset($_SESSION['user_name'])){
        // ...
    // }else{
        // header("location:http//localhost/ecommerce/index.html")
    // }

    //Question. Can hacker be prevented from accessing user registration page through url
    // http://localhost/ecommerce/rest_api/user/api_register_user.php
    //Can following code help?
        // header('Access-Control-Allow-Origin:*');
        // header('Access-Control-Allow-Methods:POST'); 

//End of cookies



// echo "<pre>";
// print_r($params);
// echo "</pre>";




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="container">
        <!-- <img src='<?php echo "$image_path_encode" ?>' alt="logo.jpg"> -->
    </div>
</body>
</html>