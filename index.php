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
                            <a><i class="fa-solid fa-cart-shopping"></i><sup id="total_cart_items"></sup></a>
                        </li>
                        <li class="items cart" id="total_items_price">
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
            <p id="sub_heading">Check our inventory</p>
        </div>

        <!-- Product cards and side navigation bar -->
        <div id="contents">
            <div id="products">
                <div id="products_msg">
                </div>
                <div id="cards_container">
                </div>                           
                <div id="pagination_container">
                        <div id="pagination_body">                    
                        </div>
                </div>
            </div>
            <div id="side_nav_bar_div">
                <ul id ="side_nav">
                </ul>
            </div>
        </div>

        <!-- Product detail page -->
        <div id="product_modelbox" class="form_modelbox">
            <div id="product_container">
                 <div id="product_contents">
                    <div id="product_heading">Product's Detail</div>
                    <div id="product_image_container">
                        <div id="product_image_div">
                            <img src="" alt ="product image" id = "product_image">
                        </div>
                        <div id="product_image_btn">
                            <a id="image1" class="image_btn" href="#" >1</a>
                            <a  id="image2" class="image_btn" href="#" >2</a>
                            <a  id="image3" class="image_btn" href="#" >3</a>
                        </div>
                    </div>
                    <div id="product_body">
                        <div class="form_linebreak"></div>
                        <div class="product_row">
                            <div class="product_row_heading">Product's Title</div>
                            <div id="product_title" class="product_row_text"></div>
                        </div>                        
                        <div class="product_row">
                            <div class="product_row_heading">Product's Description</div>
                            <div id="product_desc" class="product_row_text" ></div>
                        </div>
                        <div class="product_row">
                            <div class="product_row_heading">Product's Brand</div>
                            <div id="product_brand" class="product_row_text"></div>
                        </div>
                        <div class="product_row">
                            <div class="product_row_heading">Product's Category</div>
                            <div id="product_category" class="product_row_text"></div>
                        </div> 
                        <div class="product_row">
                            <div class="product_row_heading">Product's Price</div>
                            <div id="product_price" class="product_row_text"></div>
                        </div>  
                        <div class="product_row">
                            <div class="product_row_heading">Stock</div>
                            <div id="product_stock" class="product_row_text"></div>
                        </div>                         
                        <div class="product_row">
                            <div id="product_close_btn_div">
                                <button id="product_close_btn">Close</button>
                            </div>
                        </div>                                                                     
                    </div> 
                </div>
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

        //parameters used in load_cards function ajax call
        const load_cards_info ={
                                search_type: 'all',
                                search_term: '0',
                                page_no: 1
        }

        const record={
            image1: '',
            image2: '',
            image3: '',
        }

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
        function load_cards(){

            json_obj = JSON.stringify(load_cards_info);
            $.ajax({               
                url:"http://localhost/ecommerce/rest_api/api_fetch_products.php",
                type: "POST",
                data:json_obj,
                dataType:"json",
                success:function(data){

                    //clear cards
                    $('#cards_container').html('');
                    //clear message class
                    $('#products_msg').removeClass('products_msg_style').html('');
                    //clear page numbers
                    $('#pagination_body').html('');                                     

                    //check if no record found
                    if(data.error){
                        $('#products_msg').fadeIn('slow');
                        $('#products_msg').addClass('products_msg_style').text(data.message);                         
                    }
                    else{
                        $.each(data.data,function(key, value){
                            $('#cards_container').append('<div class="card">'+
                                                        '<img class="card_img" src='+value.p_image1+' alt="Card image">'+
                                                        '<div class="card_body">'+
                                                            '<h5 class="card_title card_row">'+value.p_title+'</h5>'+
                                                            '<p class="card_text card_row">'+value.p_description+'</p>'+
                                                            '<p class="card_row card_price"> Price: '+value.p_price+'/-</p>'+
                                                            '<div class="card_row">'+                                        
                                                                '<button class="card_btn add_product_btn"  data-id="'+value.p_id+'">Add to cart</button>'+
                                                                '<button class="card_btn view_product_btn" data-id="'+value.p_id+'">View</button>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>');
                                           
                        });
                        $('#pagination_body').append(data.pagination);

                    }
                }

            });
        }  
        
        //Function to initialize cart items and total price in navigation bar
        function load_cart_info(){

            var obj = {p_id:0};
                var json_obj = JSON.stringify(obj);
                $.ajax({
                    url:"http://localhost/ecommerce/rest_api/api_cart_operations.php",
                    type: "POST",
                    dataType:"json",
                    data:json_obj,
                    success:function(data){
                        debugger;
                        $('#total_cart_items').text(data.num_of_items);
                        $('#total_items_price').text('Total Price Rs: '+data.total_price+'/-');

                    }
                });
        }

        //load side navigation bar with brands and categories records
        load_sidenav();

        //load all cards
        load_cards();

        //load user's cart information in navigation bar
        load_cart_info();

        //if User press one of the side navigation bar brand button
        $(document).on('click','.side_nav_brand_btn',function(){
            load_cards_info.search_type='brand';
            load_cards_info.search_term=$(this).data('id');
            load_cards_info.page_no=1;
            load_cards();

            //Update sub heading with selected brand information
            $("#sub_heading").text('Brand: '+$(this).val());

            //clear previously active sidebar item
            $('#side_nav input').removeClass('active_side_bar'); 

            //Make selected brand active
            $(this).addClass('active_side_bar'); 
        });
        
        //if User press one of the side navigation bar cateogry button
        $(document).on('click','.side_nav_category_btn',function(){
            
            load_cards_info.search_type='category';
            load_cards_info.search_term=$(this).data('id');
            load_cards_info.page_no=1;
            load_cards();

            //Update sub heading with selected category information
            $("#sub_heading").text('Category: '+$(this).val());

            //clear previously active sidebar item
            $('#side_nav input').removeClass('active_side_bar');

            //Make selected category active
            $(this).addClass('active_side_bar'); 
        }); 
        
        //if user has pressed navigation bar's products button
        $('#products_btn').on('click',function(){
            load_cards_info.search_type='all';
            load_cards_info.search_term='0';  
            load_cards_info.page_no=1;
            load_cards();

            //Update sub heading 
            $("#sub_heading").text('Check our inventory');

            //clear previously active sidebar item
            $('#side_nav input').removeClass('active_side_bar');            
        });

        //if user has pressed search button
        $('#search_btn').on('click',function(){
            
            var search = $('#input_search').val();
            if(search != ""){
                load_cards_info.search_type='search';
                load_cards_info.search_term=search;                
                load_cards_info.page_no=1;
                load_cards();

                 //Update sub heading with search term
                $("#sub_heading").text('Search term: '+$('#input_search').val());

                //clear previously active sidebar item
                $('#side_nav input').removeClass('active_side_bar');                 
            }

        }); 

        //if user has pressed page button
        $(document).on('click','#pagination_body a',function(e){
            e.preventDefault();
            load_cards_info.page_no = $(this).attr('id');
            load_cards();
        });

        //if user has pressed view button in product card
        $(document).on('click','.view_product_btn',function(){
                var product_id =$(this).data('id');
                var obj = {product_id:product_id};
                var json_obj = JSON.stringify(obj);
                $.ajax({
                    url:"http://localhost/ecommerce/rest_api/api_fetch_single_product.php",
                    type: "POST",
                    dataType:"json",
                    data:json_obj,
                    success:function(data){
                        debugger;
                        if(!data.error){
                            $('#product_modelbox').show();
                            record.image1 = data.data.p_image1;
                            record.image2 = data.data.p_image2;
                            record.image3 = data.data.p_image3;
                            $('#product_title').html(data.data.p_title);
                            $('.image_btn').removeClass('active_image_btn');
                            $('#image1').addClass('active_image_btn');
                            $('#product_image').attr('src',data.data.p_image1);
                            $('#product_desc').html(data.data.p_description);
                            $('#product_brand').html(data.data.brand);
                            $('#product_category').html(data.data.category);
                            $('#product_price').html('Rs: '+data.data.p_price+'/-');
                            if(data.data.stock){
                                $('#product_stock').html('Available');
                            }else{
                                $('#product_stock').html('Not available');
                            }
                        }
                    }
                });
        }); 

        //if user has pressed image button in product detail form
        $('.image_btn').on('click',function(e){
            e.preventDefault();
            $('.image_btn').removeClass('active_image_btn');
            $(this).addClass('active_image_btn');
            var image_no = $(this).attr('id');
            if(image_no == 'image1'){
                $('#product_image').attr('src',record.image1);
            }else if(image_no == 'image2'){
                $('#product_image').attr('src',record.image2);
            }else{
                $('#product_image').attr('src',record.image3);
            }
        });
        
        //If user has pressed close button in product detail page
        $('#product_close_btn').on('click',function(e){
            e.preventDefault();
            $('#product_modelbox').hide();
        });

        //if user has pressed add to cart button in product card
        $(document).on('click','.add_product_btn',function(){
                var product_id =$(this).data('id');
                var obj = {p_id:product_id};
                var json_obj = JSON.stringify(obj);
                $.ajax({
                    url:"http://localhost/ecommerce/rest_api/api_cart_operations.php",
                    type: "POST",
                    dataType:"json",
                    data:json_obj,
                    success:function(data){
                        debugger;
                        if(data.error){
                            $('#products_msg').fadeIn('slow');
                            $('#products_msg').addClass('products_msg_style').text(data.message);
                            setTimeout(function(){
                                $('#products_msg').fadeOut('slow');
                            },2000); 
                            setTimeout(function(){
                                $('#products_msg').removeClass('products_msg_style');
                            },2600); 
                        }
                        else{
                            $('#products_msg').fadeIn('slow');
                            $('#products_msg').addClass('products_msg_style').text(data.message);
                            setTimeout(function(){
                                $('#products_msg').fadeOut('slow');
                            },2000); 
                            setTimeout(function(){
                                $('#products_msg').removeClass('products_msg_style');
                            },2500); 
                            $('#total_cart_items').text(data.num_of_items);
                            $('#total_items_price').text('Total Price Rs: '+data.total_price+'/-');

                        }
                    }
                });
        });         
    });
</script>
</html>