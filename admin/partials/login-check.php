<?php 
//authorization control
if(!isset($_SESSION['user']))
{
    //user not logged in
    $_SESSION['no-login-message']="<div class='error text-center'>Please Login to Access Admin Panel. </div> ";
    //redirect to log in page
    header('location:'.SITEURL.'admin/login.php');
}
?>