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
                            <select id ="select_product"class="nav-select">
                                <option value="0">Products</option>
                                <option value="1">Add Product</option>
                                <option value="2">View Products</option>
                            </select>
                        </li>
                        <li class="items">
                            <select id ="select_brand"class="nav-select">
                                <option value="0">Brands</option>
                                <option value="1">Add Brand</option>
                                <option value="2">View Brands</option>
                            </select>
                        </li>
                        <li class="items">
                            <select id ="select_category"class="nav-select">
                                <option value="0">Categories</option>
                                <option value="1">Add Categrory</option>
                                <option value="2">View Categories</option>
                            </select>
                        </li>
                        <li class="items">
                            <button id= "order-btn" class="nav-btn">Orders</button>
                        </li>
                        <li class="items">
                            <button id= "payment-btn" class="nav-btn">Payments</button>
                        </li>
                        <li class="items">
                            <button id= "users-btn" class="nav-btn">Users</button>
                        </li>
                    </ul>
                </div>
                <div id="right-nav">
                    <ul class="navbar1-ul">
                        <li class="items">
                            Welcome Raheel!
                        </li>              
                        <li class="items">
                                <button class="search-btn" id="search-btn" name = "search-btn">Logout</button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> 
        
        <!-- Add Product form -->
         <!-- <div id="add_model_form">
            <div id="add_form_div">
                <form action="" id="add_form">
                    <div class="header">
                        <h3>Add Employee record</h3>
                    </div>
                    <table  style="width:60%; margin:auto"cellpadding="10px">
                        <tr>
                            <td class="r1">Name</td>
                            <td><input type="text" name="add_name" id="add_name" value=""></td>
                        </tr>
                        <tr>
                            <td class="r1">Age</td>
                            <td><input type="number" name="add_age" id="add_age" value=""></td>
                        </tr>
                        <tr>
                            <td class="r1">Gender</td>
                            <td>
                                <input type='radio' name="add_gender" value="male">Male
                                <input type='radio' name="add_gender" value="female">Female
                            </td>
                        </tr>
                        <tr>
                            <td class="r1">Country</td>
                            <td>
                                <select name="add_country" id="add_country">
                                    <option value="pak">Pakistan</option>
                                    <option value="afg">Afganistan</option>
                                    <option value="ind">India</option>
                                    <option value="bng">Bangladesh</option>
                                    
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="r1"></td>
                            <td><button id="add_submit">Submit</button>
                                <button id="add_close">Close</button>
                            </td>
                        </tr>
                        <tr>
                            <td id="add_form_msg" colspan="2"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div> -->

        <!-- Add Brand Form -->
        <div id="add_bform_modelbox" class="form_modelbox">
            <div class="form_div">
                <form action="" id="add_bform" class="form">
                    <div class="form_header">
                        <h3>Add Brand</h3>
                    </div>
                    <div class="form_row2">Brand Name
                            <input type="text" name="add_bname" id="add_bname" value="">
                    </div>
                    <div class="form_row3">
                        <button class="form_btn" id="add_bsubmit">Submit</button>
                        <button class="form_btn" id="add_bclose">Close</button>
                    </div>
                    <div id="add_bform_msg" ></div>
                </form>
            </div>
        </div>

        <!-- Add Category Form -->
        <div id="add_cform_modelbox" class="form_modelbox">
            <div class="form_div">
                <form action="" class="form">
                    <div class="form_header">
                        <h3>Add Category</h3>
                    </div>
                    <div class="form_row2">Category Name
                            <input type="text" name="add_cname" id="add_cname" value="">
                    </div>
                    <div class="form_row3">
                        <button class="form_btn" id="add_csubmit">Submit</button>
                        <button class="form_btn" id="add_cclose">Close</button>
                    </div>
                    <div id="add_cform_msg" ></div>
                </form>
            </div>
        </div>
    </div>

    <script src="../js/jquery.js"></script>
    <script>
        $(document).ready(function(){

            //---- brands events -------//
            
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
    
                        //check if admin has entered brand name
                        if(brand_name == ""){
                            $('#add_bform_msg').fadeIn('slow');
                            $('#add_bform_msg').removeClass('suc_msg pro_msg').addClass('err_msg').text('Enter brand name');
                            setTimeout(function(){
                                $('#add_bform_msg').fadeOut('slow');
                            },3000); 
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
                                    if(data.status == "false"){
                                        $('#add_bform_msg').fadeIn('slow');
                                        $('#add_bform_msg').removeClass('suc_msg pro_msg').addClass('err_msg').text(data.message);
                                        setTimeout(function(){
                                            $('#add_bform_msg').fadeOut('slow');
                                        },3000);                                
                                    }else{
                                        $('#add_bform_msg').fadeIn('slow');
                                        $('#add_bform_msg').removeClass('err_msg pro_msg').addClass('suc_msg').text(data.message);
                                        setTimeout(function(){
                                            $('#add_bform_msg').fadeOut('slow');
                                        },3000);                                   
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

            //---- Categories events -------//
            
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

                        //retrive category name from input field
                        var category_name = $('#add_cname').val();

                        //check if admin has entered category name
                        if(category_name == ""){
                            $('#add_cform_msg').fadeIn('slow');
                            $('#add_cform_msg').removeClass('suc_msg pro_msg').addClass('err_msg').text('Enter category name');
                            setTimeout(function(){
                                $('#add_cform_msg').fadeOut('slow');
                            },3000); 
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
                                    if(data.status == "false"){
                                        $('#add_cform_msg').fadeIn('slow');
                                        $('#add_cform_msg').removeClass('suc_msg pro_msg').addClass('err_msg').text(data.message);
                                        setTimeout(function(){
                                            $('#add_cform_msg').fadeOut('slow');
                                        },3000);                                
                                    }else{
                                        $('#add_cform_msg').fadeIn('slow');
                                        $('#add_cform_msg').removeClass('err_msg pro_msg').addClass('suc_msg').text(data.message);
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
        });
    </script>
</body>
</html>