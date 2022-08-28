<?php 
include('../config/constants.php');
//echo "Delete Page";
if(isset($_GET['id']) AND isset($_GET['image_name']))
{
//get valeu and delete
//echo "Get Value and Delete";
$id=$_GET['id'];
$image_name=$_GET['image_name'];

if($image_name!="")
{
    //image is avlble so remv it
    $path="../images/category".$image_name;
    //remove the image
    $remove= unlink($path);
    //faild then error message
    if($remove==false)
    {
        $_SESSION['remove']="<div class='error'>Failed To Remove Category Image</div>";
        header('location:'.SITEURL.'admin/manage-category.php');
        die();
    }
}

$sql="DELETE FROM tbl_catagory WHERE id=$id";
$res=mysqli_query($conn, $sql);
if($res==true)
{
    $_SESSION['delete']="<div class='success'>Category Deleted Successfully. </div>";
    header('location:'.SITEURL.'admin/manage-category.php');
}
else
{
    $_SESSION['delete']="<div class='error'>Failed To Delete Category. </div>";
    header('location:'.SITEURL.'admin/manage-category.php');
}

}

else
{
    //redirect to catagory  page
    header('location:'.SITEURL.'admin/manage-category.php');
}
?>