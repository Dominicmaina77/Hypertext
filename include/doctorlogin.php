<?php
session_start();
@include("connection.php");
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $error = array();
    $select ="SELECT * FROM doctors WHERE username='$username' AND password='$password'";
    $result = mysqli_query($connection,$select);
    $row = mysqli_fetch_array($result);
    if(empty($username)){
       $error['login'] ="Enter username";
    }else if(empty($password)){
        $error['login'] ="Enter password";
    }else if($row['status'] =="Pendding"){
        $error['login'] ="Please wait for admin to confirm";
    }else if($row['status'] =="Rejected"){
        $error['login'] ="Try again later";
    }
    if(count($error)==0){
        $query = "SELECT * FROM doctors WHERE username ='$username' AND password ='$password'";
        $result = mysqli_query($connection,$query);
        if(mysqli_num_rows($result)){
            echo " <script>alert('Done')</script>";
            $_SESSION['doctors'] =$username;
            header("Location:../doctor/index.php");
        }else{
            echo "<script>alert('Invalid')</script>";
        }
    }
} 
if(isset($error['login'])){
    $l = $error['login'];
    $show = "<h5 class='alert alert-danger'>$l</h5>";
}else{
    $show = "";
}   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Login Page</title>
</head>
<body>
    <?php
      @include("connection.php");
      @include("header.php");
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h5 class="text-center my-5">Doctors Login</h5>
                    <div>
                        <?php
                        echo $show;
                        ?>
                    </div>
                    <form action="" method="post">
                        <label for="" class="form-label">Username</label>
                        <br>
                        <input type="text" class="form-control" name="username" placeholder="enter username">
                        <br>
                        <label for="" class="form-label">Password</label>
                        <br>
                        <input type="password" class="form-control" placeholder="enter password" name="password">
                        <br>
                        <button class="btn btn-success d-block mx-auto" type="submit" name="login">Login</button>
                        <p>I don't have an account <a href="apply.php">Apply now!!!</a></p>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
<style>
    body{
        background-image: url("../hmimages/hosp2.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
</html>