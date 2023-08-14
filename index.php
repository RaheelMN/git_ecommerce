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
            <div class="navbar-contents">
                <div id="left-nav">
                    <ul class="navbar1-ul"> 
                        <li class ="items">
                            <div id="logo">
                                <img src="http://localhost/5-1-rest_api/images/logo.jpg" alt="logo.jpg">
                            </div>
                        </li>
                        <li class="items">
                            <button id ="home_btn"class="nav-btn">Home</button>
                        </li>
                        <li class="items">
                            <button id= "add_record_btn" class="nav-btn">Products</button>
                        </li>
                        <li class="items">
                            <button id= "add_record_btn" class="nav-btn">Register</button>
                        </li>
                        <li class="items cart">
                            <a><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
                        </li>
                        <li class="items cart">
                            <a>Total Price Rs 1000/-</a>
                        </li>

                    </ul>
                </div>
                <div id="right-nav">
                    <ul class="navbar1-ul">
                        <li class="items">
                                <button class="search-btn" id="search-btn" name = "search-btn">Search</button>
                        </li>
                        <li class="items">
                            <input type="text" name="input-search" id="input-search">
                        </li>              
                    </ul>
                </div>
            </div>
        </nav>
        <nav id="navbar2">
            <div class="navbar-contents">
                <ul id="navbar2-ul">
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
        <div id="main-heading">
            <h3>Hidden Store</h3>
            <p>Check our inventory</p>
        </div>

        <div id="contents">
            <div id="products">
            <div id="products_msg" class="form_msg"></div>
                <div id="cards_container">
                </div>                           
            </div>
            <div id="side-nav-bar-div">
                <ul id ="side-nav">
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
            $('#side-nav').html('');

            //retrive side-nav records
            $.ajax({
                url:"http://localhost/ecommerce/rest_api/api_fetch_sidenav.php",
                type: "GET",
                dataType:"json",
                success: function(data){
                    if(data.brands.status != 'false' ){
                        $('#side-nav').append('<li class="side-nav-h">Brands</li>');
                        $.each(data.brands,function(key,value){
                            $('#side-nav').append('<li><a class="side-nav-hov" href="brand'+value.bid+'">'+value.bname+'</a></li>');
                        });                       
                        
                    }
                    if(data.categories.status != 'false' ){
                        $('#side-nav').append('<li class="side-nav-h">Categories</li>');
                        $.each(data.categories,function(key,value){
                            $('#side-nav').append('<li><a class="side-nav-hov" href="category'+value.cid+'">'+value.cname+'</a></li>');
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
                        $('#products_msg').addClass('err_msg').text(data.message);
                    }
                    else{
                        $.each(data.data,function(key, value){
                            $('#cards_container').append('<div class="card">'+
                                                        '<img class="card-img" src='+value.p_image1+' alt="Card image cap">'+
                                                        '<div class="card-body">'+
                                                            '<h5 class="card-title">'+value.p_title+'</h5>'+
                                                            '<p class="card-text">'+value.p_description+'</p>'+
                                                            '<a href="#" class="card-btn">Add to cart</a>'+
                                                            '<a href="#" class="card-btn">View</a>'+
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