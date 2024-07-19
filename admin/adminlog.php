<?php
@include("header.php");
@include("../include/connection.php");

if (isset($_POST["login"])){
    $username = $_POST["uname"];
    $password = $_POST["pass"];

    $error = array();

    if(empty($username)){
        $error['admin'] = "username is required";
    }else if(empty($password)){
        $error['admin'] = "password is required";
    }

    if(count($error) == 0){

        $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $result = mysqli_query($connection,$query);
        
        if (mysqli_num_rows($result) ==1 ){
            echo "validated successfully";
            $_SESSION['admin'] = $username;
             header("location:index.php");
        }
        else{
            echo "not validated";
        }
    }

   
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 ">
                    
                    <form action="" method="post" class="bg-secondary px-5 my-5 py-5" >
                    <img src="../hmimages/adminlogin.png" alt="" class="rounded-circle  d-block mx-auto">
                    <br>
                    <div >
                        <?php
                            if(isset($error['admin'])){
                                $sh =  $error['admin'];
                                $show = "<h4 class='alert alert-danger'>$sh</h4>";
                            }else{
                                $show ="";
                            }
                            echo $show;
                       ?>
                    </div>
                        <label for="" class="form-label">Username</label>
                        <br>
                        <input type="text" class="form-control" name="uname" placeholder="enter username">
                        <br>
                        <label for="" class="form-label">Password</label>
                        <br>
                        <input type="password" class="form-control" name="pass" placeholder="enter password">
                        <br>
                        <button class="btn btn-success d-block mx-auto" type="submit" name="login">Submit</button>


                    </form>
                </div>

            </div>
        </div>
    </div>

</body>
<style>
    body {
        background-image: url("../hmimages/hosp2.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
</style>

</html>