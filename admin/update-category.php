<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrappper">
        <h1>Update Category</h1>
        <br><br>

        <?php 
            if(isset($_GET['id']))
            {
               // echo "Getting the data";
               $id =$_GET['id'];
               $sql="SELECT * FROM tbl_catagory WHERE id=$id;";
               $res =mysqli_query($conn,$sql);

               $count = mysqli_num_rows($res);
               if($count==1)
               {
                    $row =mysqli_fetch_assoc($res);
                    $title=$row['title'];
                    $current_image=$row['image_name'];
                    $featured=$row['featured'];
                    $active=$row['active'];
               }
               else
               {
                $_SESSION['no-category-found']="<div class='error'>Category Not Found. </div>";
                header('location:'.SITEURL.'admin/manage-category.php');
               }
            }






            else
            {
                header('location:'.SITEURL.'admin/manege-category.php');
            }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            
        
        <table class="tbl-30">
            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" value="<?php echo $title; ?>">
                </td>
            </tr>
            <tr>
                <td>Current Image</td>
                <td>
                    <?php 
                        if($current_image!="")
                        {
                            ?>
                            <img src="<?php  echo SITEURL;?>image/category/<?php echo $current_image;  ?>">
                            <?php
                        }

                        else
                        {
                            echo"<div class='error'>Image Not Added.</div>";
                        }
                    ?>
                </td>
            </tr>

            <tr>
              <td>New Image: </td>
              <td>
                <input type="file" name="image" value="">
              </td>  
            </tr>

            <tr>
                <td>Featured: </td>
                <td>
                    <input type="radio" name="featured" value="Yes">Yes
                    <input type="radio" name="featured" value="No">No
                </td>
            </tr>
            <tr>
                <td>Active: </td>
                <td>
                    <input type="radio" name="active" value="Yes">Yes
                    <input type="radio" name="active" value="No">No

                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                </td>
                
            </tr>

        </table></form>
    </div> 
    
</div>


<?php include('partials/footer.php'); ?>