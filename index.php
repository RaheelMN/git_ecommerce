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
                            <button id= "products_btn" class="nav_btn">Products</button>
                        </li>
                        <li class="items">
                            <button id= "register_btn" class="nav_btn">Register</button>
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
        //Function to populate side navigation bar with brands and categories records
        function load_sidenav(){

            //empty side-nav ul
            $('#side_nav').html('');

            //retrive side-nav records
            $.ajax({
                url:"http://localhost/ecommerce/rest_api/api_fetch_brands_catg.php",
                type: "GET",
                dataType:"json",
                success: function(data){
                    debugger;
                    //Clear side nav bar
                    $('#side_nav').html('');

                    //Add brand header 
                    $('#side_nav').append('<li class="side_nav_header">Brands</li>');

                    //check if brands records exist in database
                    if(data.brands.error){
                        $('#side_nav').append('<li class="side_nav_body">'+data.brands.message+'</li>');
                    }else{
                        //Add brands to side navigation bar
                        $.each(data.brands.data,function(key,value){
                            $('#side_nav').append('<li><input type="button" class="side_nav_btn side_nav_brand_btn"  value="'+value.b_name+'" data-id="'+value.b_id+'"></li>');                                      
                        });                       
                    }

                    //Add category header 
                    $('#side_nav').append('<li class="side_nav_header">Categories</li>');

                    //check if brands records exist in database
                    if(data.categories.error){
                        $('#side_nav').append('<li class="side_nav_body">'+data.categories.message+'</li>');
                    }else{
                        //Add Categories to side navigation bar
                        $.each(data.categories.data,function(key,value){
                            $('#side_nav').append('<li><input type="button" class="side_nav_btn side_nav_category_btn"  value="'+value.c_name+'" data-id="'+value.c_id+'"></li>');                                      
                        });                       
                    }

                 }

            });    
            
        }

        //Function to load cards based on type ie all,brand or category
        function load_cards(card_type,id){
            obj = {card_type:card_type,
                    id:id
                  };
            json_obj = JSON.stringify(obj);
            $.ajax({               
                url:"http://localhost/ecommerce/rest_api/api_fetch_products.php",
                type: "POST",
                data:json_obj,
                dataType:"json",
                success:function(data){
                    debugger;

                    //clear cards
                    $('#cards_container').html('');
                    //clear message class
                    $('#products_msg').removeClass('products_msg_style');
                    

                    //check if no record found
                    if(data.error){
                        $('#products_msg').fadeIn('slow');
                        $('#products_msg').addClass('products_msg_style').text(data.message);
                        setTimeout(function(){
                            $('#products_msg').fadeOut('slow');
                        },2000);                           
                    }
                    else{
                        $.each(data.data,function(key, value){
                            $('#cards_container').append('<div class="card">'+
                                                        '<img class="card_img" src='+value.p_image1+' alt="Card image cap">'+
                                                        '<div class="card_body">'+
                                                            '<h5 class="card_title card_row">'+value.p_title+'</h5>'+
                                                            '<p class="card_text card_row">'+value.p_description+'</p>'+
                                                            '<p class="card_row card_price"> Price: '+value.p_price+'/-</p>'+
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

        //load side navigation bar with brands and categories records
        load_sidenav();

        //load all cards
        load_cards('all',0);

        //if User press one of the side navigation bar brand button
        $(document).on('click','.side_nav_brand_btn',function(){
            
            var brand_id = $(this).data('id');
            load_cards('brand',brand_id)
        });
        
        //if User press one of the side navigation bar cateogry button
        $(document).on('click','.side_nav_category_btn',function(){
            
            var category_id = $(this).data('id');
            load_cards('category',category_id)
        }); 
        
        //if user has pressed home button
        $('#products_btn').on('click',function(){
            load_cards('all',0);
        });

        //if user has pressed search button
        $('#search_btn').on('click',function(){
            
            var search = $('#input_search').val();
            if(search != ""){

                load_cards('search',search);
            }

        }); 
                
    });
</script>
</html>