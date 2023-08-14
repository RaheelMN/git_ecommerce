<?php
    include "include/connect.php";

    $page_no = $_POST['page_no'];

    //Records per page limit
    $limit = 5;

    //calculating total pages and page no
    $sql = "SELECT * FROM `brands` ";
    $result = mysqli_query($con,$sql) or die("Error query failed"); 
    $total_records = mysqli_num_rows($result);
    $total_pages =ceil($total_records/$limit);
  
    
    //if user has deleted record than page no will be updated
    if($page_no > $total_pages){
        $page_no = $total_pages;
    }
    
    
    //Starting record no in page
    $offset = ($page_no-1)*$limit;
    
    
    $sql = "SELECT * FROM `brands` LIMIT $offset, $limit;";
    $result = mysqli_query($con,$sql) or die("Error query failed");
    $output ="";
    $output .="
    <table>
    <thead>
    <tr>
    <th class=\"t_c1\">ID</th>
    <th class=\"t_c2\">Name</th>
    <th class=\"t_c3\">Image</th>
    <th class=\"t_c4\">Action</th>
    </tr>
    </thead>
    <tbody id=\"tbody\">";  
    
    while($row=mysqli_fetch_assoc($result)){
        $output .= "
        <tr id=\"row{$row['id']}\">
        <td class=\"t_c1\">{$row['id']}</td>
        <td class=\"t_c2\">{$row['brand']}</td>
        <td class=\"img_cell t_c3\"><a href=\"{$row['image']}\">
        <img class=\"img\" src=\"{$row['image']}\" alt=\"car.jpg\"></a></td>
        <td class=\"t_c4\">
        <input type=\"button\" class=\"edit_btn\" name=\"edit\" value=\"Edit\" data-id=\"{$row['id']}\">
        <input type=\"button\" class=\"del_btn\" name=\"delete\" value=\"Delete\" data-id=\"{$row['id']}\">
        </td>
        </tr>";
    }
    $output.="      </tbody>
    </table>";
    
    $output .= "<div id=\"pagination\">";
    $class ="";
    for($i=1;$i<=$total_pages;$i++)
    {
        if($i == $page_no){
            $class = "Active"; 
        }else {$class = "";}
        $output.="<a class=\"$class\" href=\"\" id=\"{$i}\">$i</a>";
    }
      $output .="</div>";


    mysqli_close($con);
    mysqli_free_result($result);
    echo($output);      
?>