<?php

// try {
//     $conn = NEW PDO("mysql:host=localhost;dbname=test",'root',"");

//     $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $err) {
//     echo "Error: ".$err->getMessage();
//     exit();
// }

// try {

    //Unsafe way to insert input data into server as used in mysqli
    // $sql = "INSERT INTO stock (product_id) VALUES (1)";
    // $result = $conn->query($sql);


    // $sql1 = "INSERT INTO stock (product_id) VALUES (:id)";

    //prepare statment by parameter name
    // $result = $conn->prepare($sql1);
    // $result->bindParam(':id',$id);
    // $id = 12;
    // $result->execute();

    // $sql = "INSERT INTO stock (product_id,`name`) VALUES (:id, :nam)";
    // $stmt = $conn->prepare($sql);
    // $stmt->execute(array(":id"=>6,":nam"=>"man'soor"));


    // $stmt = $conn->query("SELECT * FROM stock");
    // $output = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // echo "<pre>";
    // print_r($output);
    // echo "</pre>";

// } catch (PDOException $err1) {
//     echo "Error in sql query: ".$err1->getMessage();
// }

?>


<?php

$conn = mysqli_connect("localhost","root","","new_ecommerce");
$sql = "call check_delete_category(9,@out)";
$result = mysqli_query($conn,$sql);
// var_dump($result);
// $sql = "select @out";
// $result = mysqli_query($conn,$sql);
// $row = mysqli_num_rows($result);
$output = mysqli_fetch_assoc($result);
echo "<pre>";
print_r($output);
echo "</pre>;"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>PDO</h2>
    <p>PHP Data Object</p>
    <p>It is improvment over mysqli. Mysql improved</p>
    <p>It has objects like mysqli but it handles sqli injection and error handling</p>
    <p>It uses prepared method to define function once and execute it for multiple inputs</p>
</body>
</html>