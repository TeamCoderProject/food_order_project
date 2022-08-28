<?php include('partials/menu.php'); ?>


         <!--Main content starts  -->
         <div class="main-content">
            <div class="wrapper">
            <h1>Dashboard</h1>
            <br><br>
            <?php 
                if(isset($_SESSION['login']))
                {
                     echo $_SESSION['login'];
                     unset ($_SESSION['login']);
                }
            ?>
            <br><br>

            <div class="col-4 text-center">
                <h1>1</h1>
                <br />
                Fast Food
            </div>

            <div class="col-4 text-center">
                <h1>2</h1>
                <br />
                Sea Food
            </div>

            <div class="col-4 text-center">
                <h1>3</h1>
                <br />
               Drinks
            </div>

            <div class="col-4 text-center">
                <h1>4</h1>
                <br />
                Desert
            </div>

            <div class="clearfix"></div>

            </div>
            
         </div>
         <!--Main content ends  -->


<?php include('partials/footer.php');  ?>