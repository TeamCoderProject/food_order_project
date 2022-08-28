<?php 
//include contannsts 
include('../config/constants.php');
//session destroy
session_destroy();//unsets $_session['user']

//redirect to login page
header('location:'.SITEURL.'admin/login.php');

?>