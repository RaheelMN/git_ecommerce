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

        <!-- Start of header -->
            <nav id="navbar1">
                <div class="navbar_contents">
                    <div id="left_nav">
                        <ul class="navbar1_ul"> 
                            <li class ="items">
                                <div id="logo">
                                    <img src="http://localhost/ecommerce/images/logo.jpg" alt="logo.jpg">
                                </div>
                            </li>
                            <li class="items">
                                <button id= "home_btn" class="nav_btn nav_active_btn ">Home</button>
                            </li>
                            <li class="items">
                                <button id= "register_btn" class="nav_btn">Register</button>
                            </li>
                            <li class="items">
                                <button id ="contact_btn"class="nav_btn">Contact</button>
                            </li>                        
                            <li class="items cart">
                                <a id="nav_cart_btn" href="#"><i class="fa-solid fa-cart-shopping" ></i><sup id="total_cart_items"></sup></a>
                            </li>
                            <li class="items cart_font" id="total_items_price">
                            </li>

                        </ul>
                    </div>
                    <div id="right_nav">
                        <ul class="navbar1_ul">
                            <li class="items">
                                    <button class="nav_btn" id="search_btn" name = "search_btn">Search</button>
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
                            <div id="guest_div"> Welcome Guest!</div>
                            <div id="user_name_div" class="nav_btn_s"></div>
                        </li>
                        <li class = "items">
                            <button class="nav_btn_s" id="login_btn">Login</button>
                            <button class="nav_btn_s" id="logout_btn">Logout</button>
                        </li>
                    </ul>
                </div>
            </nav>
        <!-- End of header  -->

        <!-- Start of Cards and Side navigation bar -->
            <div id="cards_modelbox">

                <!-- Section Header -->
                <div class="main_heading">
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
        <!-- End of Cards and Side navigation bar -->

        <!-- Start of View Product details page -->
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
                                <div class="text_center">
                                    <button id="product_close_btn">Close</button>
                                </div>
                            </div>                                                                     
                        </div> 
                    </div>
                </div>
            </div>
        <!-- End of View Product details page -->

        <!-- Start of Cart Table -->
            <div id ="cart_modelbox" >
                <div id="cart_container">
                        <div id="cart_contents">
                            <div class="product_heading">Cart item's Detail</div>
                            
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
                                    <div id="cart_message"></div>
                                </div>                                                        
                                <div class="product_row ">
                                    <div id = "cart_total_quantity"class="product_row_text cart_row_text">
                                    </div>
                                    <div id = "cart_total_price"class="product_row_text cart_row_text">
                                    </div>
                                </div>                                                      
                                <div class="product_row">
                                    <div class="text_center">
                                        <button id="cart_continue_shopping" class="cart_btn">Continue Shopping</button>
                                        <button id="cart_checkout_btn" class="cart_btn">Checkout</button>
                                    </div>
                                </div>                               
                            </div>
                        </div>
                </div>                      

            </div>
        <!-- End of Cart Table -->    

        <!-- Start of Registration Form -->
            <div id="registration_modelbox">
                <div class="form_linebreak"></div>           
                <div class="form_div">
                    <form action="" id="registration_form">
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
                            <div class="field_name form_redirect">Already registered? <a  id="reg_form_redirect" class="enable_underline" href="#">Login</a></div>
                            <div id="reg_form_msg" class="form_msg"></div>
                            <div class="form_linebreak"></div>
                        </div>
                    </form>               
                </div>
                <div class="form_linebreak"></div>
            </div>  
        <!-- End of Registration Form  -->
            
        <!-- Start of Login Form -->
            <div id="login_modelbox">
                <div class="form_linebreak"></div>           
                <div class="form_div">
                    <form action="" id="login_form">
                        <div class="form_header">
                            <h3>Login Form</h3>
                        </div>
                        <div class="form_linebreak"></div>
                        <div class="form_body">
                            <div class="form_row">
                                    <div class="field_name">User Email</div>
                                    <input type="email" class="form_input" name="login_email" id="login_email" value="" autocomplete="off">
                                    <div id="login_email_msg" class="field_err_msg"></div>
                            </div>
                            <div class="form_row">
                                    <div class="field_name">Password</div>
                                    <input type="password" class="form_input" name="login_password" id="login_password" >
                                    <div id="login_password_msg" class="field_err_msg"></div>
                            </div>
                            <div class="form_row">
                                    <div class="field_name"><a id="login_fpassword" href="#">Forgot Password</a></div>
                            </div>   
                            <div class="form_linebreak"></div>                                                                                                                                            
                            <div class="form_row">
                                <button class="form_btn" id="login_submit">Submit</button>
                                <button class="form_btn" id="login_close">Close</button>
                            </div>
                            <div class="field_name form_redirect">Don't have an account? <a  id="login_form_redirect" class="enable_underline" href="#">Register</a></div>
                            <div id="login_form_msg" class="form_msg"></div>
                        </div>
                    </form>               
                </div>
                <div class="form_linebreak"></div>
            </div>    
        <!-- End of login form        -->

        <!-- Start of Payment Form -->
            <div id="payment_modelbox">
                <div class="form_linebreak"></div>           
                <div class="form_div">
                    <form action="" id="payment_form">
                        <div class="form_header">
                            <h3>Payment Options</h3>
                        </div>
                        <div class="form_linebreak"></div>
                        <div class="form_body">
                            <div class="form_linebreak"></div>                                                                                                                                            
                            <div class="form_row text_center">
                                <a id="payment_online" class="payment_anchor enable_underline" href="#">Pay Online</a>
                                <a id="payment_offline" class="payment_anchor enable_underline" href="#">Pay Offline</a>
                            </div>
                            <div class="form_row text_center">
                                <div class="form_linebreak"></div>                              
                                <button class="form_btn" id="payment_close">Close</button>
                            </div>                        
                            <div id="payment_form_msg" class="form_msg"></div>
                            <div class="form_linebreak"></div> 
                        </div>
                    </form>               
                </div>
                <div class="form_linebreak"></div>
            </div>    
        <!-- End of Pyament form        -->

        <!-- Start of User profile section -->
            <div id="user_modelbox">

                <!-- Section Header -->
                <div class="main_heading">
                    <h3>Hidden Store</h3>
                </div>
                <div id="user_container">

                    <!-- Start of User's Side navigation bar and content area-->
                        <div id="user_sidebar_contents">
                                
                                <div id="user_sidebar_div">
                                    <ul id ="side_nav_ul">
                                        <li class="user_sidenav_header">Your Profile</li>
                                        <li id="user_edit_profile" class="user_sidenav_btn">Edit Profile</li>
                                        <li id="user_change_password" class="user_sidenav_btn">Change Password</li>
                                        <li id="user_delete_account" class="user_sidenav_btn">Delete Account</li>
                                        <li id="user_my_orders" class=" user_sidenav_btn">My Orders</li>
                                        <li id="user_pending_orders" class="user_sidenav_btn">Pending Orders</li>
                                    </ul>
                                </div>
                        </div>
                    <!-- End of User's Side navigation bar and content area-->

                        <div id="user_contents_div">
                            <div id="user_content_container">

                                <!-- Start of Pending orders modelbox -->
                                    <div id = "user_pending_modelbox">
                                        <div id="user_msg"></div>
                                    </div>
                                <!-- End of Pending orders modelbox -->

                                <!-- Start of User's Edit Profile modelbox -->
                                    <div id="user_edit_profile_modelbox">
                                        <div class="form_linebreak"></div>           
                                        <div class="form_div">
                                            <form action="" id="user_edit_profile_form">
                                                <div class="form_header">
                                                    <h3>Edit User's Profile Form</h3>
                                                </div>
                                                <div class="form_linebreak"></div>
                                                <div class="form_body">
                                                    <div class="form_row">
                                                            <div class="field_name">User Name</div>
                                                            <input type="text" class="form_input" name="edit_user_name" id="edit_user_name" value="" data-id="0" autocomplete="off">
                                                            <div id="edit_user_name_msg" class="field_err_msg"></div>
                                                    </div>
                                                    <div class="form_row">
                                                            <div class="field_name">Email</div>
                                                            <input type="email" class="form_input" name="edit_user_email" id="edit_user_email">
                                                            <div id="edit_user_email_msg" class="field_err_msg"></div>
                                                    </div>  
                                                    <div class="form_row">
                                                            <div class="field_name">Address</div>
                                                            <input type="text" class="form_input" name="edit_user_address" id="edit_user_address" value="" autocomplete="off">
                                                            <div id="edit_user_address_msg" class="field_err_msg"></div>
                                                    </div>  
                                                    <div class="form_row">
                                                            <div class="field_name">Contact</div>
                                                            <input type="text" class="form_input" name="edit_user_contact" id="edit_user_contact" value="" autocomplete="off">
                                                            <div id="edit_user_contact_msg" class="field_err_msg"></div>
                                                    </div> 
                                                    <div class="form_linebreak"></div>                                                                                                                                            
                                                    <div class="form_row">
                                                        <button class="form_btn" id="edit_user_submit">Submit</button>
                                                        <button class="form_btn" id="edit_user_close">Close</button>
                                                    </div>
                                                    <div id="edit_user_form_msg" class="form_msg"></div>
                                                    <div class="form_linebreak"></div>
                                                </div>
                                            </form>               
                                        </div>
                                        <div class="form_linebreak"></div>
                                    </div>
                                <!-- End of User's Edit Profile modelbox -->  

                                <!-- Start of User's change password modelbox -->
                                    <div id="user_change_password_modelbox">
                                        <div class="form_linebreak"></div>           
                                        <div class="form_div">
                                            <form action="" id="user_change_password_form">
                                                <div class="form_header">
                                                    <h3>Edit User's Password Form</h3>
                                                </div>
                                                <div class="form_linebreak"></div>
                                                <div class="form_body">
                                                    <div class="form_row">
                                                            <div class="field_name">Enter Old Password</div>
                                                            <input type="password" class="form_input" name="edit_user_opassword" id="edit_user_opassword">
                                                            <div id="edit_user_opassword_msg" class="field_err_msg"></div>
                                                    </div>                                    
                                                    <div class="form_row">
                                                            <div class="field_name">Enter Password</div>
                                                            <input type="password" class="form_input" name="edit_user_password" id="edit_user_password">
                                                            <div id="edit_user_password_msg" class="field_err_msg"></div>
                                                    </div>
                                                    <div class="form_row">
                                                            <div class="field_name">Confirm Password</div>
                                                            <input type="password" class="form_input" name="edit_user_cpassword" id="edit_user_cpassword">
                                                            <div id="edit_user_cpassword_msg" class="field_err_msg"></div>
                                                    </div>  
                                                    <div class="form_linebreak"></div>                                                                                                                                            
                                                    <div class="form_row">
                                                        <button class="form_btn" id="edit_user_csubmit">Submit</button>
                                                        <button class="form_btn" id="edit_user_cclose">Close</button>
                                                    </div>
                                                    <div id="edit_user_cform_msg" class="form_msg"></div>
                                                    <div class="form_linebreak"></div>
                                                </div>
                                            </form>               
                                        </div>
                                        <div class="form_linebreak"></div>
                                    </div>
                                <!-- End of User's change password modelbox -->  
                                
                                <!-- Start of User's Order modelbox -->
                                    <div id="user_order_modelbox">
                                        <table id="order_table" class="user_table" >
                                                <thead  style="border:1px solid black;">
                                                        <tr>
                                                            <th rowspan="2" class='left_align'>S.No</th>
                                                            <th rowspan="2">Invoice No</th>
                                                            <th rowspan="2">Total Products</th>
                                                            <th rowspan="2">Amount Due</th>
                                                            <th rowspan="2">Order Date</th>
                                                            <th rowspan="2">Complete/Incomplete</th>
                                                            <th rowspan="2">Status</th>

                                                        </tr>                                   
                                                </thead>
                                                <tbody id="order_table_body">
                                                </tbody>
                                        </table> 
                                    </div>  
                                <!-- End of User's Order modelbox -->       
                                
                                <!-- Start of User's Confirm modelbox -->
                                    <div id="user_confirm_modelbox" >
                                        <div class="form_div">
                                            <form action="" id="confirm_order_form" class="form">
                                                <div class="form_header">
                                                    <h3>Confirm Order</h3>                   
                                                </div>
                                                <div class="form_linebreak"></div>
                                                <div class="form_body">
                                                    <div class="form_row">
                                                        <div class="field_name">Invoice Number</div>
                                                        <input type="text" class="form_input" name="inv_or_form" id="inv_or_form" value="" autocomplete="off">
                                                        <div id="inv_or_form_msg" class="field_err_msg"></div>
                                                    </div>
                                                    <div class="form_row">
                                                        <div class="field_name">Amount Due</div>
                                                        <input type="text"  class="form_input" name="amt_or_form" id="amt_or_form" value="" autocomplete="off">
                                                        <div id="amt_or_form_msg" class="field_err_msg"></div>
                                                    </div>
                                                    <div class="form_row">
                                                        <select id="sel_pay_or_form" name="sel_pay_or_form"></select>
                                                        <div id="sel_pay_or_form_msg" class="field_err_msg"></div>
                                                    </div>

                                                    <div class="form_linebreak"></div>
                                                    <div class="form_row">
                                                        <input type="submit" class="form_btn" id="confirm_submit" name="confirm_submit" value="Submit">
                                                        <button class="form_btn" id="confirm_close">Close</button>
                                                    </div>
                                                    <div id="confirm_order_msg" class="form_msg"></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>                

                                <!-- End of User's Confirm modelbox -->                    
                            </div>                           
                        </div>
                </div>
            </div>
            
            <div class="form_linebreak"></div> 

        <!-- End of User profile section -->

        <!--Start of Section Footer -->
            <Footer>
                <p>&copy;2023. E-Commerce. All rights reserved</p>
            </Footer>
        <!-- End of Section Footer -->    


    </div>
</body>
<script src="http://localhost/ecommerce/js/jquery.js"></script>
<script>
    $(document).ready(function(){


    //-------Start of Objects Declaration-------------------

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
            current_modelbox:"cards_modelbox",
            last_modelbox:"",
            active_button:"home_btn",
            last_active_button:"",
            current_profile_modelbox:"order_pending_modelbox",
            last_profile_modelbox:"",
            current_profile_button:"order_pending_btn",
            last_profile_button:"",
            user_checkout:false,
            user_name:""
        }
    
    //------ End of Objects Declaration---------------------    


    //--------Start of Functions Declaration Section------------    

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
                dataType:"json",
                contentType: "application/json; charset=utf-8",
                data:json_obj,
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
                    data:json_obj,
                    contentType: "application/json; charset=utf-8",
                    dataType:"json",
                    success:function(data){
                        $('#total_cart_items').text(data.num_of_items);
                        $('#total_items_price').text('Total Price Rs: '+data.total_price+'/-');

                    }
                });
        }

        //Function loads cards and side navigation bar at startup
        function load_contents(){
            load_sidenav();
            load_cards();
        }

        //Function loads cards and side navigation bar when user state changes to cards_modelbox
        function load_cards_modelbox(){

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
                        data:json_obj,
                        contentType: "application/json; charset=utf-8",
                        dataType:"json",
                        success:function(data){

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
                                
                                //set cart state
                                cart_info.status = 'items';
                                cart_state();                                

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
                                    $('#cart_table_body').append('<tr class="table_row_border">'+
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

            //Hide last modelbox
            $('#'+user_info.last_modelbox).hide();                                          

            //Deactivate previous navbar button
            $('#'+user_info.last_active_button).removeClass("nav_active_btn");

            //Activate Current navbar button
            $('#'+user_info.active_button).addClass("nav_active_btn");

            //display current modelbox
            $('#'+user_info.current_modelbox).show();            

        }

        //Function to update user state
        function change_user_profile_state(){

            //Hide last profile modelbox
            $('#'+user_info.last_profile_modelbox).hide();                                          

            //Deactivate previous navbar button
            $('#'+user_info.last_profile_button).removeClass("user_active_btn");

            //Activate Current navbar button
            $('#'+user_info.current_profile_button).addClass("user_active_btn");

            //display current modelbox
            $('#'+user_info.current_profile_modelbox).show();            

        }   

        //Function to update navigation bar tags when user login or logout
        function update_navbar_tags(optype){

            switch(optype){

                case 'logged_in':
                    //change navbar login logout buttons
                    $('#login_btn').hide();
                    $('#logout_btn').show();
                    $('#guest_div').hide();
                    $('#user_name_div').text('Welcome '+user_info.user_name);
                    $('#user_name_div').show();

                    //Disable Register Button in navigation bar
                    $("#register_btn").addClass('no_hover nav_disabled_btn').prop("disabled", true); 
                    break; 
                    
                case 'logged_out':
                    //change navbar login logout buttons
                    $('#login_btn').show();
                    $('#logout_btn').hide();
                    $('#guest_div').show();
                    $('#user_name_div').text('');
                    $('#user_name_div').hide();

                    //Enable Register Button in navigation bar
                    $("#register_btn").removeClass('no_hover nav_disabled_btn').prop("disabled", false);
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
                    break;

                case 'noitem':
                    //disable cart table buttons and checkboxes
                    $("#update_all_checkbox").prop("disabled", true);
                    $("#delete_all_checkbox").prop("disabled", true);
                    $("#update_cart_btn").addClass('no_hover').prop("disabled", true);
                    $("#delete_cart_btn").addClass('no_hover').prop("disabled", true);
                    $("#cart_checkout_btn").addClass('no_hover').prop("disabled", true);
                    break;
                 
                case 'items':
                    //Enable cart table buttons and checkboxes
                    $("#update_all_checkbox").prop("disabled", false);
                    $("#delete_all_checkbox").prop("disabled", false);
                    $("#update_cart_btn").removeClass('no_hover').prop("disabled", false);
                    $("#delete_cart_btn").removeClass('no_hover').prop("disabled", false);
                    $("#cart_checkout_btn").removeClass('no_hover').prop("disabled", false);
                    break;                    
                
            }
        }

        //This function clear all error messages of Registration Form
        function clear_registration_form_msgs(){
                        // clear field messages
                        $('#reg_name_msg').html('');
                        $('#reg_email_msg').html('');
                        $('#reg_password_msg').html('');
                        $('#reg_cpassword_msg').html('');
                        $('#reg_address_msg').html('');
                        $('#reg_contact_msg').html('');
        }        

        //This function clear all error messages of Login Form
        function clear_login_form_msgs(){
                        // clear field messages
                        $('#login_email_msg').html('');
                        $('#login_password_msg').html('');
        } 

        //Function to check user session status
        function check_user_session(){
            $.ajax({
                url: "http://localhost/ecommerce/rest_api/api_session_status.php",
                type: "GET",
                dataType:"json",
                success: function(data){
                    user_info.last_modelbox=user_info.current_modelbox;
                    if(data.session_active){
                        user_info.user_name=data.user_name;
                        //change navbar tags
                        update_navbar_tags('logged_in');
                    }
                }

            });
        }
        
        //This function clear all error messages of Payment modelbox
        function clear_payment_msg(){
            $('#payment_form_msg').text('');              
        }

     //This function work on user's pending orders 
        function user_pending_status(){
            $.ajax({
                url:"http://localhost/ecommerce/rest_api/api_pending_orders_status.php",
                type:"GET",
                dataType:"json",
                success: function(data){
                $('#user_msg').text('You have '+data.orders+' pending orders');
                }
            });
        }

        // This function clear all error messages of Edit user profile modelbox
        function clear_edit_profile_form_msgs(){
            $('#edit_user_name_msg').text('');
            $('#edit_user_email_msg').text('');
            $('#edit_user_address_msg').text('');
            $('#edit_user_contact_msg').text('');
        }     

        // This function clear all error messages of Change user password modelbox
        function clear_user_change_password_form_msgs(){
            $('#edit_user_opassword_msg').text('');
            $('#edit_user_password_msg').text('');
            $('#edit_user_cpassword_msg').text('');
        }  

    //----------End of Functions Declaration Section------------     
    
    
    //-------Start of Functions called at startup-----------

        //load cards and side navigation bar at startup   
        load_contents();

        //load user's cart information in navigation bar
        load_cart_info();

        //Check if user is already logged in
        check_user_session();

    //-------End of Functions called at startup-----------    

        //if user has pressed Home button in navigation bar
        $('#home_btn').on('click',function(e){
            e.preventDefault();

            //Set user state
            user_info.last_modelbox=user_info.current_modelbox;
            user_info.current_modelbox = 'cards_modelbox';
            user_info.last_active_button = user_info.active_button;
            user_info.active_button = "home_btn";
            change_user_state();
            load_cards_modelbox();          
        });

        //if user has pressed search button in navigation bar
        $('#search_btn').on('click',function(){
            
            var search = $('#input_search').val();
            if(search != ""){
                //Set user state
                user_info.last_modelbox=user_info.current_modelbox;
                user_info.current_modelbox = 'cards_modelbox';
                user_info.last_active_button = user_info.active_button;
                user_info.active_button = "search_btn";
                change_user_state();

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

        //if user has pressed page button in pagination of cards
        $(document).on('click','#pagination_body a',function(e){
            e.preventDefault();
            cards_info.page_no = $(this).attr('id');
            load_cards();
        });



    //-------Start of Registration Section----------------------   

        //if user has pressed Registration button in navigation bar
        $('#register_btn').on('click',function(){
            //set  user state
            user_info.last_modelbox=user_info.current_modelbox;
            user_info.current_modelbox = "registration_modelbox";
            user_info.last_active_button = user_info.active_button;
            user_info.active_button = "register_btn";              
            change_user_state();   
            
            //Reset form fields
            $('#registration_form').trigger('reset');

            //clear form's field messages
            clear_registration_form_msgs();               
        });   

        //if user has pressed Close button Registration Form
        $('#reg_close_btn').on('click',function(e){

            //if user has pressed checkout button in cart table then cancel payement
            user_info.user_checkout=false;
            e.preventDefault();
            //Reset form input fields
            $('#registration_form').trigger('reset'); 

            //set  user state
            user_info.last_modelbox=user_info.current_modelbox;
            user_info.current_modelbox = "cards_modelbox";
            user_info.last_active_button = user_info.active_button;
            user_info.active_button = "home_btn";              
            change_user_state();          
        });   

        //if user has pressed Login link in Registration form
        $('#reg_form_redirect').on('click',function(e){
            e.preventDefault();
            //set  user state
            user_info.last_modelbox=user_info.current_modelbox;
            user_info.current_modelbox = "login_modelbox";
            user_info.last_active_button = user_info.active_button;
            user_info.active_button = "login_btn";              
            change_user_state();                       
        });  
        
        //If user has pressed Submit button in Registration form
        $('#reg_submit').on('click',function(e){

            //prevent default setting 
            e.preventDefault(); 

            //clear form's field messages
            clear_registration_form_msgs();

            var form_error=false;

            //retrive product name from input field
            var user_name = $('#reg_name').val();

            //check if User has entered name
            if(user_name == ""){
                $('#reg_name_msg').fadeIn('slow');
                $('#reg_name_msg').text('Enter Name');
                form_error = true;
            }

            //retrive user email from input field
            var user_email = $('#reg_email').val();

            //check if User has entered email
            if(user_email == ""){
                $('#reg_email_msg').fadeIn('slow');
                $('#reg_email_msg').text('Enter Email');
                form_error = true;
            }

            //retrive Password from input field
            var user_password = $('#reg_password').val();

            //check if User has entered password 
            if(user_password == ""){
                $('#reg_password_msg').fadeIn('slow');
                $('#reg_password_msg').text('Enter Password');
                form_error = true;
            }
            
            //retrive Confirm Password from input field
            var user_cpassword = $('#reg_cpassword').val();

            //check if User has entered Confirm password 
            if(user_cpassword == ""){
                $('#reg_cpassword_msg').fadeIn('slow');
                $('#reg_cpassword_msg').text('Enter Password');
                form_error = true;
            }else if(user_password != user_cpassword){
                $('#reg_cpassword_msg').fadeIn('slow');
                $('#reg_cpassword_msg').text('Password does not match');
                form_error = true;                            
            } 
            
            //retrive Address from input field
            var user_address = $('#reg_address').val();

            //check if User has entered address
            if(user_address == ""){
                $('#reg_address_msg').fadeIn('slow');
                $('#reg_address_msg').text('Enter Address');
                form_error = true;
            } 

            //retrive Contact from input field
            var user_contact = $('#reg_contact').val();

            //check if User has entered contact
            if(user_contact == ""){
                $('#reg_contact_msg').fadeIn('slow');
                $('#reg_contact_msg').text('Enter Contact Number');
                form_error = true;
            } 

            //check if there is no form error
            if(!form_error){
                
                //convert variable to object
                var obj = {name:user_name,
                            email:user_email,
                            password:user_password,
                            address:user_address,
                            contact:user_contact
                };

                //convert object to json object
                var json_obj = JSON.stringify(obj);
                    
                $.ajax({
                    url: "http://localhost/ecommerce/rest_api/api_register_user.php",
                    type:"POST",
                    data: json_obj,
                    contentType: "application/json; charset=utf-8",
                    dataType:"json",
                    success: function(data){
                        debugger;
                        // if form field has error
                        if(data.field_error){
                            if(data.name.error){
                                $('#reg_name_msg').text(data.name.message);
                            }
                            if(data.email.error){
                                $('#reg_email_msg').text(data.email.message);
                            } 
                            if(data.password.error){
                                $('#reg_password_msg').text(data.password.message);
                            } 
                            if(data.address.error){
                                $('#reg_address_msg').text(data.address.message);
                            }      
                            if(data.contact.error){
                                $('#reg_contact_msg').text(data.contact.message);
                            }                                                                                                                                                                           
                        }else if(data.form_error){
                            $('#reg_form_msg').fadeIn('slow');
                            $('#reg_form_msg').removeClass('suc_msg pro_msg').addClass('err_msg').text(data.form_msg);
                            setTimeout(function(){
                                $('#reg_form_msg').fadeOut('slow');
                            },3000);                                     
                        }else{
                            $('#reg_form_msg').fadeIn('slow');
                            $('#reg_form_msg').removeClass('err_msg pro_msg').addClass('suc_msg').text(data.form_msg);
                            setTimeout(function(){
                                $('#reg_form_msg').fadeOut('slow');
                            },3000);     
                            
                            //Reset form fields
                            $('#registration_form').trigger('reset');

                            //clear form's field messages
                            clear_registration_form_msgs();

                            //Set user status
                            user_info.last_modelbox=user_info.current_modelbox;
                            user_info.user_name = data.user_name;

                            //change navbar tags
                            update_navbar_tags('logged_in');                                      

                            //check if user has pressed checkout button in Cart Table
                            if(user_info.user_checkout){
                                //set user state
                                user_info.current_modelbox="payment_modelbox";
                                user_info.last_active_button = user_info.active_button;
                                user_info.active_button = "nav_cart_btn";                                  
                                change_user_state();        
                            }else{
                                //set  user state
                                user_info.current_modelbox = "cards_modelbox";
                                user_info.last_active_button = user_info.active_button;
                                user_info.active_button = "home_btn";                                  
                                change_user_state(); 
                            }                                                          
                        }
                    }
                });
            }
            
        });        
                        
        
    //-------End of Registration Section----------------------    

    //-------Start of Login Section----------------------   

        //if user has pressed Login button in navigation bar
        $('#login_btn').on('click',function(e){
            e.preventDefault();
            //set  user state
            user_info.last_modelbox=user_info.current_modelbox;
            user_info.current_modelbox = "login_modelbox";
            user_info.last_active_button = user_info.active_button;
            user_info.active_button = "login_btn";            
            change_user_state();   
            
            //Reset form fields
            $('#login_form').trigger('reset');

            //clear form's field messages
            clear_login_form_msgs();            
        });   

        //if user has pressed Close button Login Form
        $('#login_close').on('click',function(e){
            e.preventDefault();

            //check if user has previously pressed checkin button in Cart Table form
            if(user_info.user_checkout){
                user_info.user_checkout=false;
            }
            //set  user state
            user_info.last_modelbox=user_info.current_modelbox;
            user_info.current_modelbox = "cards_modelbox";
            user_info.last_active_button = user_info.active_button;
            user_info.active_button = "home_btn";            
            change_user_state();          
        }); 
        
        //if user has pressed Register link in form
        $('#login_form_redirect').on('click',function(e){
            e.preventDefault();
            //set  user state
            user_info.last_modelbox=user_info.current_modelbox;
            user_info.current_modelbox = "registration_modelbox";
            user_info.last_active_button = user_info.active_button;
            user_info.active_button = "register_btn";            
            change_user_state();              
        });

        //if user has pressed Submit button Login Form
        $('#login_submit').on('click',function(e){
            e.preventDefault();  

            //clear form's field messages
            clear_login_form_msgs();

            var form_error=false;

            //retrive user email from input field
            var user_email = $('#login_email').val();

            //check if User has entered email
            if(user_email == ""){
                $('#login_email_msg').fadeIn('slow');
                $('#login_email_msg').text('Enter Email');
                form_error = true;
            }

            //retrive Password from input field
            var user_password = $('#login_password').val();

            //check if User has entered password 
            if(user_password == ""){
                $('#login_password_msg').fadeIn('slow');
                $('#login_password_msg').text('Enter Password');
                form_error = true;
            }

            //check if there is no form error
            if(!form_error){
                
                //convert variable to object
                var obj = {
                            email:user_email,
                            password:user_password,
                };

                //convert object to json object
                var json_obj = JSON.stringify(obj);
                    
                $.ajax({
                    url: "http://localhost/ecommerce/rest_api/api_login_user.php",
                    type:"POST",
                    data: json_obj,
                    dataType:"json",
                    contentType: "application/json; charset=utf-8",
                    success: function(data){

                        // if form field has error
                        if(data.field_error){
                            if(data.email.error){
                                $('#login_email_msg').text(data.email.message);
                            }
 
                            if(data.password.error){
                                $('#login_password_msg').text(data.password.message);
                            } 
                                                                                                                                                                         
                        }else if(data.form_error){
                            $('#login_form_msg').fadeIn('slow');
                            $('#login_form_msg').removeClass('suc_msg pro_msg').addClass('err_msg').text(data.form_msg);
                            setTimeout(function(){
                                $('#reg_form_msg').fadeOut('slow');
                            },3000);                                     
                        }else{ 
                            
                            //Reset form fields
                            $('#login_form').trigger('reset');

                            //clear form's field messages
                            clear_login_form_msgs();

                            //set user login state
                            user_info.user_name = data.user_name;
                            user_info.last_modelbox=user_info.current_modelbox;

                            //change navbar tags
                            update_navbar_tags('logged_in');                                     

                            //check if user has pressed checkout button in Cart Table
                            if(user_info.user_checkout){
                                //set user state
                                user_info.current_modelbox="payment_modelbox";
                                change_user_state();        
                            }else{
                                //set  user state
                                user_info.current_modelbox = "cards_modelbox";
                                user_info.last_active_button = user_info.active_button;
                                user_info.active_button = "home_btn";                                
                                change_user_state(); 
                            }                          
                        }
                    }
                });
            }
            
        }); 

        //If user has pressed Logout button
        $('#logout_btn').on('click',function(e){
            e.preventDefault();

            if(confirm('Are you sure to logout?')){

                //End Session
                $.ajax({
                    url:"http://localhost/ecommerce/rest_api/api_logout_user.php",
                    success: function(data){
                        debugger;
                    }
                });   
    
                //Set user status
                user_info.user_name="";
                user_info.user_checkout=false;

                //change navbar tags
                update_navbar_tags('logged_out');

                //set  user state
                user_info.last_modelbox=user_info.current_modelbox;
                user_info.current_modelbox = "cards_modelbox";
                user_info.last_active_button = user_info.active_button;
                user_info.active_button = "home_btn";                
                change_user_state();          
            }

        });

    //-------End of Login Section----------------------   

    //---------Start of Cart Section-------------

        //if user has pressed cart button in navigation bar
        $('#nav_cart_btn').on('click',function(e){
            e.preventDefault();

            //Set user state
            user_info.last_modelbox=user_info.current_modelbox;
            user_info.current_modelbox = "cart_modelbox";
            user_info.last_active_button=user_info.active_button;
            user_info.active_button = "nav_cart_btn";
            change_user_state();            

            //load cart table page
            load_cart_table();
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


            cart_info.op_type="delete";
            var json_obj = JSON.stringify(cart_info);
            $.ajax({
            url:"http://localhost/ecommerce/rest_api/api_cart_operations.php",
                type: "POST",
                data:json_obj,
                contentType: "application/json; charset=utf-8",
                dataType:"json",
                success:function(data){
                    if(data.error){
                        $('#cart_message').fadeIn('slow').text(data.message);
                    }else{ 
                        cart_info.cart_changed=true;                        
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
            if(!$(this).prop('checked')){
                $('#update_all_checkbox').prop('checked',false);
            }
        });

        //if user has pressed update button in cart table form
        $('#update_cart_btn').on('click',function(){

        //clear cart_info records array
        cart_info.records = [];
        var id=0;
        var quantity=0;
        //check if user has checked any update checkbox
        $('.update_checkbox:checked').each(function(key){
            id=$(this).val();
            let input_id = 'cart_'+id;
            quantity=($('#'+input_id).val());
            cart_info.records[key]=[id,quantity];
        });
        if(cart_info.records.length==0){
            alert('Select atleast one checkbox to update items.');
        }else{
            cart_info.op_type="update";
            var json_obj = JSON.stringify(cart_info);
            $.ajax({
            url:"http://localhost/ecommerce/rest_api/api_cart_operations.php",
                type: "POST",
                data:json_obj,
                contentType: "application/json; charset=utf-8",
                dataType:"json",
                success:function(data){
                        cart_info.cart_changed=true;  
                        load_cart_table();                        
                }
            });                  
        }
        });

        //If user has pressed checkout button in cart table form
        $('#cart_checkout_btn').on('click',function(e){
            e.preventDefault();
            user_info.user_checkout=true;
            //check if user is logged in
            $.ajax({
                url: "http://localhost/ecommerce/rest_api/api_session_status.php",
                type: "GET",
                dataType:"json",
                success: function(data){

                    user_info.last_modelbox=user_info.current_modelbox;
                    if(data.session_active){
                        //Reset payment page
                        clear_payment_msg();
                        //set user state
                        user_info.current_modelbox = "payment_modelbox";
                        user_info.last_active_button = user_info.active_button;
                        user_info.active_button = "nav_cart_btn";                            
                        change_user_state();
                    }else{
                        //set user state
                        user_info.current_modelbox = "login_modelbox";
                        user_info.last_active_button = user_info.active_button;
                        user_info.active_button = "login_btn";                        
                        change_user_state();
                    }
                }

            });

        });

        //If user has pressed continue shopping button in cart table form
        $('#cart_continue_shopping').on('click',function(e){
            e.preventDefault();
            //Set user state
            user_info.last_modelbox=user_info.current_modelbox;
            user_info.current_modelbox = 'cards_modelbox';
            user_info.last_active_button = user_info.active_button;
            user_info.active_button = "home_btn";            
            change_user_state();
            load_cards_modelbox();    

        });        
        
    //---------------End of Cart Section-------
              
    //-------Start of Payment Section----------------------   

        //if user has pressed Close button Pyament Form
        $('#payment_close').on('click',function(e){

            e.preventDefault();
            debugger;
            //Reset user info
            user_info.user_checkout=false;
 

            //set  user state
            user_info.last_modelbox=user_info.current_modelbox;
            user_info.current_modelbox = "cards_modelbox";
            user_info.last_active_button = user_info.active_button;
            user_info.active_button = "home_btn";              
            change_user_state();          
        });   
        
        //If user has pressed pay online 
        $('#payment_online').on('click',function(e){
            e.preventDefault();
            alert('Online payment not implemented yet');
        });

        //If user has pressed pay offline 
        $('#payment_offline').on('click',function(e){
            e.preventDefault();
   
            //Insert user order
            $.ajax({
                url:"http://localhost/ecommerce/rest_api/api_add_order.php",
                type:"GET",
                dataType:"json",
                success:function(data){
                    debugger;
                    if(data.error){
                        $('#payment_form_msg').text(data.message);                      
                    }
                    else{

                        //Reset cart information in navigation bar
                        load_cart_info();
                        //set  user state
                        user_info.last_modelbox=user_info.current_modelbox;
                        user_info.current_modelbox = "user_modelbox";
                        user_info.last_active_button = user_info.active_button;
                        user_info.active_button = "user_name_div";              
                        change_user_state(); 

                        //set user profile state
                        user_info.last_profile_modelbox=user_info.current_profile_modelbox;
                        user_info.current_profile_modelbox = "user_pending_modelbox";
                        user_info.last_profile_button = user_info.current_profile_button;
                        user_info.current_profile_button = "user_pending_orders";              
                        change_user_profile_state();                        
                        user_pending_status();              
                    }
                }
            });


        });        
                        
        
    //-------End of Payment Section----------------------    
    

    //---------Start of Side Navigation Bar Section---------

        //if User press one of the side navigation bar brand button
        $(document).on('click','.side_nav_brand_btn',function(){

            //Deactivate Current navbar button
            $('#'+user_info.active_button).removeClass("nav_active_btn");

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

            //Deactivate Current navbar button
            $('#'+user_info.active_button).removeClass("nav_active_btn");

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

    //------Start of View Product Detail Section--------------------    

        //if user has pressed view button in product card
        $(document).on('click','.view_product_btn',function(){
                var product_id =$(this).data('id');
                var obj = {product_id:product_id};
                var json_obj = JSON.stringify(obj);
                $.ajax({
                    url:"http://localhost/ecommerce/rest_api/api_fetch_single_product.php",
                    type: "POST",
                    data:json_obj,
                    contentType: "application/json; charset=utf-8",
                    dataType:"json",
                    success:function(data){
                        debugger;
                        if(!data.error){
                            $('#product_modelbox').show();
                            product_view.image1 = data.p_image1;
                            product_view.image2 = data.p_image2;
                            product_view.image3 = data.p_image3;
                            $('#product_title').html(data.p_title);
                            $('.image_btn').removeClass('active_image_btn');
                            $('#image1').addClass('active_image_btn');
                            $('#product_image').attr('src',data.p_image1);
                            $('#product_desc').html(data.p_description);
                            $('#product_brand').html(data.brand);
                            $('#product_category').html(data.category);
                            $('#product_price').html('Rs: '+data.p_price+'/-');
                            if(data.stock){
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
                    data:json_obj,
                    contentType: "application/json; charset=utf-8",
                    dataType:"json",
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

//------Start of User Profile Section--------------------

        //If user press user name in navigation bar
        $('#user_name_div').on('click',function(){
            //set  user state
            user_info.last_modelbox=user_info.current_modelbox;
            user_info.current_modelbox = "user_modelbox";
            user_info.last_active_button = user_info.active_button;
            user_info.active_button = "user_name_div";              
            change_user_state();  

            //set user profile state
            user_info.last_profile_modelbox=user_info.current_profile_modelbox;
            user_info.current_profile_modelbox = "user_pending_modelbox";
            user_info.last_profile_button = user_info.current_profile_button;
            user_info.current_profile_button = "user_pending_orders";              
            change_user_profile_state();                        
            user_pending_status();                          
        });

    // -----------Start of user profile Edit Section------------    

        //If user press Edit Profile button in side navigation bar
        $('#user_edit_profile').on('click',function(e){
            e.preventDefault();

            //set user profile state
            user_info.last_profile_modelbox=user_info.current_profile_modelbox;
            user_info.current_profile_modelbox = "user_edit_profile_modelbox";
            user_info.last_profile_button = user_info.current_profile_button;
            user_info.current_profile_button = "user_edit_profile";              
            change_user_profile_state();   

            //Reset form fields
            $('#user_edit_profile_form').trigger('reset');

            //clear form's field messages
            clear_edit_profile_form_msgs();
            
            $.ajax({
                url:"http://localhost/ecommerce/rest_api/api_fetch_user_profile.php",
                type:"GET",
                dataType:"json",
                success:function(data){
                    if(!data.error){
                        debugger;
                        $('#edit_user_name').val(data.record.user_name); 
                        $('#edit_user_email').val(data.record.user_email);
                        $('#edit_user_address').val(data.record.user_address);
                        $('#edit_user_contact').val(data.record.user_contact);      
                    }
                }
            });
            
            
        });   
    
        //If user press Submit button in Edit User Profile form 
        $('#edit_user_submit').on('click',function(e){
            e.preventDefault();

            //clear form's field messages
            clear_edit_profile_form_msgs();

            var form_error=false;

            //retrive product name from input field
            var user_name = $('#edit_user_name').val();

            //check if User has entered name
            if(user_name == ""){
                $('#edit_user_name_msg').fadeIn('slow');
                $('#edit_user_name_msg').text('Enter Name');
                form_error = true;
            }

            //retrive user email from input field
            var user_email = $('#edit_user_email').val();

            //check if User has entered email
            if(user_email == ""){
                $('#edit_user_email_msg').fadeIn('slow');
                $('#edit_user_email_msg').text('Enter Email');
                form_error = true;
            }

            //retrive Address from input field
            var user_address = $('#edit_user_address').val();

            //check if User has entered address
            if(user_address == ""){
                $('#edit_user_address_msg').fadeIn('slow');
                $('#edit_user_address_msg').text('Enter Address');
                form_error = true;
            } 

            //retrive Contact from input field
            var user_contact = $('#edit_user_contact').val();

            //check if User has entered contact
            if(user_contact == ""){
                $('#edit_user_contact_msg').fadeIn('slow');
                $('#edit_user_contact_msg').text('Enter Contact Number');
                form_error = true;
            } 

            //check if there is no form error
            if(!form_error){
                debugger;
                //convert variable to object
                var obj = { 
                            name:user_name,
                            email:user_email,
                            address:user_address,
                            contact:user_contact
                };

                //convert object to json object
                var json_obj = JSON.stringify(obj);
                    
                $.ajax({
                    url: "http://localhost/ecommerce/rest_api/api_update_user.php",
                    type:"POST",
                    data: json_obj,
                    contentType: "application/json; charset=utf-8",
                    dataType:"json",
                    success: function(data){
                        debugger;
                        // if form field has error
                        if(data.field_error){
                            if(data.name.error){
                                $('#edit_user_name_msg').text(data.name.message);
                            }
                            if(data.email.error){
                                $('#edit_user_email_msg').text(data.email.message);
                            } 
                            if(data.address.error){
                                $('#edit_user_address_msg').text(data.address.message);
                            }      
                            if(data.contact.error){
                                $('#edit_user_contact_msg').text(data.contact.message);
                            }                                                                                                                                                                           
                        }else if(data.form_error){
                            $('#edit_user_form_msg').fadeIn('slow');
                            $('#edit_user_form_msg').removeClass('suc_msg pro_msg').addClass('err_msg').text(data.form_msg);
                            setTimeout(function(){
                                $('#edit_user_form_msg').fadeOut('slow');
                            },3000);                                     
                        }else{
                            $('#edit_user_form_msg').fadeIn('slow');
                            $('#edit_user_form_msg').removeClass('err_msg pro_msg').addClass('suc_msg').text(data.form_msg);
                            setTimeout(function(){
                                $('#edit_user_form_msg').fadeOut('slow');
                            },3000);     
                            
                            //Reset form fields
                            $('#user_edit_profile_form').trigger('reset');

                            //clear form's field messages
                            clear_edit_profile_form_msgs();

                            $('#user_name_div').text('Welcome '+user_name);                                                         
                        }
                    }
                });
            }
            
                                              
        });  
        
        //if user has pressed Close button Edit User Profile form 
        $('#edit_user_close').on('click',function(e){

            e.preventDefault();

            //set user profile state
            user_info.last_profile_modelbox=user_info.current_profile_modelbox;
            user_info.current_profile_modelbox = "user_pending_modelbox";
            user_info.last_profile_button = user_info.current_profile_button;
            user_info.current_profile_button = "user_pending_orders";              
            change_user_profile_state();                        
            user_pending_status();        
        });         
                      
        
    // -----------End of user profile Edit Section------------    
 
    
    // -----------Start of user profile Change password Section------------ 

        //If user press Change password button in side navigation bar
        $('#user_change_password').on('click',function(e){

            e.preventDefault();
            debugger;
            //Reset form fields
            $('#user_change_password_form').trigger('reset');

            //clear form's field messages
            clear_user_change_password_form_msgs();

            //set user profile state
            user_info.last_profile_modelbox=user_info.current_profile_modelbox;
            user_info.current_profile_modelbox = "user_change_password_modelbox";
            user_info.last_profile_button = user_info.current_profile_button;
            user_info.current_profile_button = "user_change_password";              
            change_user_profile_state();                                               
        });  
        

        //If user press Submit button in change user password form
        $('#edit_user_csubmit').on('click',function(e){

            debugger;
            e.preventDefault();

            //clear form's field messages
            clear_user_change_password_form_msgs();            

            var form_error = false;

            //retrive Old Password from input field
            var old_password = $('#edit_user_opassword').val();

            //check if User has entered password 
            if(old_password == ""){
                $('#edit_user_opassword_msg').fadeIn('slow');
                $('#edit_user_opassword_msg').text('Enter Password');
                form_error = true;
            }           

            //retrive Password from input field
            var password = $('#edit_user_password').val();

            //check if User has entered password 
            if(password == ""){
                $('#edit_user_password_msg').fadeIn('slow');
                $('#edit_user_password_msg').text('Enter Password');
                form_error = true;
            }

            //retrive Confirm Password from input field
            var cpassword = $('#edit_user_cpassword').val();

            //check if User has entered Confirm password 
            if(cpassword == ""){
                $('#edit_user_cpassword_msg').fadeIn('slow');
                $('#edit_user_cpassword_msg').text('Enter Password');
                form_error = true;
            }else if(password != cpassword){
                $('#edit_user_password_msg').fadeIn('slow');
                $('#edit_user_password_msg').text('Password does not match');
                form_error = true;                            
            } 

            //check if there is no form error
            if(!form_error){
                debugger;
                //convert variable to object
                var obj = { old_password:old_password,
                            password:password,
                };

                //convert object to json object
                var json_obj = JSON.stringify(obj);
                    
                $.ajax({
                    url: "http://localhost/ecommerce/rest_api/api_change_user_password.php",
                    type:"POST",
                    data: json_obj,
                    contentType: "application/json; charset=utf-8",
                    dataType:"json",
                    success: function(data){
                        debugger;
                        // if form field has error
                        if(data.field_error){

                            if(data.password.error){
                                $('#edit_user_password_msg').text(data.password.message);
                            }
                            if(data.old_password.error){
                                $('#edit_user_opassword_msg').text(data.old_password.message);
                            }

                        }else if(data.form_error){
                            $('#edit_user_cform_msg').fadeIn('slow');
                            $('#edit_user_cform_msg').removeClass('suc_msg pro_msg').addClass('err_msg').text(data.form_msg);
                            setTimeout(function(){
                                $('#edit_user_cform_msg').fadeOut('slow');
                            },3000);                                     
                        }else{
                            $('#edit_user_cform_msg').fadeIn('slow');
                            $('#edit_user_cform_msg').removeClass('err_msg pro_msg').addClass('suc_msg').text(data.form_msg);
                            setTimeout(function(){
                                $('#edit_user_cform_msg').fadeOut('slow');
                            },3000);     
                            
                            //Reset form fields
                            $('#user_change_password_form').trigger('reset');

                            //clear form's field messages
                            clear_user_change_password_form_msgs();                                                         
                        }
                    }
                });
            }            
 
            
                                              
        });         

        //if user has pressed Close button in Change User Password form 
        $('#edit_user_cclose').on('click',function(e){

            e.preventDefault();

            //set user profile state
            user_info.last_profile_modelbox=user_info.current_profile_modelbox;
            user_info.current_profile_modelbox = "user_pending_modelbox";
            user_info.last_profile_button = user_info.current_profile_button;
            user_info.current_profile_button = "user_pending_orders";              
            change_user_profile_state();                        
            user_pending_status();        
        });          
        
    // -----------Endo of user profile Change password Section------------ 

        //If user press Delete Account button in side navigation bar
        $('#user_delete_account').on('click',function(e){
            e.preventDefault();
            alert('Are you sure to delete account?');                                              
        });
        
        //If user press My Orders button in side navigation bar
        $('#user_my_orders').on('click',function(e){
            e.preventDefault();
            //set user profile state
            user_info.last_profile_modelbox=user_info.current_profile_modelbox;
            user_info.current_profile_modelbox = "user_order_modelbox";
            user_info.last_profile_button = user_info.current_profile_button;
            user_info.current_profile_button = "user_my_orders";              
            change_user_profile_state();    

            $.ajax({
                url:"http://localhost/ecommerce/rest_api/api_fetch_orders.php",
                type:'GET',
                dataType:"json",
                success:function(data){

                    //clear table
                    $('#order_table_body').html('');

                    if(!data.error){
                        $.each(data.records, function(key,value){
                            var payment='';
                            if(value.order_status == 'Pending'){
                                    payment = "incomplete";
                            }else{
                                payment = "complete";
                            }
                            $('#order_table_body').append("<tr class='table_row_border'>"+
                                                        "<td class='left_align'>"+(key+1)+"</td>"+  
                                                        "<td>"+value.invoice_number+"</td>"+  
                                                        "<td>"+value.total_products+"</td>"+
                                                        "<td>"+value.amount_due+"</td>"+
                                                        "<td>"+value.order_date+"</td>"+
                                                        "<td>"+payment+"</td>"+
                                                        "<td><a class='confirm_order' href='#' data-id ='"+value.order_id+"'>Confirm</a></td>"+
                                                            "<tr>");
                        });
                    }
                  
                }

            });           

        }); 
        

        // If user press confirm in My Order table
        $(document).on('click','.confirm_order',function(e){
            e.preventDefault();
            debugger;
            var order_id = $(this).attr('data-id');
        //     var obj ={order_id:order_id};
        //     var json_obj=JSON.stringify(obj);

        //     $.ajax({
        //         url:"http://localhost/ecommerce/rest_api/api_fetch_single_order.php",
        //         type:'POST',
        //         data:json_obj,
        //         contentType:"application/json",
        //         dataType:"json",
        //         success:function(data){
        //             debugger;
        //         }

         });        
        

         //If user press Submit in Confirm Order Form
         $('#confirm_submit').on('click',function(e){
            e.preventDefault();
            alert('you have submitted');
         });

         //If user press Close in Confirm Order Form
         $('#confirm_close').on('click',function(e){
            e.preventDefault();
            alert('you have closed');
         });         
        
        //If user press Pending Orders button in side navigation bar
        $('#user_pending_orders').on('click',function(e){
            e.preventDefault();
            //set user profile state
            user_info.last_profile_modelbox=user_info.current_profile_modelbox;
            user_info.current_profile_modelbox = "user_pending_modelbox";
            user_info.last_profile_button = user_info.current_profile_button;
            user_info.current_profile_button = "user_pending_orders";              
            change_user_profile_state();
            
            user_pending_status();   
        });         


//------End of User Profile Section--------------------    
        

    });
</script>
</html>