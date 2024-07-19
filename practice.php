<?php
@include ("connection3.php");

if (isset($_POST["create_user"])) {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $number = $_POST["number"];

    $insert = "INSERT INTO users(username,email,password,phonenumber) VALUES('$username','$email','$password','$number')";

    $result = mysqli_query($connection, $insert);

    if ($result) {
        echo "user created";
    } else {
        echo "user not created";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</head>

<body>
    <form action="" method="post">
        <label for="" class="form-label">Username</label>
        <br>
        <input type="text" class="form-control" placeholder="enter username" name="username">
        <br>
        <label for="" class="form-label">email</label>
        <br>
        <input type="email" class="form-control" placeholder="enter email" name="email">
        <br>
        <label for="" class="form-label">Password</label>
        <br>
        <input type="password" class="form-control" placeholder="enter password" name="password">
        <br>
        <label for="" class="form-label">Phonenumber</label>
        <br>
        <input type="number" class="form-control" placeholder="enter number" name="number">
        <br>
        <button class="btn btn-primary" type="submit" name="create_user">Submit</button>

    </form>

</body>

</html>