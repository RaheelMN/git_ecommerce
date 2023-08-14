<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- Start of Admin login modelbox -->

    <div id="admin_login_modelbox">

        <div class="form_linebreak"></div>           
        <div class="form_div" id = "admin_login_div">
            <form action="" id="admin_login_form">
                <div class="form_header">
                    <h3>Admin Login Form</h3>
                </div>
                <div class="form_linebreak"></div>
                <div class="form_body">
                    <div class="form_row">
                            <div class="field_name">Enter email</div>
                            <input type="text" class="form_input" name="admin_email" id="admin_email">
                            <div id="admin_email_msg" class="field_err_msg"></div>
                    </div>                                    
                    <div class="form_row">
                            <div class="field_name">Enter Password</div>
                            <input type="password" class="form_input" name="admin_password" id="admin_password">
                            <div id="admin_password_msg" class="field_err_msg"></div>
                    </div>
                    <div class="form_linebreak"></div>                                                                                                                                            
                    <div class="form_row">
                        <button class="form_btn" id="admin_submit">Login</button>
                    </div>
                    <div id="admin_form_msg" class="form_msg"></div>
                    <div class="form_linebreak"></div>
                </div>
            </form>               
        </div>
        <div class="form_linebreak"></div>
        
    </div>

    <!-- End of Admin login modelbox -->          
</body>
<script src="../js/jquery.js"></script>
<script>

    $(document).ready(function(){


        //This function clear form error messages
        function clear_login_form_msgs(){
                        // clear field messages
                        $('#admin_email_msg').html('');
                        $('#admin_password_msg').html('');
        } 

        
        //if admin has pressed Submit button in Login Form
        $('#admin_submit').on('click',function(e){
            e.preventDefault();  

            //clear form's field messages
            clear_login_form_msgs();

            var form_error=false;

            //retrive admin email from input field
            var email = $('#admin_email').val();

            //check if admin has entered email
            if(email == ""){
                $('#admin_email_msg').fadeIn('slow');
                $('#admin_email_msg').text('Enter Email');
                form_error = true;
            }

            //retrive Password from input field
            var password = $('#admin_password').val();

            //check if User has entered password 
            if(password == ""){
                $('#admin_password_msg').fadeIn('slow');
                $('#admin_password_msg').text('Enter Password');
                form_error = true;
            }

            //check if there is no form error
            if(!form_error){
                
                //convert variable to object
                var obj = {
                            email:email,
                            password:password,
                };

                //convert object to json object
                var json_obj = JSON.stringify(obj);
                    
                $.ajax({
                    url: "http://localhost/ecommerce/admin/api_admin_login.php",
                    type:"POST",
                    data: json_obj,
                    dataType:"json",
                    contentType: "application/json; charset=utf-8",
                    success: function(data){

                        // if form field has error
                        if(data.field_error){
                            if(data.email.error){
                                $('#admin_email_msg').text(data.email.message);
                            }
 
                            if(data.password.error){
                                $('#admin_password_msg').text(data.password.message);
                            } 
                                                                                                                                                                         
                        }else if(data.form_error){
                            $('#admin_form_msg').fadeIn('slow');
                            $('#admin_form_msg').removeClass('suc_msg pro_msg').addClass('err_msg').text(data.form_msg);
                            setTimeout(function(){
                                $('#admin_form_msg').fadeOut('slow');
                            },3000);                                     
                        }else{ 
                            
                            //Reset form fields
                            $('#admin_login_form').trigger('reset');

                            //clear form's field messages
                            clear_login_form_msgs();

                            window.location.href = 'http://localhost/ecommerce/admin/index.php';
                            //Go to main admin page
                            // header("location:http://localhost/ecommerce/admin/index.php");
                            // header("location:http://localhost/ecommerce/index.html");       
                           
                        }
                    }
                });
            }
            
        }); 

    });
</script>    
</html>