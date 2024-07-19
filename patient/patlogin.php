<?php
session_start();
@include("../include/connection.php");
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username)){
        echo "<script>alert('Enter username')</script>";
    }else if(empty($password)){
        echo "<script>alert('Enter password')</script>";
    }else{
        $select ="SELECT * FROM patient WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($connection,$select);

        if(mysqli_num_rows($result)==1){
             header("Location:index.php");
             $_SESSION['patient'] = $username;
        }else{
            echo "<script>alert('Invalid account')</script>";
        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Login Page</title>
</head>
<body>
    <?php
    @include("../include/header.php");
    ?>
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6 my-5">
                    <h5 class="text-center my-3">Patient Login</h5>
                    <form action="" method="post">
                        <label for="" class="form-label">Username</label>
                        <br>
                        <input type="text" class="form-control" name="username" placeholder="enter username">
                        <br>
                        <label for="" class="form-label">Password</label>
                        <br>
                        <input type="password" class="form-control" name="password" placeholder="enter password">
                        <br>
                        <button class="btn btn-info d-block mx-auto" type="submit" name="login">Login</button>
                        <br>
                        <p>I don't have an account <a href="account.php">Click Here</a></p>
                    </form>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </div>
</body>
<style>
    body{
        background-image: url("../hmimages/hosp.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
</style>
</html>