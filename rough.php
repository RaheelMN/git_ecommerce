<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="side-nav-bar-div">
        <ul id ="side-nav">
        </ul>
    </div>

    <script src="js/jquery.js"></script>
    <script>
        $(document).ready(function(){

            function load_sidenav(){

                //empty side-nav ul
                $('#side-nav').html('');

                //retrive side-nav records
                $.ajax({
                    url:"http://localhost/ecommerce/rest_api/api_fetch_sidenav.php",
                    type: "GET",
                    dataType:"json",
                    success: function(data){
                        debugger;
                        if(data.brands.status != 'false' ){
                            $('#side-nav').append('<li class="side-nav-h">Brands</li>');
                            $.each(data.brands,function(key,value){
                                $('#side-nav').append('<li><a class="side-nav-hov" href="">'+value.bname+'</a></li>');
                            });                       
                            
                        }
                        if(data.categories.status != 'false' ){
                            $('#side-nav').append('<li class="side-nav-h">Categories</li>');
                            $.each(data.categories,function(key,value){
                                $('#side-nav').append('<li><a class="side-nav-hov" href="">'+value.cname+'</a></li>');
                            });                       
                            
                        }
                    }

                });
           
            }

            load_sidenav();
        });
    </script>
</body>
</html>