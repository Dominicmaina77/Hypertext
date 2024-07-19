<?php
@include('connection.php');

// if i get a submit query
if(isset($_POST["create_user"])){
    // create variables to store form data
    $username=$_POST["username"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $phone=$_POST["phone"];

// create a query that will save data to database
 $insert= "INSERT INTO users(username,email,password,phonenumber) VALUES ('$username', '$email', '$password', '$phone')";
 
//  link the query with the database
 $result=mysqli_query($connection,$insert);

//  check if user created or not
if($result){
    echo "user created successfully";
}else{
    echo "user creation failed";
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
    <div class="container mt-3 " id="myform">

        <div class="row">
            <div class="col-lg-5">
                <form action="" class="bg-secondary " method="post" >
                    <div class="container">
                        <label for="username" class="form-label">First name</label><br>
                        <input type="text" class="form-control" placeholder="enter username" id="fname" name="username"><br>
                       
                        <label for="email" class="form-label">Email</label><br>
                        <input type="text" class="form-control" id="email" placeholder="enter email" name="email"><br>
                        <label for="password" class="form-label">password</label><br>
                        <input type="password" class="form-control" id="password" placeholder="enter password" name="password"><br>
                        <label for="phone number" class="form-label">Phone number</label><br>
                        <input type="digit" class="form-control" id="phonenumber" placeholder="enter number" name="phone"><br>
                    </div>
                    <button class="btn btn-primary d-flex mx-auto" type="submit" name="create_user">sign in</button>
                </form>
                
            </div>
        </div>



        
    </div>
</body>
<style>
    #myform {
        border-radius: 10px;
        display: grid;
    }
    form{
        border-radius: 10px;
        display: grid;
    }
    form label{
        align-self: center;

    }
    form input{
        padding: 10px;
        margin: 10px;
        border-radius: 10px;

    }
</style>

</html>
?>