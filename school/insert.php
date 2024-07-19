<?php
@include("connection.php");

if (isset($_POST["create_user"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phonenumber = $_POST["phonenumber"];

    $insert = "INSERT INTO students(username,email,password,phonenumber) VALUES('$username','$email','s$password','$phonenumber')";
    $result = mysqli_query($connection,$insert);

    if (!$result) {
        echo "Error";
    }else{
        echo "Success";
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
        <form action="" method="post">
            <label for="" class="form-label">Username</label>
            <br>
            <input type="text" class="form-control" placeholder="enter username" name="username">
            <br>
            <label for="" class="form-label">Email</label>
            <br>
            <input type="email" class="form-control" placeholder="enter email" name="email">
            <br>
            <label for="" class="form-label">Password</label>
            <br>
            <input type="password" class="form-control" placeholder="enter password" name="password">
            <br>
            <label for="" class="form-label">Phone number</label>
            <br>
            <input type="digit" class="form-control" placeholder="enter number" name="phonenumber">
            <br>
            <button class="btn btn-primary d-block mx-auto" type="submit" name="create_user">Sign in</button>
        </form>
    </div>


</body>
<style>
    form {
        width: 70vh;
        background-color: black;
        color: cyan;
        justify-content: center;
        align-self: center;
        padding: auto;
        margin: auto;
        border-radius: 10px;
        margin-top: 20px;

    }
    input {
        margin-top: 10px;
        margin-bottom: 10px;
    }
</style>

</html>