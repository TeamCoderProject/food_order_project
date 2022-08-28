<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update  Admin</h1>
        <br><br>
    <?php
    //Get the id selected Admin
    $id=$_GET['id'];

    // Create sql q. to get details
    $sql="SELECT * FROM tbl_admin WHERE id=$id" ;
    
    //Execute the query
    $res=mysqli_query($conn, $sql);

    //check whether the query is executted
    if($res==true)
    {
        //Available or not
        $count = mysqli_num_rows($res);
        //Check whether we have admin or not
        if($count==1)
        {
            //Get details
            //echo "Admin Available";
            $row=mysqli_fetch_assoc($res);
            $full_name = $row['full_name'];
            $username = $row['username'];
        }
        else
        {
            //redirect to manage admin page
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
    
    
    ?>


        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text"name="full_name" value="<?php echo $full_name;?>">
                    </td>
                </tr>
                <tr>
                    <td>username: </td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username;?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>
    </div>

</div>
<?php  
//check whether the submit button is clicked or not
if(isset($_POST['submit']))
{
    //echo "Button clicked";
    //Get all the values from the update
     $id- $_POST['id'];
     $full_name =$_POST['full_name'];
     $username = $_POST['username'];

     //Create sql Q. to update
     $sql="UPDATE tbl_admin SET full_name = '$full_name', username = '$username' WHERE id='$id' ";

     //Execute the query
     $res = mysqli_query($conn, $sql);

     //check query ex.. or not
     if($res==true)
     {
        //query executed and admin updated
        $_SESSION['update']="<div class='success'>Admin Updated Successfully.</div>";
        //Redirect to manage admin page

        header('location:'.SITEURL.'admin/manage-admin.php');
     }
     else
     {
        //failed to update admin
        $_SESSION['update']="<div class='error'>Failed to delete.</div>";
        //Redirect to manage admin page

        header('location:'.SITEURL.'admin/manage-admin.php');
     }
}

?>
<?php include('partials/footer.php');?>
