<?php include('../config/constants.php') ?>

<html>
    <head>
        <title>Login - food order System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>
            <?php 
                if(isset($_SESSION['login']))
                {
                     echo $_SESSION['login'];
                     unset ($_SESSION['login']);
                }
                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br><br>
<!--Login Form Starts here-->
    <form action="" method="POST" class="text-center">
        Username: <br>
        <input type="text" name="username" placeholder="Enter Username"><br><br>
        Password: <br>
        <input type="password" name="password" placeholder="Enter Password"><br><br>

        <input type="submit" name="submit" value="Login" class="btn-primary">
        <br><br>
    
    </form>
<!--Login Form ENDs here-->
            <p class="text-center">Created By - <a href="#">Group-9</a></p>
        </div>

    </body>
</html>
<?php 

//check  submit button clikd or not
if(isset($_POST['submit']))
{
    $username =$_POST['username'];
    $password =md5($_POST['password']);

    //Sql check exists or not
    $sql="SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

    //execute the query
    $res=mysqli_query($conn,$sql);
    
    //count rows to check user exist or not
    $count = mysqli_num_rows($res);
    if($count==1)
    {
        //login success
        $_SESSION['login']="<div class='success'> Login Successful.</div>";
        $_SESSION['user']=$username;//check user loggin in or not logout will unset it
        //redirect to home page
        header('location:'.SITEURL.'admin/');
    }
    else
    {
         //login fail
         $_SESSION['login']="<div class='error text-center'> Username and Password Did Not Match.</div>";
         //redirect to home page
         header('location:'.SITEURL.'admin/login.php');
    }
}
?>