<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>
        Manage Food
    </h1>
    <br /><br />

            <!-- Button to create Admin -->









            <a href="#" class = "btn-primary">Foods</a> <br /><br /><br />



           
            <!-- <a href="admin/add-category.php" class = "btn-primary">Add Category</a> <br /><br /><br /> -->
            <table class="tbl-full"> 
               <tr>
                  <th>S.N.</th>
                  
                  <th>Title</th>
                  <th>Image</th>
                  <th>Featured</th>
                  <th>Active</th>
                  <!-- <th>Actions</th> -->

               </tr>

               <?php 
               $sql = "SELECT * FROM tbl_catagory";
               $res =mysqli_query($conn,$sql);
               $count = mysqli_num_rows($res);
               $sn=1;
               if($count>0)
               {
                  while($row=mysqli_fetch_assoc($res))
                  {
                     $id= $row['id'];
                     $title=$row['title'];
                     $image_name= $row['image_name'];
                     $featured=$row['featured'];
                     $active=$row['active'];
                     ?>

               <tr>
                  <td><?php echo $sn++; ?> </td>
                  <td><?php echo $title; ?></td>

                  <td>
                     <?php 
                     if($image_name!="")
                     {
                        ?>
                        <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>"width="100px">
                        <?php
                     } 
                     else
                     {
                        echo "<div class='error'>Image Not Added</div>";
                     }
                     ?>
                  </td>

                  <td><?php echo $featured;?></td>
                  <td><?php echo $active;?></td>
                  <!-- <td>
                     <a href="<?php echo SITEURL;?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update Category</a>
                     <a href="<?php echo SITEURL;?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name;?>" class="btn-danger">Delete Category</a>
                     
                  </td> -->
               </tr>


                     <?php
                     
                  }
               }
               else
               {
                  ?>

                  <tr>
                     <td colspan="6"><div class="error">No Category Added. </div></td>
                  </tr>


                  <?php
               }
               ?>


               
              
            </table>
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           
            <!-- <table class="tbl-full"> 
               <tr>
                  <th>S.N.</th>
                  
                  <th>Full Name</th>
                  <th>Username</th>
                  <th>Actions</th>

               </tr>
               <tr>
                  <td>1. </td>
                  <td>Md.mostafizur Rahim</td>
                   <td>mostafiz</td> -->
                  <!-- <td>
                     <a href="#" class="btn-secondary">Update Admin</a>
                     <a href="#" class="btn-danger">Delete Admin</a>
                     
                  </td> -->
               <!-- </tr>
               <tr>
                  <td>2. </td>
                  <td>Md.mostafizur Rahim</td> -->
                  <!-- <td>mostafiz</td>
                  <td>
                     <a href="#" class="btn-secondary">Update Admin</a>
                     <a href="#" class="btn-danger">Delete Admin</a>
                  </td> -->
               <!-- </tr>
               <tr>
                  <td>3. </td>
                  <td>Md.mostafizur Rahim</td> -->
                  <!-- <td>mostafiz</td>
                  <td>
                     <a href="#" class="btn-secondary">Update Admin</a>
                     <a href="#" class="btn-danger">Delete Admin</a>
                  </td> -->
               <!-- </tr>
            </table> --> 

    </div>
    
</div>

<?php include('partials/footer.php') ?>