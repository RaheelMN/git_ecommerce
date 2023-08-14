<?php

echo "<pre>";
print_r($_SERVER);
echo "</pre>";

$myfile = "index.html";
if(is_file($myfile)){
    echo "<br> file $myfile is regular file </br>";
}else{
    echo "<br> file $myfile is not regular file </br>";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Hello world</p>
    <a href="http://localhost/web_ecommerce/rough.php">Click me!</a>
</body>
</html>