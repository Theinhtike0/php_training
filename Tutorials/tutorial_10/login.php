<?php
    include "db.php";
        if(isset($_POST['login'])){
       $username=$_POST['username'];
       $email=$_POST['email'];
       $password=$_POST['password'];
       $error=[];

       empty(trim($username))? $error[]="Name is required":'';
       empty(trim($email))? $error[]="Email required":'';
       empty(trim($password))? $error[]="Password required":'';

       if(count($error)==0){
           $result=mysqli_query($conn,"INSERT INTO tutorial.login(username,email,password,exp_date,reset_link_token)VALUES('$username','$email','$password','$exp_date','$reset_link_token')");
           if($result){
               header("location: index.php");
           }else{
               echo mysqli_connect_error();
           }
       }

    }
?>


<?php include "layout/header.php" ?>
<form action="" method="post" enctype="multipart/form-data">

<?php include "error.php" ?>

    <div>
        <label for="username">Name::</label>
        <input type="text" name="username" placeholder="Enter user name" class="form-control">
    </div>
    <div>
        <label for="email">Email::</label>
        <input type="text" name="email" placeholder="Enter email" class="form-control">
    </div>
    <div>
        <label for="password">Password::</label>
        <input type="text" name="password" placeholder="Enter password" class="form-control">
    </div>
    <div>
        <button type="submit" name="login" class="mt-3 rounded">login</button>
    </div>
    <a href="forgot-password.php">Forgot Passowrd?</a>
</form>
<?php include "layout/footer.php" ?>