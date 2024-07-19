<?php
@include("connection.php");

if(isset($_POST['apply'])) {
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone = $_POST['number'];
    $country = $_POST['country'];
    $password = $_POST['pass'];
    $cpassword = $_POST['con_pass'];

    $error = array();

    if(empty($fname)){
        $error['apply'] = "Enter firstname";
    }else if(empty($sname)){
        $error['apply'] = "Enter surname";
    }else if(empty($username)){
        $error['apply'] = "Enter username";
    }else if(empty($email)){
        $error['apply'] = "Enter email";
    }else if(empty($gender)){
        $error['apply'] = "Enter gender";
    }else if(empty($phone)){
        $error['apply'] = "Enter phone number";
    }else if(empty($country)){
        $error['apply'] = "Enter country";
    }else if(empty($password)){
        $error['apply'] = "Enter password";
    }else if($cpassword !=$password){
        $error['apply'] = "match failed";
    }

    if(count($error) == 0){
         $insert ="INSERT INTO doctors(firstname,surname,username,email,gender,phone,country,password,salary,data_reg,status,profile) VALUES('$fname','$sname','$username','$email','$gender','$phone','$country','$password','0',NOW(),'Pendding','doctor.jpg')";
         
         $result = mysqli_query($connection,$insert);
         if($result){
            echo "success";
            header("location:doctorlogin.php");
         }else{
             echo "failed";
             
         }
    }
}

if(isset($error)){
    $s = $error['apply'];
    $show = "<h5 class='text-centre alert alert-danger'>$s</h5>";
}else{
    $show ="";
}
   




?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Now</title>
</head>

<body>
    <?php
    @include("header.php");
    @include("connection.php");

    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-3">
                    <h5 class="text-center">Apply Now</h5>
                    <div>
                    <?php
                     echo $show;    
                    ?>
                    </div>
                    <form action="" method="post">
                        <label for="" class="form-label">Fisrtname</label>
                        <br>
                        <input type="text" class="form-control" placeholder="enter  firstname" name="fname" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>">
                        <br>
                        <label for="" class="form-label">Surname</label>
                        <br>
                        <input type="text" class="form-control" name="sname" placeholder="enter surname" value="<?php if(isset($_POST['sname'])) echo $_POST['sname']; ?>">
                        <br>
                        <label for="" class="form-label">Username</label>
                        <br>
                        <input type="text" class="form-control" name="uname" placeholder="enter username" value="<?php if(isset($_POST['uname'])) echo $_POST['uname']; ?>">
                        <br>
                        <label for="" class="form-label">Email</label>
                        <br>
                        <input type="email" class="form-control" name="email" placeholder="enter email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                        <br>
                        <label for="" class="form-label">Select Gender</label>
                        <select name="gender" id="" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <br>
                        <label for="" class="form-label">Phone</label>
                        <br>
                        <input type="number" class="form-control" placeholder="enter number" name="number" value="<?php if(isset($_POST['number'])) echo $_POST['number']; ?>">
                        <br>
                        <label for="" class="form-label">Select Country</label>
                        <select name="country" id="" class="form-control">
                            <option value="">Select Country</option>
                            <option value="Spain">Spain</option>
                            <option value="Germany">Germany</option>
                            <option value="Kenya">Kenya</option>
                        </select>
                        <br>
                        <label for="" class="form-label">Password</label>
                        <br>
                        <input type="password" class="form-control" placeholder="enter password" name="pass">
                        <br>
                        <label for="" class="form-label"> Confirm Password</label>
                        <br>
                        <input type="password" class="form-control" placeholder="enter confirm password" name="con_pass">
                        <br>
                        <button class="btn btn-success d-block mx-auto" name="apply" type="submit">Apply Now</button>
                        <p>I already have an account <a href="doctorlogin.php">Click Here</a></p>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>

    </div>

</body>
<style>
    body {
        background-image: url("../hmimages/hosp.jpg");
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>

</html>