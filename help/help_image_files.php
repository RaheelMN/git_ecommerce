<?php

//SUPER GLOBAL VARIABLES
// SERVER
if(isset($_SERVER)){
    echo "<br>Global variable \$_SERVER is set<br>";
    echo "<pre>";
    print_r($_SERVER);
    echo "</pre>";
    if(empty($_SERVER)){
        echo "<br>Global variable \$_SERVER is empty<br>";
    }    
}

// SESSION
// if(isset($_SESSION)){
//     echo "<br>Global variable \$_SESSION is set<br>";
//     echo "<pre>";
//     print_r($_SESSION);
//     echo "</pre>";
//     if(empty($_SESSION)){
//         echo "<br>Global variable \$_SESSION is empty<br>";
//     }    
// }

// COOKIE
// if(isset($_COOKIE)){
//     echo "<br>Global variable \$_COOKIE is set<br>";
//     echo "<pre>";
//     print_r($_COOKIE);
//     echo "</pre>";
//     if(empty($_COOKIE)){
//         echo "<br>Global variable \$_COOKIE is empty<br>";
//     }    
// }

// GET
// if(isset($_GET)){
//     echo "<br>Global variable \$_GET is set<br>";
//     echo "<pre>";
//     print_r($_GET);
//     echo "</pre>";
//     if(empty($_GET)){
//         echo "<br>Global variable \$_GET is empty<br>";
//     }    
// }

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

// FILES
// if(isset($_FILES)){
//     echo "<br>Global variable \$_FILES is set<br>";
//     if(empty($_FILES)){
//         echo "<br>Global variable \$_FILES is empty<br>";
//     }else{
        
//         $image = $_FILES['image'];

//         echo "<pre>";
//         print_r($image);
//         echo "</pre>";

//         if($image['size']>10000){
//             echo "<br>Error image size greater then 10kb<br>";
//         }else{
//             echo "<br>Image size is less then 10kb<br>";

//         }

//         if($image['error']){
//             echo "<br>Error uploading file<br>";   
//         }else{
//             echo "<br>No Error uploading file<br>";   
            
//         }

//         $pathinfo = pathinfo($image['name']);
//         $image_extension = $pathinfo['extension'];
//         echo "<pre>";
//         print_r($pathinfo);
//         echo "</pre>";
//         echo "<br>Image extension $image_extension<br>";

//     }


// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" id="">
        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>