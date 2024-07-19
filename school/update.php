
<?php
@include('connection.php');
$id = $_GET['id'];


$select = "SELECT * FROM students WHERE id = '$id'";
$selected = mysqli_query($connection, $select);

$row = mysqli_fetch_array($selected);



if(isset($_POST['user_update'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phonenumber'];

    $update = "UPDATE students SET username = '$username',email = '$email', password = '$password', phonenumber = '$phone' WHERE id = '$id'";
    $success = mysqli_query($connection, $update);

    if($success){
        echo "user updated successfully";
    }else{
        echo "error updating user info";
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
                <form action="" method ="post">
                    <div class="container">
                        <label for="username" class="form-label">First name</label><br>
                        <input type="text" class="form-control" placeholder="enter username" name="username" value="<?php echo $row['username']; ?>"><br>
                        <label for="username" class="form-label">Email </label><br>
                        <input type="email" class="form-control" placeholder="enter email"  name="email" value="<?php echo $row['email'] ;?>"><br>
                        <label for="username" class="form-label"> Password</label><br>
                        <input type="password" class="form-control" placeholder="enter password"  name="password" value="<?php echo $row['password']; ?>"><br>
                        <label for="username" class="form-label">Phone number</label><br>
                        <input type="number" class="form-control" placeholder="enter phonenumber" name="phonenumber" value="<?php echo $row['phonenumber'] ;?>"><br>
                    </div>
                    <button class="btn btn-primary d-flex mx-auto" type="submit" name="user_update">update</button>
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

    form {
        border-radius: 10px;
        display: grid;
    }

    form label {
        align-self: center;

    }

    form input {
        padding: 10px;
        margin: 10px;
        border-radius: 10px;

    }
</style>

</html>
?>