<?php

    // To prevent cache use following code 
    header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
    header('Cache-Control: no-store, no-cache, must-revalidate');
    header('Cache-Control: post-check=0, pre-check=0', FALSE);
    header('Pragma: no-cache');

   //Authenticate the host
   session_start();

   //check if host not authorize to access page
   if(!isset($_SESSION['admin_role'])){


        // //check if host has sent cookie
        if(!empty($_COOKIE)){
    
            //destroy host's browser cookie
            $cookie_name="";
            foreach($_COOKIE as $key=>$value){
                $cookie_name = $key;
            }
                setcookie($cookie_name,"",time()-42000,"/");
        }
        else{
            //destroy new session
            setcookie(session_name(),"",time()-42000,"/");
        }


    //    rediect host to login page
       header("location:http://localhost/ecommerce/admin/admin_login.php");
   }

     //insert below line in navigation bar welcome message
    // echo "{$_SESSION['admin_name']}";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">

    <!-- Start of Navigation Bar -->
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
                            <select id ="select_product"class="nav_select">
                                <option value="0">Products</option>
                                <option value="1">Add Product</option>
                                <option value="2">View Products</option>
                            </select>
                        </li>
                        <li class="items">
                            <select id ="select_brand"class="nav_select">
                                <option value="0">Brands</option>
                                <option value="1">Add Brand</option>
                                <option value="2">View Brands</option>
                            </select>
                        </li>
                        <li class="items">
                            <select id ="select_category"class="nav_select">
                                <option value="0">Categories</option>
                                <option value="1">Add Categrory</option>
                                <option value="2">View Categories</option>
                            </select>
                        </li>
                        <li class="items">
                            <button id= "order_btn" class="nav_btn">Orders</button>
                        </li>
                        <li class="items">
                            <button id= "payment_btn" class="nav_btn">Payments</button>
                        </li>
                        <li class="items">
                            <button id= "users_btn" class="nav_btn">Users</button>
                        </li>
                    </ul>
                </div>
                <div id="right_nav">
                    <ul class="navbar1_ul">
                        <li class="items">
                            Welcome Raheel
                             <!-- php message here -->
                            !
                        </li>              
                        <li class="items">
                            <button class="nav_btn" id="admin_logout_btn">Logout</button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> 
        <div class="form_linebreak"></div>

    <!-- End of Navigation Bar -->    
        
    <!-- -------Start of Defualt modelbox----- -->
        <div id="default_modelbox">
            <div id="default_div">
                    <div>
                        <div class="form_linebreak"></div>
                        <h3>Tasks are in menu bar</h3>
                    </div>
            </div>
        </div>        
    <!-- -------End of Defualt modelbox----- -->

    <!-- Start of Add Product form -->
         <div id="add_pform_modelbox">
            <div class="form_div">
                <form action="" id="add_pform" class="form">
                    <div class="form_header">
                        <h3>Add Product</h3>                   
                    </div>
                    <div class="form_linebreak"></div>
                    <div class="form_body">
                        <div class="form_row">
                            <div class="field_name">Product name</div>
                            <input type="text" class="form_input" name="add_pname" id="add_pname" value="" autocomplete="off">
                            <div id="add_pname_msg" class="field_err_msg"></div>
                        </div>
                        <div class="form_row">
                            <div class="field_name">Product Description</div>
                            <input type="text"  class="form_input" name="add_pdesc" id="add_pdesc" value="" autocomplete="off">
                            <div id="add_pdesc_msg" class="field_err_msg"></div>
                        </div>
                        <div class="form_row">
                            <div class="field_name">Product Keyword</div>
                            <input type="text"  class="form_input" name="add_pkeyw" id="add_pkeyw" value="" autocomplete="off">
                            <div id="add_pkeyw_msg" class="field_err_msg"></div>
                        </div>
                        <div class="form_row">
                            <select id="add_pform_brand" class="form_selectbox" name="add_pform_brand"></select>
                            <div id="add_pbrand_msg" class="field_err_msg"></div>
                        </div>
                        <div class="form_row">
                            <select id="add_pform_category" class="form_selectbox" name="add_pform_category"></select>
                            <div id="add_pcatg_msg" class="field_err_msg"></div>
                        </div>
                        <div class="form_row">
                            <div class="field_name">Upload Image 1</div>
                            <input type="file"  class="form_input" name="add_pimg1" id="add_pimg1" val="">
                            <div id="add_pimg1_msg" class="field_err_msg"></div>
                        </div>
                        <div class="form_row">
                            <div class="field_name">Upload Image 2</div>
                            <input type="file"  class="form_input" name="add_pimg2" id="add_pimg2" val="">
                            <div id="add_pimg2_msg" class="field_err_msg"></div>
                        </div>
                        <div class="form_row">
                            <div class="field_name">Upload Image 3</div>
                            <input type="file"  class="form_input" name="add_pimg3" id="add_pimg3" val="">
                            <div id="add_pimg3_msg" class="field_err_msg"></div>
                        </div>
                        <div class="form_row">
                            <div class="field_name">Product Price</div>
                            <input type="text"  class="form_input" name="add_pprice" id="add_pprice" value="" autocomplete="off">
                            <div id="add_pprice_msg" class="field_err_msg"></div>
                        </div>
                        <div class="form_row">
                            <div class="field_name">Product's Stock</div>
                            <input type="text"  class="form_input" name="add_pstock" id="add_pstock" autocomplete="off">
                            <div id="add_pstock_msg" class="field_err_msg"></div>
                        </div>   
                        <div class="form_row">
                            <div class="field_name">Product's per order upper limit </div>
                            <input type="text"  class="form_input" name="add_plimit" id="add_plimit" value="" autocomplete="off">
                            <div id="add_plimit_msg" class="field_err_msg"></div>
                        </div>                                                
                        <div class="form_linebreak"></div>
                        <div class="form_row">
                            <input type="submit" class="form_btn" id="add_psubmit" name="add_psubmit" value="Submit">
                            <button class="form_btn" id="add_pclose">Close</button>
                        </div>
                        <div id="add_pform_msg" class="form_msg"></div>
                    </div>
                </form>
            </div>
        </div>
    <!-- ----End of Add Product Form--- -->


    <!-- Start of Edit Product form -->
        <div id="edit_pform_modelbox">
            <div class="form_div">
                <form action="" id="edit_pform" class="form">
                    <div class="form_header">
                        <h3>Edit Product</h3>                   
                    </div>
                    <div class="form_linebreak"></div>
                    <div class="form_body">

                        <div class="form_row">
                            <div class="field_name">Product name</div>
                            <input type="text" class="form_input" name="edit_pname" id="edit_pname" value="" autocomplete="off">
                            <div id="edit_pname_msg" class="field_err_msg"></div>
                        </div>

                        <div class="form_row">
                            <div class="field_name">Product Description</div>
                            <input type="text"  class="form_input" name="edit_pdesc" id="edit_pdesc" value="" autocomplete="off">
                            <div id="edit_pdesc_msg" class="field_err_msg"></div>
                        </div>

                        <div class="form_row">
                            <div class="field_name">Product Keyword</div>
                            <input type="text"  class="form_input" name="edit_pkeyw" id="edit_pkeyw" value="" autocomplete="off">
                            <div id="edit_pkeyw_msg" class="field_err_msg"></div>
                        </div>

                        <div class="form_row">
                            <select id="edit_pform_brand" class="form_selectbox" name="edit_pform_brand"></select>
                            <div id="edit_pbrand_msg" class="field_err_msg"></div>
                        </div>

                        <div class="form_row">
                            <select id="edit_pform_category" class="form_selectbox" name="edit_pform_category"></select>
                            <div id="edit_pcatg_msg" class="field_err_msg"></div>
                        </div>

                        <div class="form_row">
                            <div class="edit_image_div">
                                    <div class="field_name">Edit Image 1 </div>
                                <img src="" alt="" id="edit_image2" class="edit_image">
                                </div>
                                <input type="file"  class="form_input" name="edit_pimg1" id="edit_pimg1" val="">
                                <div id="edit_pimg1_msg" class="field_err_msg"></div>
                            </div>

                        <div class="form_row">
                            <div class="edit_image_div">
                                <div class="field_name">Edit Image 2 </div>
                               <img src="" alt="" id="edit_image1" class="edit_image">
                            </div>
                            <input type="file"  class="form_input" name="edit_pimg2" id="edit_pimg2" val="">
                            <div id="edit_pimg2_msg" class="field_err_msg"></div>
                        </div>

                        <div class="form_row">
                            <div class="edit_image_div">
                                <div class="field_name">Edit Image 3 </div>
                               <img src="" alt="" id="edit_image3" class="edit_image">
                            </div>
                            <input type="file"  class="form_input" name="edit_pimg3" id="edit_pimg3" val="">
                            <div id="edit_pimg3_msg" class="field_err_msg"></div>
                        </div>
                        <div class="form_row">
                            <div class="field_name">Product Price</div>
                            <input type="text"  class="form_input" name="edit_pprice" id="edit_pprice" value="" autocomplete="off">
                            <div id="edit_pprice_msg" class="field_err_msg"></div>
                        </div>
                        <div class="form_row">
                            <div class="field_name">Product Stock</div>
                            <input type="text"  class="form_input" name="edit_pstock" id="edit_pstock" value="" autocomplete="off">
                            <div id="edit_pstock_msg" class="field_err_msg"></div>
                        </div> 
                        <div class="form_row">
                            <div class="field_name">Product's per order upper limit </div>
                            <input type="text"  class="form_input" name="edit_plimit" id="edit_plimit" value="" autocomplete="off">
                            <div id="edit_plimit_msg" class="field_err_msg"></div>
                        </div>                                               
                        <div class="form_linebreak"></div>
                        <div class="form_row">
                            <input type="submit" class="form_btn" id="edit_psubmit" name="edit_psubmit" value="Submit">
                            <button class="form_btn" id="edit_pclose">Close</button>
                        </div>
                        <div id="edit_pform_msg" class="form_msg"></div>
                    </div>
                </form>
            </div>
        </div>
    <!-- ----End of Edit Product Form--- -->    
        
    <!-- Start of View Products Table -->
        <div id="products_table_modelbox">
            <div id="products_table_div">
                <table id="view_products_table" >
                    <thead>
                        <tr>
                            <th rowspan="2" class='left_align'>S.No</th>
                            <th rowspan="2" class='left_align'>Product Title</th>
                            <th rowspan="2">Product Image</th>
                            <th rowspan="2">Product Price</th>
                            <th rowspan="2">Total Sold</th>
                            <th rowspan="2">Stock</th>
                            <th rowspan="2">Status</th>
                            <th rowspan="2">Edit</th>
                            <th rowspan="2">Delete</th>

                        </tr>                                   
                    </thead>
                    <tbody id="view_product_table_body"> 
                    </tbody>
                </table> 
            </div>
            <div class="form_linebreak"></div>
            <div id="order_table_msg" class="form_msg"></div>  
        </div>
    <!-- ----End of View Product Table--- -->

        <!-- Add Brand Form -->
        <div id="add_bform_modelbox" class="form_modelbox">
            <div class="form_div">
                <form action="" id="add_bform" class="form">
                    <div class="form_header">
                        <h3>Add Brand</h3>
                    </div>
                    <div class="form_linebreak"></div>
                    <div class="form_body">
                        <div class="form_row">
                            <div class="field_name">Brand name</div>
                            <input type="text" class="form_input" name="add_bname" id="add_bname" value="" autocomplete="off">
                            <div id="add_bname_msg" class="field_err_msg"></div>
                        </div>
                        <div class="form_linebreak"></div>
                        <div class="form_row">
                            <button class="form_btn" id="add_bsubmit">Submit</button>
                            <button class="form_btn" id="add_bclose">Close</button>
                        </div>
                        <div id="add_bform_msg" class="form_msg"></div>
                    </form>
                    </div>
            </div>
        </div>

        <!-- Add Category Form -->
        <div id="add_cform_modelbox" class="form_modelbox">
            <div class="form_div">
                <form action="" class="form">
                    <div class="form_header">
                        <h3>Add Category</h3>
                    </div>
                    <div class="form_linebreak"></div>
                    <div class="form_body">
                        <div class="form_row">
                                <div class="field_name">Category name</div>
                                <input type="text" class="form_input" name="add_cname" id="add_cname" value="" autocomplete="off">
                                <div id="add_cname_msg" class="field_err_msg"></div>
                        </div>
                        <div class="form_linebreak"></div>
                        <div class="form_row">
                            <button class="form_btn" id="add_csubmit">Submit</button>
                            <button class="form_btn" id="add_cclose">Close</button>
                        </div>
                        <div id="add_cform_msg" class="form_msg"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script src="../js/jquery.js"></script>
<script>
    $(document).ready(function(){

    //-------Start of Objects Declaration-------------------


        //parameters used in determining user's current state
        const admin_info={
            current_modelbox:"default_modelbox",
            last_modelbox:"",
            // active_button:"home_btn",
            // last_active_button:"",
        }
    
    //------ End of Objects Declaration---------------------    
        
    // ---------Start of Function definitions-------------------   

         //This function reset add_product form
         function reset_add_product_form(){

            //clear add_product form message
            $('#add_pform_msg').removeClass('suc_msg err_msg pro_msg').text('');    
            
            //Reset form fields
            $('#add_pform').trigger('reset');

            //clear field error messages
            clear_product_form_msgs();
         }

         //This function reset edit_product form
         function reset_edit_product_form(){

            //clear edit_product form message
            $('#edit_pform_msg').removeClass('suc_msg err_msg pro_msg').text('');    

            //Reset form fields
            $('#edit_pform').trigger('reset');

            //clear field error messages
            clear_product_form_msgs();
        }         

        //This function clear all error messages of form add_product
        function clear_product_form_msgs(){
                        // clear field messages
                        $('#add_pname_msg').html('');
                        $('#add_pdesc_msg').html('');
                        $('#add_pkeyw_msg').html('');
                        $('#add_pbrand_msg').html('');
                        $('#add_pcatg_msg').html('');
                        $('#add_pimg1_msg').html('');
                        $('#add_pimg2_msg').html('');
                        $('#add_pimg3_msg').html('');
                        $('#add_pprice_msg').html('');
                        $('#add_pstock_msg').html('');
                        $('#add_plimit_msg').html('');
        }

        //This function clear all error messages of form edit_product
        function clear_edit_product_form_msgs(){
                        // clear field messages
                        $('#edit_pname_msg').html('');
                        $('#edit_pdesc_msg').html('');
                        $('#edit_pkeyw_msg').html('');
                        $('#edit_pbrand_msg').html('');
                        $('#edit_pcatg_msg').html('');
                        $('#edit_pimg1_msg').html('');
                        $('#edit_pimg2_msg').html('');
                        $('#edit_pimg3_msg').html('');
                        $('#edit_pprice_msg').html('');
                        $('#edit_pstock_msg').html('');
                        $('#edit_plimit_msg').html('');
        }        
     

        //Function to update user state
        function change_admin_state(){

            //Hide last modelbox
            $('#'+admin_info.last_modelbox).hide();                                          

            //Deactivate previous navbar button
            // $('#'+admin_info.last_active_button).removeClass("nav_active_btn");

            //Activate Current navbar button
            // $('#'+user_info.active_button).addClass("nav_active_btn");

            //display current modelbox
            $('#'+admin_info.current_modelbox).show();            

        }        

        //Function to populate brand and category information from db in edit product form
        function fill_brand_category(brand, category){

            //populate brand and category select box
            $.ajax({
                url:"http://localhost/ecommerce/rest_api/api_fetch_brands_catg.php",
                type: "GET",
                dataType:"json",
                success: function(data){

                    //clear selectboxes brand and category
                    $('#edit_pform_brand').html('');
                    $('#edit_pform_category').html('');

                    if(!data.brands.error){
                        $('#edit_pform_brand').append($('<option>',{
                                                                value:'0',
                                                                text: 'Select Brand'
                        }));
                        $.each(data.brands.data,function(key,value){
                            $('#edit_pform_brand').append($('<option>',{
                                value: value.b_id,
                                text: value.b_name
                            }));
                        }); 

                        $("#edit_pform_brand option").each(function() {
                            if($(this).text() == brand) {
                                $(this).attr('selected', 'selected');            
                            }                        
                        });
                    }
                    if(!data.categories.error){
                        $('#edit_pform_category').append($('<option>',{
                                                                value:'0',
                                                                text: 'Select Category'
                        }));
                        $.each(data.categories.data,function(key,value){
                            $('#edit_pform_category').append($('<option>',{
                                                    value: value.c_id,
                                                    text: value.c_name
                            }));
                        });

                        $("#edit_pform_category option").each(function() {
                            if($(this).text() == category) {
                                $(this).attr('selected', 'selected');            
                            }                        
                        });                        
                    }

                }
            });              
        }
        
        //This function load product table in view product modelblox
        function load_product_table(){

            $.ajax({
                  url: "http://localhost/ecommerce/rest_api/api_fetch_orders_details.php",
                  dataType: "json",
                  success:function(data){
    
                    if(!data.error){
    
                        //clear table body
                        $('#view_product_table_body').html('');
    
                        $.each(data.records, function(key, value){
                            $('#view_product_table_body').append("<tr>"+
                                                                "<td class='left_align'>"+(key+1)+"</td>"+
                                                                "<td class='left_align'>"+value.p_title+"</td>"+
                                                                "<td><img class='cart_image' src=../"+value.p_image1+" alt='img.jpg'></td>"+
                                                                "<td>"+value.p_price+"</td>"+
                                                                "<td>"+value.purchased+"</td>"+
                                                                "<td>"+value.stock+"</td>"+
                                                                "<td>"+value.status+"</td>"+
                                                                "<td>"+'<button class="card_btn edit_product_btn"  data-id="'+value.p_id+'">Edit</button>'+"</td>"+
                                                                "<td>"+'<button class="card_btn delete_product_btn" data-id="'+value.p_id+'">Delete</button>'+"</td>"+                                                                                                                                                                                                         
                                                                "<tr>");
                        });
    
                    }
                  }
                    
            });
        }
                    

    // ---------End of Function definitions------------------- 

    //If user has pressed Logout button in navigation bar
        $('#admin_logout_btn').on('click',function(e){
            e.preventDefault();

            if(confirm('Are you sure to logout?')){

                //End Session
                $.ajax({
                    url:"http://localhost/ecommerce/admin/api_admin_logout.php",
                    success: function(data){
                        debugger;
                        window.location.href = 'http://localhost/ecommerce/admin/admin_login.php';
                    }
                });   
    
            }

        });

    //---- Start of Product events -------//
        
        //if admin has selected option from product selectbox
        $('#select_product').change(function(){
        // $("#select_product option").mouseup(function(){    

            //if admin has selected add product in selectbox
            if($('#select_product').val()== 1){

                //change admin state
                admin_info.last_modelbox=admin_info.current_modelbox;
                admin_info.current_modelbox = "add_pform_modelbox";
                change_admin_state();

                //reset add product form
                reset_add_product_form();

                //populate brand and category select box
                $.ajax({
                    url:"http://localhost/ecommerce/rest_api/api_fetch_brands_catg.php",
                    type: "GET",
                    dataType:"json",
                    success: function(data){

                        //clear selectboxes brand and category
                        $('#add_pform_brand').html('');
                        $('#add_pform_category').html('');

                        if(!data.brands.error){
                            $('#add_pform_brand').append($('<option>',{
                                                                    value:'0',
                                                                    text: 'Select Brand'
                            }));
                            $.each(data.brands.data,function(key,value){
                                $('#add_pform_brand').append($('<option>',{
                                                        value: value.b_id,
                                                        text: value.b_name
                                }));
                            }); 
                        }
                        if(!data.categories.error){
                            $('#add_pform_category').append($('<option>',{
                                                                    value:'0',
                                                                    text: 'Select Category'
                            }));
                            $.each(data.categories.data,function(key,value){
                                $('#add_pform_category').append($('<option>',{
                                                        value: value.c_id,
                                                        text: value.c_name
                                }));
                            }); 
                        }

                    }
                });    
                            
            }

            //if admin has selected view products in selectbox
            if($('#select_product').val()== 2){

                    //change admin state
                    admin_info.last_modelbox=admin_info.current_modelbox;
                    admin_info.current_modelbox = "products_table_modelbox";
                    change_admin_state();

                    load_product_table();                               
            }                      
        });

        //if admin press submit in add product form
        $('#add_pform').on('submit',function(e){
            //prevent default setting of add brand form
            e.preventDefault();                           

            //clear form's field messages
            clear_product_form_msgs();

            var form_error=false;

            //retrive product name from input field
            var product_name = $('#add_pname').val();

            //check if admin has entered product name
            if(product_name == ""){
                $('#add_pname_msg').fadeIn('slow');
                $('#add_pname_msg').text('Enter product name');
                form_error = true;
            }

            //retrive product description from input field
            var product_desc = $('#add_pdesc').val();

            //check if admin has entered product desciption
            if(product_desc == ""){
                $('#add_pdesc_msg').fadeIn('slow');
                $('#add_pdesc_msg').text('Enter product description');
                form_error = true;
            }

            //retrive product keyword from input field
            var product_keyw = $('#add_pkeyw').val();

            //check if admin has entered product desciption
            if(product_keyw == ""){
                $('#add_pkeyw_msg').fadeIn('slow');
                $('#add_pkeyw_msg').text('Enter product keywords');
                form_error = true;
            }
            
            //retrive brand from selectbox
            var product_brand = $('#add_pform_brand').val();

            //check if admin has selected brand
            if(product_brand == "0"){
                $('#add_pbrand_msg').fadeIn('slow');
                $('#add_pbrand_msg').text('Select brand for product');
                form_error = true;
            }   
            
            //retrive category from selectbox
            var product_category = $('#add_pform_category').val();

            //check if admin has selected category
            if(product_category == "0"){
                $('#add_pcatg_msg').fadeIn('slow');
                $('#add_pcatg_msg').text('Select category for product');
                form_error = true;
            }   
            
            var form_data = new FormData(this);
            //retrive image 1 value 
            var product_img1 = $('#add_pimg1').val();

            //check if admin has uploaded image
            if(product_img1 == ""){
                $('#add_pimg1_msg').fadeIn('slow');
                $('#add_pimg1_msg').text('Upload image for product');
                form_error = true;
            }    
            
            //retrive image 2 value 
            var product_img2 = $('#add_pimg2').val();

            //check if admin has uploaded image
            if(product_img2 == ""){
                $('#add_pimg2_msg').fadeIn('slow');
                $('#add_pimg2_msg').text('Upload image for product');
                form_error = true;
            }                         

            //retrive image 3 value 
            var product_img3 = $('#add_pimg3').val();

            //check if admin has uploaded image
            if(product_img3 == ""){
                $('#add_pimg3_msg').fadeIn('slow');
                $('#add_pimg3_msg').text('Upload image for product');
                form_error = true;
            }                         
            //retrive product price from input field
            var product_price = $('#add_pprice').val();

            //check if admin has entered product price
            if(product_price == ""){
                $('#add_pprice_msg').fadeIn('slow');
                $('#add_pprice_msg').text('Enter product price');
                form_error = true;
            }

            //retrive product stock from input field
            var product_stock = $('#add_pstock').val();

            //check if admin has entered product stock
            if(product_stock == ""){
                $('#add_pstock_msg').fadeIn('slow');
                $('#add_pstock_msg').text('Enter product quantity');
                form_error = true;
            }            

            //retrive product's quantity limit per order
            var product_limit = $('#add_plimit').val();

            //check if admin has entered limit
            if(product_limit == ""){
                $('#add_plimit_msg').fadeIn('slow');
                $('#add_plimit_msg').text('Enter product quantity');
                form_error = true;
            } 

            //check if there is no form error
            if(!form_error){

                $.ajax({
                    url: "http://localhost/ecommerce/add_product.php",
                    type:"POST",
                    data: form_data,
                    dataType:"json",
                    contentType:false,
                    processData:false,
                    success: function(data){

                        // if form field has error
                        if(data.field_error){
                            if(data.pname.error){
                                $('#add_pname_msg').text(data.pname.message);
                            }
                            if(data.pdesc.error){
                                $('#add_pdesc_msg').text(data.pdesc.message);
                            } 
                            if(data.pkeyw.error){
                                $('#add_pkeyw_msg').text(data.pkeyw.message);
                            } 
                            if(data.pimg1.error){
                                $('#add_pimg1_msg').text(data.pimg1.message);
                            }      
                            if(data.pimg2.error){
                                $('#add_pimg2_msg').text(data.pimg2.message);
                            } 
                            if(data.pimg3.error){
                                $('#add_pimg3_msg').text(data.pimg3.message);
                            } 
                            if(data.pprice.error){
                                $('#add_pprice_msg').text(data.pprice.message);
                            }    
                            if(data.pstock.error){
                                $('#add_pstock_msg').text(data.pstock.message);
                            } 
                            if(data.limit.error){
                                $('#add_plimit_msg').text(data.limit.message);
                            }                                                                                                                                                                                                                                   
                        }else if(data.form_error){
                            $('#add_pform_msg').fadeIn('slow');
                            $('#add_pform_msg').removeClass('suc_msg pro_msg').addClass('err_msg').text(data.form_msg);
                            setTimeout(function(){
                                $('#add_pform_msg').fadeOut('slow');
                            },3000);                                     
                        }else{
                            $('#add_pform_msg').fadeIn('slow');
                            $('#add_pform_msg').removeClass('err_msg pro_msg').addClass('suc_msg').text(data.form_msg);
                            setTimeout(function(){
                                $('#add_pform_msg').fadeOut('slow');
                            },3000);  
                            
                            //reset add product form
                            reset_add_product_form();
                            
                            // // clear form field messages
                            // clear_product_form_msgs();

                            // //reset form fields
                            // $('#add_pform').trigger('reset');
                        }
                    }
                });
            }
            
        });

        //if admin press close button in add product form 
        $('#add_pclose').on('click',function(e){
            //prevent default form setting
            e.preventDefault();

            //reset add product form 
            reset_add_product_form();

            //reset product selectbox in navigation bar
            $('#select_product').val('0');
            
            //change admin state
            admin_info.last_modelbox=admin_info.current_modelbox;
            admin_info.current_modelbox = "default_modelbox";
            change_admin_state();                    

        });  
        

        //if admin press Edit product In view product table
        $(document).on('click','.edit_product_btn',function(e){
            e.preventDefault();

            //change admin state
            admin_info.last_modelbox=admin_info.current_modelbox;
            admin_info.current_modelbox = "edit_pform_modelbox";
            change_admin_state();

            //reset edit product form
            reset_edit_product_form();

                var product_id =$(this).data('id');
                var obj = {product_id:product_id};
                var json_obj = JSON.stringify(obj);
                $.ajax({
                    url:"http://localhost/ecommerce/rest_api/api_fetch_product.php",
                    type: "POST",
                    data:json_obj,
                    contentType: "application/json; charset=utf-8",
                    dataType:"json",
                    success:function(data){
                        if(!data.error){
                            debugger;
                            //fill brand and category selectboxes using db    
                            fill_brand_category(data.brand, data.category);

                            $('#edit_pname').attr('data-id',data.p_id);
                            $('#edit_pname').val(data.p_title);
                            $('#edit_pdesc').val(data.p_description);
                            $('#edit_pkeyw').val(data.keywords);
                            $('#edit_image1').attr('src',"../"+data.p_image1);
                            $('#edit_image2').attr('src',"../"+data.p_image2);
                            $('#edit_image3').attr('src',"../"+data.p_image3);
                            $('#edit_pprice').val(data.p_price);
                            $('#edit_pstock').val(data.stock);
                            $('#edit_plimit').val(data.limit);
                        }
                    }
                });
                                      
        });

        //if admin press Delete product In view product table
        $(document).on('click','.delete_product_btn',function(e){
            e.preventDefault();

            if(confirm("Are you sure?")){

                var product_id =$(this).data('id');
                var obj = {product_id:product_id};
                var json_obj = JSON.stringify(obj);
                $.ajax({
                    url:"http://localhost/ecommerce/rest_api/api_delete_product.php",
                    type: "POST",
                    data:json_obj,
                    contentType: "application/json; charset=utf-8",
                    dataType:"json",
                    success:function(data){
                        if(!data.error){
                            //load updated product table
                            load_product_table();    
                        }
                    }
                });
            }                                   
        });        

        //if admin press submit in Edit product form
        $('#edit_pform').on('submit',function(e){

            e.preventDefault();                           

            //clear form's field messages
            clear_edit_product_form_msgs();

            var form_error=false;

            //retrive product id 
            var product_id = $('#edit_pname').attr('data-id');

            //retrive product name from input field
            var product_name = $('#edit_pname').val();

            //check if admin has entered product name
            if(product_name == ""){
                $('#edit_pname_msg').fadeIn('slow');
                $('#edit_pname_msg').text('Enter product name');
                form_error = true;
            }

            //retrive product description from input field
            var product_desc = $('#edit_pdesc').val();

            //check if admin has entered product desciption
            if(product_desc == ""){
                $('#edit_pdesc_msg').fadeIn('slow');
                $('#edit_pdesc_msg').text('Enter product description');
                form_error = true;
            }

            //retrive product keyword from input field
            var product_keyw = $('#edit_pkeyw').val();

            //check if admin has entered product desciption
            if(product_keyw == ""){
                $('#edit_pkeyw_msg').fadeIn('slow');
                $('#edit_pkeyw_msg').text('Enter product keywords');
                form_error = true;
            }
            
            //retrive brand from selectbox
            var product_brand = $('#edit_pform_brand').val();

            //check if admin has selected brand
            if(product_brand == "0"){
                $('#edit_pbrand_msg').fadeIn('slow');
                $('#edit_pbrand_msg').text('Select brand for product');
                form_error = true;
            }   
            
            //retrive category from selectbox
            var product_category = $('#edit_pform_category').val();

            //check if admin has selected category
            if(product_category == "0"){
                $('#edit_pcatg_msg').fadeIn('slow');
                $('#edit_pcatg_msg').text('Select category for product');
                form_error = true;
            }   
            
            var form_data = new FormData(this);
            
            //add product id to form_data
            form_data.append("p_id",product_id);
            
            //retrive product price from input field
            var product_price = $('#edit_pprice').val();

            //check if admin has entered product price
            if(product_price == ""){
                $('#edit_pprice_msg').fadeIn('slow');
                $('#edit_pprice_msg').text('Enter product price');
                form_error = true;
            }

            //retrive product stock from input field
            var product_price = $('#edit_pstock').val();

            //check if admin has entered product stock
            if(product_price == ""){
                $('#edit_pstock_msg').fadeIn('slow');
                $('#edit_pstock_msg').text('Enter product price');
                form_error = true;
            }
            
            //retrive product order limit from input field
            var product_limit = $('#edit_plimit').val();

            //check if admin has entered product's order limit
            if(product_limit == ""){
                $('#edit_plimit_msg').fadeIn('slow');
                $('#edit_plimit_msg').text('Enter product price');
                form_error = true;
            }            

            //check if there is no form error
            if(!form_error){

                $.ajax({
                    url: "http://localhost/ecommerce/update_product.php",
                    type:"POST",
                    data: form_data,
                    dataType:"json",
                    contentType:false,
                    processData:false,
                    success: function(data){
                        debugger;
                        // if form field has error
                        if(data.field_error){
                            if(data.pname.error){
                                $('#edit_pname_msg').text(data.pname.message);
                            }
                            if(data.pdesc.error){
                                $('#edit_pdesc_msg').text(data.pdesc.message);
                            } 
                            if(data.pkeyw.error){
                                $('#edit_pkeyw_msg').text(data.pkeyw.message);
                            } 
                            if(data.pimg1.error){
                                $('#edit_pimg1_msg').text(data.pimg1.message);
                            }      
                            if(data.pimg2.error){
                                $('#edit_pimg2_msg').text(data.pimg2.message);
                            } 
                            if(data.pimg3.error){
                                $('#edit_pimg3_msg').text(data.pimg3.message);
                            } 
                            if(data.pprice.error){
                                $('#edit_pprice_msg').text(data.pprice.message);
                            }   
                            if(data.stock.error){
                                $('#edit_pstock_msg').text(data.stock.message);
                            } 
                            if(data.limit.error){
                                $('#edit_plimit_msg').text(data.limit.message);
                            }                                                                                                                                                                                                                                                                        
                        }else{
                            $('#edit_pform_msg').fadeIn('slow');
                            $('#edit_pform_msg').removeClass('err_msg pro_msg').addClass('suc_msg').text(data.form_msg);
                            setTimeout(function(){
                                $('#edit_pform_msg').fadeOut('slow');
                            },3000);  
                            
                            //reset add product form
                            reset_edit_product_form();

                            //change admin state
                            admin_info.last_modelbox=admin_info.current_modelbox;
                            admin_info.current_modelbox = "products_table_modelbox";
                            change_admin_state();    
                            
                            //load updated product table
                            load_product_table();
                            
                        }
                    }
                });
            }
            
        });  
        
        //if admin press close button in Edit product form 
        $('#edit_pclose').on('click',function(e){
            //prevent default form setting
            e.preventDefault();

            //reset add product form 
            reset_edit_product_form();

            //reset product selectbox in navigation bar
            $('#select_product').val('0');
            
            //change admin state
            admin_info.last_modelbox=admin_info.current_modelbox;
            admin_info.current_modelbox = "default_modelbox";
            change_admin_state();                    

        });      

    //---- End of Product events -------//

    //----Start of brands events -------//
        
        //if admin has selected option from brand selectbox
        $('#select_brand').change(function(){

            //if admin has selected add brand from selectbox
            if($('#select_brand').val()== 1){

                //display add brand form
                $('#add_bform_modelbox').show();

                //if admin press submit in add_brand form
                $('#add_bsubmit').on('click',function(e){
                    //prevent default setting of add brand form
                    e.preventDefault();

                    //retrive brand name from input field
                    var brand_name = $('#add_bname').val();

                    //clear field messages
                    $('#add_bname_msg').html('');

                    //check if admin has entered brand name
                    if(brand_name == ""){
                        $('#add_bname_msg').fadeIn('slow');
                        $('#add_bname_msg').text('Enter brand name');
                    }else{

                        //convert variable to object
                        var obj = {bname:brand_name};

                        //convert object to json object
                        var json_obj = JSON.stringify(obj);

                        $.ajax({
                            url: "http://localhost/ecommerce/rest_api/api_add_brand.php",
                            type:"POST",
                            data: json_obj,
                            success: function(data){
                                //if there is error in input field
                                if(data.field_error){
                                    if(data.bname.error){
                                        $('#add_bname_msg').fadeIn('slow');
                                        $('#add_bname_msg').text(data.bname.message);                                
                                    }
                                }else{
                                    //if there is error in db 
                                    if(data.form_error){
                                        $('#add_bform_msg').fadeIn('slow');
                                        $('#add_bform_msg').removeClass('pro_msg suc_msg').addClass('err_msg').text(data.form_msg);
                                        setTimeout(function(){
                                            $('#add_bform_msg').fadeOut('slow');
                                        },3000);                                              
                                    }else{
                                        $('#add_bform_msg').fadeIn('slow');
                                        $('#add_bform_msg').removeClass('err_msg pro_msg').addClass('suc_msg').text(data.form_msg);
                                        setTimeout(function(){
                                            $('#add_bform_msg').fadeOut('slow');
                                        },3000);                                   
                                    }
                                }
                            }
                        });
                    }
                });

                //if admin press close button
                $('#add_bclose').on('click',function(e){
                    //prevent default form setting
                    e.preventDefault();

                    //clear add_brand form message
                    $('#add_bform_msg').removeClass('suc_msg err_msg pro_msg').text('');

                    //reset form fields
                    $('#add_bform').trigger('reset');

                    //reset brand selectbox
                    $("#select_brand").val('0');

                    //hide add_brand form
                    $('#add_bform_modelbox').hide();

                });
            }
        });

    //----End of brands events -------//    

    //----Start of Categories events -------//
        
        //if admin has selected option from category selectbox
        $('#select_category').change(function(){

            //if admin has selected add category from selectbox
            if($('#select_category').val()== 1){

                //display add category form
                $('#add_cform_modelbox').show();

                //if admin press submit in add_category form
                $('#add_csubmit').on('click',function(e){
                    //prevent default setting of add category form
                    e.preventDefault();

                    //clear all messages
                    $('#add_cname_msg').html('');

                    //retrive category name from input field
                    var category_name = $('#add_cname').val();

                    //check if admin has entered category name
                    if(category_name == ""){
                        $('#add_cname_msg').fadeIn('slow');
                        $('#add_cname_msg').text('Enter category name');
                    }else{

                        //convert variable to object
                        var obj = {cname:category_name};

                        //convert object to json object
                        var json_obj = JSON.stringify(obj);

                        $.ajax({
                            url: "http://localhost/ecommerce/rest_api/api_add_category.php",
                            type:"POST",
                            data: json_obj,
                            success: function(data){
                                //if there is error in form field
                                if(data.field_error){
                                    $('#add_cname_msg').fadeIn('slow');
                                    $('#add_cname_msg').text(data.cname.message);                              
                                }else if(data.form_error){
                                    //if there is error in db
                                    $('#add_cform_msg').fadeIn('slow');
                                    $('#add_cform_msg').removeClass('pro_msg suc_msg').addClass('err_msg').text(data.form_msg);
                                    setTimeout(function(){
                                        $('#add_cform_msg').fadeOut('slow');
                                    },3000); 
                                }else{
                                    $('#add_cform_msg').fadeIn('slow');
                                    $('#add_cform_msg').removeClass('err_msg pro_msg').addClass('suc_msg').text(data.form_msg);
                                    setTimeout(function(){
                                        $('#add_cform_msg').fadeOut('slow');
                                    },3000);                                   
                                }
                                
                            }
                        });
                    }
                });

                //if admin press close button
                $('#add_cclose').on('click',function(e){
                    //prevent default form setting
                    e.preventDefault();

                    //clear add_category form message
                    $('#add_cform_msg').removeClass('suc_msg err_msg pro_msg').text('');

                    //reset form fields
                    $('#add_cform').trigger('reset');

                    //reset category selectbox
                    $("#select_category").val('0');

                    //hide add_category form
                    $('#add_cform_modelbox').hide();

                });
            }
        }); 
        
    //----End of Categories events -------//    
    });

</script>
</body>
</html>