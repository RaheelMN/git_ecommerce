<?php

    //start session
    // session_start();
    // if(!isset($_SESSION['admin_role'])){
    //     header("location:http://localhost/ecommerce/admin/admin_login.php");
    // }

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
        <div class="form_linebreak"></div>
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
    <!-- ----End of Product Form--- -->
        
        <!-- Start of View Products Table -->
        <div id="product_table_modelbox">
            <table id="view_products_table" class="user_table" >
                    <thead  style="border:1px solid black;">
                            <tr>
                                <th rowspan="2" class='left_align'>Product ID</th>
                                <th rowspan="2">Product Title</th>
                                <th rowspan="2">Product Image</th>
                                <th rowspan="2">Product Price</th>
                                <th rowspan="2">Total Sold</th>
                                <th rowspan="2">Status</th>
                                <th rowspan="2">Edit</th>
                                <th rowspan="2">Delete</th>

                            </tr>                                   
                    </thead>
                    <tbody id="order_table_body">
                    <tr>
                                <td>Product ID</th>
                                <td>Product Title</th>
                                <td>Product Image</th>
                                <td>Product Price</th>
                                <td>Total Sold</th>
                                <td>Status</th>
                                <td>Edit</th>
                                <td>Delete</th>

                            </tr>  
                    </tbody>
            </table> 
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
            debugger;
            //if admin has selected add_brand from selectbox
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
                        debugger;
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
                            
                //if admin press submit in add_brand form
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
                                debugger;
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

                //if admin press close button
                $('#add_pclose').on('click',function(e){
                    //prevent default form setting
                    e.preventDefault();
                    debugger;

                    //reset add product form 
                    reset_add_product_form();

                    //reset product selectbox in navigation bar
                    $('#select_product').val('0');
                    
                    //change admin state
                    admin_info.last_modelbox=admin_info.current_modelbox;
                    admin_info.current_modelbox = "default_modelbox";
                    change_admin_state();                    

                });
            }
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