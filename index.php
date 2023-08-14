<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">

        <!-- header -->
        <nav id="navbar1">
            <div class="navbar_contents">
                <div id="left_nav">
                    <ul class="navbar1_ul"> 
                        <li class ="items">
                            <div id="logo">
                                <img src="http://localhost/5-1-rest_api/images/logo.jpg" alt="logo.jpg">
                            </div>
                        </li>
                        <li class="items">
                            <button id ="home_btn"class="nav_btn">Home</button>
                        </li>
                        <li class="items">
                            <button id= "add_record_btn" class="nav_btn">Products</button>
                        </li>
                        <li class="items">
                            <button id= "add_record_btn" class="nav_btn">Register</button>
                        </li>
                        <li class="items cart">
                            <a><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
                        </li>
                        <li class="items cart">
                            <a>Total Price Rs 1000/-</a>
                        </li>

                    </ul>
                </div>
                <div id="right_nav">
                    <ul class="navbar1_ul">
                        <li class="items">
                                <button class="search_btn" id="search_btn" name = "search_btn">Search</button>
                        </li>
                        <li class="items">
                            <input type="text" name="input_search" id="input_search">
                        </li>              
                    </ul>
                </div>
            </div>
        </nav>
        <nav id="navbar2">
            <div class="navbar_contents">
                <ul id="navbar2_ul">
                    <li class = "items">
                        <a href="#"> Welcome Guest!</a>
                    </li>
                    <li class = "items">
                        <a href="#"> Login</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Section Header -->
        <div id="main_heading">
            <h3>Hidden Store</h3>
            <p>Check our inventory</p>
        </div>

        <div id="contents">
            <div id="products">
            <div id="products_msg"></div>
                <div id="cards_container">
                </div>                           
            </div>
            <div id="side_nav_bar_div">
                <ul id ="side_nav">
                </ul>
            </div>
        </div>

        <!-- Section Footer -->
        <Footer>
            <p>&copy;2023. E-Commerce. All rights reserved</p>
        </Footer>


    </div>
</body>
<script src="http://localhost/ecommerce/js/jquery.js"></script>
<script>
    $('document').ready(function(){
        //Populate side navbar
        function load_sidenav(){

            //empty side-nav ul
            $('#side_nav').html('');

            //retrive side-nav records
            $.ajax({
                url:"http://localhost/ecommerce/rest_api/api_fetch_brands_catg.php",
                type: "GET",
                dataType:"json",
                success: function(data){
                    if(data.brands.error){
                        $('#side_nav').append('<li class="side_nav_h">Brands</li>');
                        $('#side_nav').append('<li><a class="side_nav_hov" href="">'+data.brands.message+'</a></li>');
                    }else{
                        $('#side_nav').append('<li class="side_nav_h">Brands</li>');
                        $.each(data.brands.data,function(key,value){
                            $('#side_nav').append('<li><a class="side_nav_hov" href="brand'+value.b_id+'">'+value.b_name+'</a></li>');
                        });                       
                    }
                    if(data.categories.error){
                        $('#side_nav').append('<li class="side_nav_h">Categories</li>');
                        $('#side_nav').append('<li><a class="side_nav_hov" href="">'+data.categories.message+'</a></li>');
                    }else {
                        $('#side_nav').append('<li class="side_nav_h">Categories</li>');
                        $.each(data.categories.data,function(key,value){
                            $('#side_nav').append('<li><a class="side_nav_hov" href="category'+value.c_id+'">'+value.c_name+'</a></li>');
                        });                                              
                    }
                }

            });    
            
        }

        function load_cards(){
            $.ajax({
                url:"http://localhost/ecommerce/rest_api/api_fetch_products.php",
                type: "GET",
                dataType:"json",
                success:function(data){
                    debugger;
                    //check if no record found
                    if(data.error){
                        $('#products_msg').addClass('form_msg').text(data.message);
                    }
                    else{
                        $.each(data.data,function(key, value){
                            $('#cards_container').append('<div class="card">'+
                                                        '<img class="card_img" src='+value.p_image1+' alt="Card image cap">'+
                                                        '<div class="card_body">'+
                                                            '<h5 class="card_title card_row">'+value.p_title+'</h5>'+
                                                            '<p class="card_text card_row">'+value.p_description+'</p>'+
                                                            '<div class="card_row">'+                                        
                                                                '<button class="card_btn">Add to cart</button>'+
                                                                '<button class="card_btn">View</button>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>');
                        });

                    }
                }

            });
        }        

        load_sidenav();
        load_cards();


            
    });
</script>
</html>