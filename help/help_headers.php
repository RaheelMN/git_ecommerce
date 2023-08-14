<?php

    // To prevent cache use following code 

    //Pragma:
    //when user press refresh/reload. It forces cache to request new file althrough it has copy
    header('Pragma : no-cache'); 

    //Expires: it is old html header
    //Set expiry date that is clear. To prevent caching it should be in past
    header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');

    //Cache-control: It can have multiple properties
    //cache-control: max-age must-revalidate.
    //It is time period after page is retrived from server after which cache request refresh page from server.
    //It is in seconds. I.E if max-age = 10; then cache request new page after 10 seconds
    //must-revalidate. it is used in combination with max-age.
    //If connection with server is disconnected and page has expired than browser allow cache to load stale
    //page. This command prevents it. It caused HTTP to validate resource from server and if new file is
    //present it is cached
    header('Cache-Control: max-age=0 must-revalidate');

    //cache control: Public/Private
    //Public: it allows Content Delivery Networks(CDNs) to cache page for hosts for fast delivery. 
    //CDNs are proxy server that charge websites to cache their contents and pay ISP to store their 
    //data on them
    //Private: only host can cache file
    header('Cache-Control: public');

    //cache control: no-cache
    //when host request page then HTTP first validates the page from server. If server has no new resource
    //then http uses cache respose. No cache means HTTP performs validatio for each request but
    //resource is cached.
    header('Cache-Control: no-cache');

    //Cache Control no store
    //This commands causes cache to not store server response. 
    header('Cache-Control: no-store');

    //

    //cache control:

    if(isset($_GET)){
        if(!empty($_GET)){
            $name = "<'raheel'>";
            $name_e = htmlentities($name);
            echo "$name_e";
            // echo "<script> alert('heelo');</script>";
            exit();            
        }
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
    <!-- <script> alert('heelo');</script> -->
    <div id="msg">
    <?php

        $name = "<'raheel'>";
        $name_e = htmlentities($name);
        echo "<br> encoded name: $name_e";
        // echo "<scirpt> alert('you have been hacked'); </script>";
        ?>

    </div>
    <div id="msg2"></div>
</body>
<script src="http://localhost/ecommerce/js/jquery.js"></script>
<script>
    $('document').ready(function(){
        $('#msg').on('click',function(){
            $.ajax({
                url:"http://localhost/ecommerce/rough.php",
                type: "GET",
                data:{name:2},
                success: function(data){
                    debugger;
                    $('#msg2').text(data);
                }

            });
        });
    });
</script>
</html>