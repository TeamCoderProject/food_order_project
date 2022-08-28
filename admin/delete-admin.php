<?php

//INclude constants.php
include('../config/constants.php');

//1.get ID of Admin to deleted
$id =$_GET['id'];

 //create sql to delete admin
 $sql="DELETE FROM tbl_admin WHERE id=$id";

 //execute the query
 $res = mysqli_query($conn,$sql);

 //check the query successfully or not
 if($res==true)
{
    //query executed successfully and Admin deleted
    //echo "Admin Deleted";
    //create session  variable to display message
    $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";
    //Redirect to manage admin page
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else
{
    //failed To Delete ADmin
  //  echo "Failed to delete admin";
  $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again Later.</div>";
  header('location:'.SITEURL.'admin/manage-admin.php');
}
?>