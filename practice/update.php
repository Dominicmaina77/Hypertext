<?php
@include("dbconnection.php");
error_reporting(E_ALL);
$userid=$_GET['id'];
echo $userid;

$select= "SELECT * FROM users WHERE id= '$userid'";
$result= mysqli_query($connection,$select);
$row=mysqli_fetch_array($result);

if(isset($_POST['update_user'])){
    $username=$_POST["username"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $phonenumber=$_POST["phonenumber"];

    $update= "UPDATE users SET username='$username', email='$email', password='$password', phonenumber='$phonenumber' WHERE id= '$userid'";

    $result=mysqli_query($connection,$update);
    if($result){
        echo "User updated successfully";
    }else{
        echo "User update failed";
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
<div class="container mt-3 " id="myform">

<div class="row">
    <div class="col-lg-5">
        <form action="" class="bg-secondary " method="post" >
            <div class="container">
                <label for="username" class="form-label">First name</label><br>
                <input type="text" class="form-control" placeholder="enter username" id="fname" name="username" value="<?php echo $row['username'];?>"><br>
               
                <label for="email" class="form-label">Email</label><br>
                <input type="text" class="form-control" id="email" placeholder="enter email" name="email" value="<?php echo $row['email'];?>"><br>
                <label for="password" class="form-label">password</label><br>
                <input type="password" class="form-control" id="password" placeholder="enter password" name="password" value="<?php echo $row['password'];?>"><br>
                <label for="phone number" class="form-label">Phone number</label><br>
                <input type="digit" class="form-control" id="phonenumber" placeholder="enter number" name="phonenumber" value="<?php echo $row ['phonenumber'];?>"><br>
            </div>
            <button class="btn btn-primary d-flex mx-auto" type="submit" name="update_user">update</button>
        </form>
        
    </div>
</div>




</div>
    
</body>
</html>

