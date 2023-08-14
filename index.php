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
                            <a id="nav_cart_btn" href="#"><i class="fa-solid fa-cart-shopping" ></i><sup id="total_cart_items"></sup></a>
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
                        <a id="login_btn" href="#"> Login</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Cards and Side navigation bar -->
        <div id="container_cards_sidebar">

            <!-- Section Header -->
            <div id="main_heading">
                <h3>Hidden Store</h3>
                <p id="sub_heading">Check our inventory</p>
            </div>
    
            <!-- Product cards and side navigation bar -->
            <div id="contents_cards_sidebar">
                
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
        </div>

        <!-- View Product details page -->
        <div id="product_modelbox" class="form_modelbox">
            <div id="product_container">
                 <div id="product_contents">
                    <div class="product_heading">Product's Detail</div>
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
                            <div class="product_close_btn_div">
                                <button id="product_close_btn">Close</button>
                            </div>
                        </div>                                                                     
                    </div> 
                </div>
            </div>
        </div>

        <!-- Cart Table -->
        <div id ="cart_modelbox" >
            <div id="cart_container">
                    <div id="cart_contents">
                        <div class="product_heading">Cart item's Detail</div>
                        <div id="cart_message"></div>
                        <div id="cart_body">
                            <table id="cart_table" >
                            <thead  style="border:1px solid black;">
                                    <tr>
                                        <th rowspan="2">Product Title</th>
                                        <th rowspan="2">Product Image</th>
                                        <th rowspan="2">Change Quantity</th>
                                        <th rowspan="2">Quantity</th>
                                        <th rowspan="2">Unit Cost</th>
                                        <th rowspan="2">Total Cost</th>
                                        <th ><input type="button" class="cart_btn" value="Update" id="update_cart_btn"></th>
                                        <th ><input type="button" class="cart_btn" value="Delete" id="delete_cart_btn"></th>
                                    </tr>
                                    <tr>
                                        <th class="cart_table_th_checkbox_cell">Update All <input type="checkbox" class="cart_table_th_checkbox" id="update_all_checkbox"></th>
                                        <th class="cart_table_th_checkbox_cell">Delete All <input type="checkbox" class="cart_table_th_checkbox" id="delete_all_checkbox"></th>
                                    </tr>                                    
                                    </thead>
                                <tbody id="cart_table_body">
                                </tbody>
                            </table>
                            <div class="product_row ">
                                <div id = "cart_total_quantity"class="product_row_text cart_row_text">
                                </div>
                            </div> 
                            <div class="product_row ">
                                <div id = "cart_total_price"class="product_row_text cart_row_text">
                                </div>
                            </div>                                                        
                            <div class="product_row">
                                <div class="product_close_btn_div">
                                    <button id="cart_close_btn">Continue Shopping</button>
                                </div>
                            </div>                               
                        </div>
                    </div>
            </div>                      

        </div>

        <!-- Registration Form -->
        <div id="registration_modelbox">
            <div class="form_linebreak"></div>           
            <div class="form_div">
                <form action="" class="form">
                    <div class="form_header">
                        <h3>Registration Form</h3>
                    </div>
                    <div class="form_linebreak"></div>
                    <div class="form_body">
                        <div class="form_row">
                                <div class="field_name">User Name</div>
                                <input type="text" class="form_input" name="reg_name" id="reg_name" value="" autocomplete="off">
                                <div id="reg_name_msg" class="field_err_msg"></div>
                        </div>
                        <div class="form_row">
                                <div class="field_name">Email</div>
                                <input type="email" class="form_input" name="reg_email" id="reg_email">
                                <div id="reg_email_msg" class="field_err_msg"></div>
                        </div>  
                        <div class="form_row">
                                <div class="field_name">User Image</div>
                                <input type="file" class="form_input" name="reg_image" id="reg_image" val="">
                                <div id="reg_email_msg" class="field_err_msg"></div>
                        </div>  
                        <div class="form_row">
                                <div class="field_name">Password</div>
                                <input type="password" class="form_input" name="reg_password" id="reg_password" >
                                <div id="reg_password_msg" class="field_err_msg"></div>
                        </div>
                        <div class="form_row">
                                <div class="field_name">Confirm Password</div>
                                <input type="password" class="form_input" name="reg_cpassword" id="reg_cpassword" >
                                <div id="reg_cpassword_msg" class="field_err_msg"></div>
                        </div>   
                        <div class="form_row">
                                <div class="field_name">Address</div>
                                <input type="text" class="form_input" name="reg_address" id="reg_address" value="" autocomplete="off">
                                <div id="reg_address_msg" class="field_err_msg"></div>
                        </div>  
                        <div class="form_row">
                                <div class="field_name">Contact</div>
                                <input type="text" class="form_input" name="reg_contact" id="reg_contact" value="" autocomplete="off">
                                <div id="reg_contact_msg" class="field_err_msg"></div>
                        </div> 
                        <div class="form_linebreak"></div>                                                                                                                                            
                        <div class="form_row">
                            <button class="form_btn" id="reg_submit">Submit</button>
                            <button class="form_btn" id="reg_close">Close</button>
                        </div>
                        <div class="field_name form_redirect">Already registered? <a  id="reg_form_redirect" href="#">Login</a></div>
                        <div id="reg_form_msg" class="form_msg"></div>
                    </div>
                </form>               
            </div>
            <div class="form_linebreak"></div>
        </div>  
        
        <!-- Login Form -->
        <div id="login_modelbox">
            <div class="form_linebreak"></div>           
            <div class="form_div">
                <form action="" class="form">
                    <div class="form_header">
                        <h3>Login Form</h3>
                    </div>
                    <div class="form_linebreak"></div>
                    <div class="form_body">
                        <div class="form_row">
                                <div class="field_name">User Name</div>
                                <input type="text" class="form_input" name="log_name" id="log_name" value="" autocomplete="off">
                                <div id="log_name_msg" class="field_err_msg"></div>
                        </div>
                        <div class="form_row">
                                <div class="field_name">Password</div>
                                <input type="password" class="form_input" name="log_password" id="log_password" >
                                <div id="log_password_msg" class="field_err_msg"></div>
                        </div>
                        <div class="form_row">
                                <div class="field_name"><a id="log_fpassword" href="#">Forgot Password</a></div>
                        </div>   
                        <div class="form_linebreak"></div>                                                                                                                                            
                        <div class="form_row">
                            <button class="form_btn" id="log_submit">Submit</button>
                            <button class="form_btn" id="log_close">Close</button>
                        </div>
                        <div class="field_name form_redirect">Don't have an account? <a  id="log_form_redirect" href="#">Register</a></div>
                        <div id="log_form_msg" class="form_msg"></div>
                    </div>
                </form>               
            </div>
            <div class="form_linebreak"></div>
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

    //---------Objects Declaration------------------------

        //parameters used in load_cards function ajax call
        const cards_info ={
                                search_type: 'all',
                                search_term: '0',
                                page_no: 1
        }

        //parameter used in view product detail form
        const product_view={
            image1: '',
            image2: '',
            image3: '',
        }
        
        //parameters used in ajax call for cart detail form
        const cart_info = {
                        op_type: "",
                        product_id:0,
                        quantity: 0,
                        status:"",
                        cart_changed:false,
                        records: []
        }

        //parameters used in determining user's current state
        const user_info={
            user_state:"products"
        }
    
    //------ End of Objects Declaration---------------------    


    //-------------Functions Declaration Section---------------    

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

        //Function to load cards based on card_info's parameter search_type 
        function load_cards(){

            json_obj = JSON.stringify(cards_info);
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
            cart_info.op_type="refresh";

                var json_obj = JSON.stringify(cart_info);
                $.ajax({
                    url:"http://localhost/ecommerce/rest_api/api_cart_operations.php",
                    type: "POST",
                    dataType:"json",
                    data:json_obj,
                    success:function(data){
                        $('#total_cart_items').text(data.num_of_items);
                        $('#total_items_price').text('Total Price Rs: '+data.total_price+'/-');

                    }
                });
        }

        //Function loads cards and side navigation bar
        function load_contents(){
            load_sidenav();
            load_cards();
        }

        //Function loads cards and side navigation bar 
        function load_container_cards_sidebar(){
            //Set user state
            user_info.user_state = 'cards';
            change_user_state();

            //Set card_info parameter to load all cards
            cards_info.search_type='all';
            cards_info.search_term='0';  
            cards_info.page_no=1;
            load_contents();

            //Update sub heading 
            $("#sub_heading").text('Check our inventory');

            //clear previously active sidebar item
            $('#side_nav input').removeClass('active_side_bar');                
        }

        //Function to load cart table 
        function load_cart_table(){                
                $('#cart_modelbox').show();
                cart_info.op_type="table";
                var json_obj = JSON.stringify(cart_info);
                $.ajax({
                        url:"http://localhost/ecommerce/rest_api/api_cart_operations.php",
                        type: "POST",
                        dataType:"json",
                        data:json_obj,
                        success:function(data){
                            debugger;

                            //set cart state
                            cart_info.status = 'startup';
                            cart_state();

                            //check if there is no record in database
                            if(data.error){
                                $('#cart_message').fadeIn('slow');
                                $('#cart_message').addClass('products_msg_style').text(data.message);

                                //set cart state
                                cart_info.status = 'noitem';
                                cart_state();

                            }else{                             

                                //Check if cart items are changed
                                if(cart_info.cart_changed){
                                    //reset cart changed flag
                                    cart_info.cart_changed=false;
                                    $('#cart_message').fadeIn('slow');                                                       
                                    $('#cart_message').addClass('products_msg_style').text('Cart updated');
                                    setTimeout(function(){
                                        $('#cart_message').fadeOut('slow');
                                    },2000); 
                                    setTimeout(function(){
                                        $('#cart_message').removeClass('products_msg_style');
                                    },2600);                                     
                                }
                                $.each(data.data,function(key, value){
                                    $('#cart_table_body').append('<tr class="cart_row">'+
                                                                '<td class="cart_table_col1">'+value.p_title+'</td>'+
                                                                '<td class="cart_cell"><img src="'+value.p_image1+'" alt="mangoes" class="cart_image"></td>'+
                                                                '<td class="cart_cell"><input type="number" class="cart_input_number" id="cart_'+value.cart_id+'" data-id="'+value.cart_id +'" min="1" max="10" value="1"></td>'+
                                                                '<td class="cart_cell">'+value.quantity+'</td>'+
                                                                '<td class="cart_cell">'+value.p_price+'</td>'+
                                                                '<td class="cart_cell">'+value.total_cost+'</td>'+
                                                                '<td class="cart_cell">'+
                                                                    '<input type="checkbox" class="update_checkbox" value="'+value.cart_id+'">'+ 
                                                                '</td>'+
                                                                '<td class="cart_cell">'+
                                                                    '<input type="checkbox" class="delete_checkbox" value="'+value.cart_id+'">'+                                
                                                                '</td>'+
                                                                +'</tr>');
                                });
                            }
                            //update cart table rows
                            $('#cart_total_quantity').text('Total Items: '+data.num_of_items);
                            $('#cart_total_price').text('Total Price: Rs '+data.total_price+'/-');
                            
                            //update navigation bar cart information
                            $('#total_cart_items').text(data.num_of_items);
                            $('#total_items_price').text('Total Price Rs: '+data.total_price+'/-');

                        
                        }
                    });            
        }

        //Function to update user state
        function change_user_state(){
            switch (user_info.user_state){
                case 'cards':
                    //Hide Cart Table Page
                    $('#cart_modelbox').hide();

                    //Hide Registration form
                    $('#registration_modelbox').hide();

                    //Hide Login Form
                    $('#login_modelbox').hide();                       
                   
                    //Enable Register Button in navigation bar
                    $("#register_btn").removeClass('no_hover').prop("disabled", false);  
                    
                    //Enable login Button in navigation bar
                    $("#login_btn").removeClass('no_hover').prop("disabled", false);                     
                    
                    //Enable Search button and input field
                    $("#search_btn").removeClass('no_hover').prop("disabled", false);
                    $("#input_search").removeClass('no_hover').prop("disabled", false);
                    
                    //Enable Cart icon in navigation bar
                    $("#nav_cart_btn").removeClass('no_hover').prop("disabled", false);

                    //display cards and side navigation bar
                    $('#container_cards_sidebar').show();
                    break;

                case 'cart':                   
                    //Hide cards and side navigation bar
                    $('#container_cards_sidebar').hide();

                    //Hide Registration form
                    $('#registration_modelbox').hide(); 
                    
                    //Hide Login Form
                    $('#login_modelbox').hide();   
                    
                    //Disable Search button and input field
                    $("#search_btn").addClass('no_hover').prop("disabled", true);
                    $("#input_search").addClass('no_hover').prop("disabled", true);
                    
                    //Disable Cart icon in navigation bar
                    $("#nav_cart_btn").addClass('no_hover').prop("disabled", true); 
                    
                    //Enable Register Button in navigation bar
                    $("#register_btn").removeClass('no_hover').prop("disabled", false);                      

                    //Enable login Button in navigation bar
                    $("#login_btn").removeClass('no_hover').prop("disabled", false);                     

                    //Show Cart Table Page
                    $('#cart_modelbox').show();
                    break;

                case 'register':                  
                    //Hide cards and side navigation bar
                    $('#container_cards_sidebar').hide();

                     //Hide Cart Table Page
                     $('#cart_modelbox').hide();   
                     
                    //Hide Login Form
                    $('#login_modelbox').hide();                     
                    
                    //Disable Search button and input field
                    $("#search_btn").addClass('no_hover').prop("disabled", true);
                    $("#input_search").addClass('no_hover').prop("disabled", true);
                    
                    //Disable Cart icon in navigation bar
                    $("#nav_cart_btn").addClass('no_hover').prop("disabled", true);  
                    
                    //Disable Register Button in navigation bar
                    $("#register_btn").addClass('no_hover').prop("disabled", true);  

                    //Enable login Button in navigation bar
                    $("#login_btn").removeClass('no_hover').prop("disabled", false);                      

                    //Show Registration Form
                    $('#registration_modelbox').show();
                    break; 

                case 'login':     
                    debugger;             
                    //Hide cards and side navigation bar
                    $('#container_cards_sidebar').hide();

                    //Hide Cart Table Page
                    $('#cart_modelbox').hide();  
                    
                    //Hide Registration Form
                    $('#registration_modelbox').hide();                    
                    
                    //Disable Search button and input field
                    $("#search_btn").addClass('no_hover').prop("disabled", true);
                    $("#input_search").addClass('no_hover').prop("disabled", true);
                    
                    //Disable Cart icon in navigation bar
                    $("#nav_cart_btn").addClass('no_hover').prop("disabled", true);  
                    
                    //Disable login Button in navigation bar
                    $("#login_btn").addClass('no_hover').prop("disabled", true); 

                    //Enable Register Button in navigation bar
                    $("#register_btn").removeClass('no_hover').prop("disabled", false);  

                    //Show Login Form
                    $('#login_modelbox').show();
                    break;                    
                    
            }
        }

        //Function to update cart table state
        function cart_state(){
            switch (cart_info.status){
                case 'startup':
                    //initializing form
                    //clearing cart table body
                    $('#cart_table_body').html('');
                    //clearing cart message and its css
                    $('#cart_message').removeClass('products_msg_style').text('');
                    //clearing check box All
                    $('#delete_all_checkbox').prop('checked',false);
                    $('#update_all_checkbox').prop('checked',false);
                    //restore cart table
                    $("#update_all_checkbox").prop("disabled", false);
                    $("#delete_all_checkbox").prop("disabled", false);
                    $("#update_cart_btn").removeClass('no_hover').prop("disabled", false);
                    $("#delete_cart_btn").removeClass('no_hover').prop("disabled", false);
                    break;

                case 'noitem':
                    //disable cart table buttons and checkboxes
                    $("#update_all_checkbox").prop("disabled", true);
                    $("#delete_all_checkbox").prop("disabled", true);
                    $("#update_cart_btn").addClass('no_hover').prop("disabled", true);
                    $("#delete_cart_btn").addClass('no_hover').prop("disabled", true);
                    break;
            }
        }

    //----------End of Functions Declaration Section------------     
        
        //load cards and side navigation bar    
        load_contents();

        //if user has pressed products button in navigation bar
        $('#products_btn').on('click',function(){

            load_container_cards_sidebar();          
        });

        //if user has pressed search button in navigation bar
        $('#search_btn').on('click',function(){
            
            var search = $('#input_search').val();
            if(search != ""){
                cards_info.search_type='search';
                cards_info.search_term=search;                
                cards_info.page_no=1;
                load_cards();

                 //Update sub heading with search term
                $("#sub_heading").text('Search term: '+$('#input_search').val());

                //clear previously active sidebar item
                $('#side_nav input').removeClass('active_side_bar');                 
            }

        }); 


    //-------Start of Registration Form----------------------   

        //if user has pressed Registration button in navigation bar
        $('#register_btn').on('click',function(){
            //set  user state
            user_info.user_state = "register";
            change_user_state();          
        });   

        //if user has pressed Close button Registration Form
        $('#reg_close_btn').on('click',function(){
            //set  user state
            user_info.user_state = "cards";
            change_user_state();          
        });   

        //if user has pressed Login link in form
        $('#reg_form_redirect').on('click',function(e){
            e.preventDefault();
            //set  user state
            user_info.user_state = "login";
            change_user_state();              
        });        
        
    //-------End of Registration Form----------------------    

    //-------Start of Login Form----------------------   

        //if user has pressed Login button in navigation bar
        $('#login_btn').on('click',function(){
            //set  user state
            user_info.user_state = "login";
            change_user_state();          
        });   

        //if user has pressed Close button Registration Form
        $('#log_close_btn').on('click',function(){
            //set  user state
            user_info.user_state = "cards";
            change_user_state();          
        }); 
        
        //if user has pressed Register link in form
        $('#log_form_redirect').on('click',function(e){
            e.preventDefault();
            //set  user state
            user_info.user_state = "register";
            change_user_state();              
        });
        
    //-------End of Login Form----------------------   

    //--------------Cart Section-------------

        //load user's cart information in navigation bar
        load_cart_info();

        //if user has pressed cart button in navigation bar
        $('#nav_cart_btn').on('click',function(e){
            e.preventDefault();

            //Set user state
            user_info.user_state = 'cart';
            change_user_state();            

            //load cart table page
            load_cart_table();
        });

        //If user has pressed close button in cart table form
        $('#cart_close_btn').on('click',function(e){
            e.preventDefault();
            load_container_cards_sidebar();           
        });

        //If user clicks delete all checkbox in cart table form
        $('#delete_all_checkbox').on('click',function(){
        if($('#delete_all_checkbox').prop('checked')){
            $('.delete_checkbox').prop('checked',true);
        }else{
            $('.delete_checkbox').prop('checked',false);
        }
        });
       
        //if user clicks single delete checkbox in cart table form
        $(document).on('click','.delete_checkbox',function(){
            if(!$(this).prop('checked')){
                $('#delete_all_checkbox').prop('checked',false);
            }
        });

        //if user has pressed delete button in cart table form
        $('#delete_cart_btn').on('click',function(){

        //reset cart_info record key
        cart_info.records=[];
        //check if user has checked any delete checkbox
        $('.delete_checkbox:checked').each(function(key){
            cart_info.records[key]=$(this).val();
        });
        if(cart_info.records.length==0){
            alert('Select atleast one checkbox to remove items.');

        }else if(confirm('Do you really want to remove items?')){

            //check if user has any unchecked delete checkbox
            if($('.delete_checkbox:not(:checked)').length==0){
                // cart_info.cart_empty=true;
                cart_info.status = "noitem";
            }

            cart_info.op_type="delete";
            var json_obj = JSON.stringify(cart_info);
            $.ajax({
            url:"http://localhost/ecommerce/rest_api/api_cart_operations.php",
                type: "POST",
                dataType:"json",
                data:json_obj,
                success:function(data){
                    if(data.error){
                        $('#cart_message').fadeIn('slow').text(data.message);
                    }else{ 

                        //if cart is empty then cart update message is not displayed
                        if(cart_info.status != "noitem"){
                            cart_info.cart_changed=true;  
                        }                         
                        load_cart_table(); 
                        
                    }
                }
            });                  
        }
        });        

        //If user clicks update all checkbox in cart table form
        $('#update_all_checkbox').on('click',function(){
        if($('#update_all_checkbox').prop('checked')){
            $('.update_checkbox').prop('checked',true);
        }else
        $('.update_checkbox').prop('checked',false);
        });

        //if user clicks single update checkbox in cart table form
        $(document).on('click','.update_checkbox',function(){
            debugger;
            if(!$(this).prop('checked')){
                $('#update_all_checkbox').prop('checked',false);
            }
        });

        //if user has pressed update button in cart table form
        $('#update_cart_btn').on('click',function(){

        //clear cart_info records array
        cart_info.records = [];
        id=[];
        quantity=[];
        //check if user has checked any update checkbox
        $('.update_checkbox:checked').each(function(key){
            id[key]=$(this).val();
            var input_id = 'cart_'+id[key];
                quantity[key]=($('#'+input_id).val());
                cart_info.records[key]=[id[key],quantity[key]];
        });
        if(cart_info.records.length==0){
            alert('Select atleast one checkbox to update items.');
        }else{
            cart_info.op_type="update";
            var json_obj = JSON.stringify(cart_info);
            $.ajax({
            url:"http://localhost/ecommerce/rest_api/api_cart_operations.php",
                type: "POST",
                dataType:"json",
                data:json_obj,
                success:function(data){
                    debugger;
                        cart_info.cart_changed=true;  
                        load_cart_table();                        
                }
            });                  
        }
        });
        
    //---------------End of Cart Section-------
              
        
    //--------------Side Navigation Bar Section---------

        //if User press one of the side navigation bar brand button
        $(document).on('click','.side_nav_brand_btn',function(){
            cards_info.search_type='brand';
            cards_info.search_term=$(this).data('id');
            cards_info.page_no=1;
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
            
            cards_info.search_type='category';
            cards_info.search_term=$(this).data('id');
            cards_info.page_no=1;
            load_cards();

            //Update sub heading with selected category information
            $("#sub_heading").text('Category: '+$(this).val());

            //clear previously active sidebar item
            $('#side_nav input').removeClass('active_side_bar');

            //Make selected category active
            $(this).addClass('active_side_bar'); 
        }); 
        

    //-----------End of Side Navigation Bar Section---------    

        //if user has pressed page button
        $(document).on('click','#pagination_body a',function(e){
            e.preventDefault();
            cards_info.page_no = $(this).attr('id');
            load_cards();
        });

    //---------View Product Detail Section--------------------    

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
                            product_view.image1 = data.data.p_image1;
                            product_view.image2 = data.data.p_image2;
                            product_view.image3 = data.data.p_image3;
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
                $('#product_image').attr('src',product_view.image1);
            }else if(image_no == 'image2'){
                $('#product_image').attr('src',product_view.image2);
            }else{
                $('#product_image').attr('src',product_view.image3);
            }
        });
        
        //If user has pressed close button in product detail page
        $('#product_close_btn').on('click',function(e){
            e.preventDefault();
            $('#product_modelbox').hide();
        });

        //if user has pressed add to cart button in product card
        $(document).on('click','.add_product_btn',function(){
                cart_info.product_id =$(this).data('id');
                cart_info.op_type = "add";
                cart_info.quantity = 1;
                var json_obj = JSON.stringify(cart_info);
                $.ajax({
                    url:"http://localhost/ecommerce/rest_api/api_cart_operations.php",
                    type: "POST",
                    dataType:"json",
                    data:json_obj,
                    success:function(data){
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
                            },2600); 
                            $('#total_cart_items').text(data.num_of_items);
                            $('#total_items_price').text('Total Price Rs: '+data.total_price+'/-');

                        }
                    }
                });
        }); 
    
    //------------End of View Product Detail Section------------   
        
    });
</script>
</html>