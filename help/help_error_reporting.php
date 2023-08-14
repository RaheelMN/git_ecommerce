<?php
//MYSQLI ERROR FUNCTIONS

//Error functions can be used in die() function. There are two type of error functions for db connection
//1. mysqli_connect_error
//  It display error message when connection fails
error_reporting(E_ALL);
$conn = mysqli_connect('localhost','root1','','new_ecommerce') or die("Connection failed. : ");


?>