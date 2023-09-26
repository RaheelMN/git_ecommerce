# git_ecommerce
First try of ecommerce website__

It has admin page and user page. Admin has to login to access admin page
User has to login at checkout.


Admin tasks__

Admin can create,read,delete and edit Poducts, categories, bands.
Admin can delete user orders, payments and users.


Uers tasks__

User can create, delete and update account. 
User can add items to cart. User can modify items in carts.
User orders are in pending state. User has to confirm oder then select payment method.
Payment gatway is not implemented.


Verification__

REGEX is used in php to verify user and admin input. 
mysqli_real_escape_string function is used to prevent sql injection beside regex.
htmlentities is used to prevent XSS attack.


Authenticaltion/Authorisation__

Cookies are used to authenticate and authorised access php pages.


Error Handling__

Error handling code is implemented in php using error_handling.php in include folder
All errors in php are captured in stored in log file and code is generated for user.


htaccess__

Routing controls are handled by .htaccess file and there is restriction on access to resources.
