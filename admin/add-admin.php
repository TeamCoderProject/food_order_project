<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>
            Add Admin
        </h1>
        <br><br>

        <?php
        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        ?>

        <form action="" method ="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" placeholder="Enter your name"></td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" placeholder="Enter username"></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" placeholder="Enter password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class = "btn-secondary"></input>

                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php');?>


<?php
//Process the value from form andd save it in Database

//check whether the SUBMIT button is clicked or not
if(isset($_POST['submit'])){
    // echo "Button clicked";

    // Get the data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //SQL querry to save the ddata into database
    $sql= "INSERT INTO tbl_admin SET
    full_name = '$full_name',
    username = '$username',
    password = '$password'
    ";
    
    
    // Executing query and saving data into database
    $res = mysqli_query($conn, $sql);
    // check whether the data is inserted
    if($res== true){
        // echo "data inserted";
        $_SESSION['add'] = "Admin Added Successfully";
        header("location:".SITEURL.'admin/manage-admin.php');
    }
    else{
        // echo "failed to insert data";
        $_SESSION['add'] = "Failed to Add Admin";
        header("location:".SITEURL.'admin/add-admin.php');
    }


}

?>