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
                <div id="cards-container">
                    <div class="card">
                        <img class="card-img" src="images/item1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="card-btn">Add to cart</a>
                            <a href="#" class="card-btn">View</a>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img" src="images/item2.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="card-btn">Add to cart</a>
                            <a href="#" class="card-btn">View</a>
                        </div>
                    </div>
                     <div class="card">
                        <img class="card-img" src="images/item3.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="card-btn">Add to cart</a>
                            <a href="#" class="card-btn">View</a>
                        </div> 
                    </div> 
                    <div class="card">
                        <img class="card-img" src="images/item1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="card-btn">Add to cart</a>
                            <a href="#" class="card-btn">View</a>
                        </div> 
                    </div> 
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
            
            //retrive brands record
            $.ajax({
                url:"http://localhost/ecommerce/rest_api/api_fetch_all_brands.php",
                type: "GET",
                dataType:"json",
                success: function(data){
                    if(data.status != 'false' ){
                        $('#side-nav').append('<li class="side-nav-h">Brands</li>');
                        $.each(data,function(key,value){
                            $('#side-nav').append('<li><a class="side-nav-hov" href="">'+value.bname+'</a></li>');
                        });                       
                        
                    }
                }

            });
 
            //retrive categories record
            $.ajax({
                url:"http://localhost/ecommerce/rest_api/api_fetch_all_categories.php",
                type: "GET",
                dataType:"json",
                success: function(data){
                    if(data.status != 'false' ){
                        $('#side-nav').append('<li class="side-nav-h">Categories</li>');
                        $.each(data,function(key,value){
                            $('#side-nav').append('<li><a class="side-nav-hov" href="">'+value.cname+'</a></li>');
                        });                       
                        
                    }
                }

            });            
        }

        load_sidenav();
            
    });
</script>
</html>