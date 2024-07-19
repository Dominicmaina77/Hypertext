<?php
@include("../include/connection.php");
if(isset($_POST['create'])){
    $firstname = $_POST['fname'];
    $surname = $_POST['sname'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phone'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $password = $_POST['pass'];
    $conpass = $_POST['con_pass'];

    $error= array();
    if(empty($firstname)){
        $error['ac'] = "Enter firstname";
    }else if(empty($surname)){
        $error['ac'] = "Enter surname";
    }else if(empty($username)){
        $error['ac'] = "Enter username";
    }else if(empty($email)){
        $error['ac'] = "Enter email";
    }else if(empty($phonenumber)){
        $error ['ac']= "Enter phonenumber";
    }else if($gender == ""){
        $error['ac'] = "Select your gender";
    }else if($country == ""){
        $error['ac'] = "Select your country";
    }else if(empty($password)){
        $error['ac'] = "Enter password";
    }else if($conpass !=$password){
        $error['ac'] = "Passwords unidentitical";
    }
    if(count($error)==0){
        $insert = "INSERT INTO patient(firstname,surname,username,email,phonenumber,gender,country,password,data_reg,profile) VALUES('$firstname','$surname','$username','$email','$phonenumber','$gender','$country','$password',NOW(),'patient.jpg')";
        $result = mysqli_query($connection,$insert);
        if($result){
            header("location:patlogin.php");
        }else{
            echo '<script>alert("failed")</script>';
        }
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
</head>
<body>
    <?php
    @include("../include/header.php");
    ?>
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6 my-2">
                    <h5 class="text-center text-info my-2">Create Account</h5>
                    <form action="" method="post">
                        <label for="" class="form-label">Fisrtname</label>
                        <br>
                        <input type="text" class="form-control" name="fname" placeholder="enter firstname">
                        <br>
                        <label for="" class="form-label">Surname</label>
                        <br>
                        <input type="text" class="form-control" name="sname" placeholder="enter surname">
                        <br>
                        <label for="" class="form-label">Username</label>
                        <br>
                        <input type="text" class="form-control" name="uname" placeholder="enter username">
                        <br>
                        <label for="" class="form-label">Email</label>
                        <br>
                        <input type="email" class="form-control" name="email" placeholder="enter email">
                        <br>
                        <label for="" class="form-label">Phone Number</label>
                        <br>
                        <input type="number" class="form-control" name="phone" placeholder="enter number">
                        <br>     
                        <select name="gender" id="" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <br>
                        <select name="country" id="" class="form-control">
                            <option value="">Select Country</option>
                            <option value="Spain">Spain</option>
                            <option value="Japan">Japan</option>
                        </select>
                        <br>
                        <label for="" class="form-label">Password</label>
                        <br>
                        <input type="password" class="form-control" name="pass" placeholder="enter password">
                        <br>
                        <label for="" class="form-label"> Confirm Password</label>
                        <br>
                        <input type="password" class="form-control" name="con_pass" placeholder="enter password">
                        <br>
                        <button class="btn btn-info d-block mx-auto" name="create">Create Account</button>
                        <p>I already have an account. <a href="patlogin.php">Click Here.</a></p>
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