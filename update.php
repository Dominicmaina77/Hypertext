<?php
@include('connection.php');
error_reporting(E_ALL);
$userid = $_GET['id'];

echo $userid;

// SELECT DATA
$select = "SELECT * FROM users WHERE id='$userid'";
$selected = mysqli_query($connection, $select);
$row = mysqli_fetch_array($selected);

// if i get a submit query
if (isset($_POST['update_user'])) {
    // create variables to store form data
    $username = $_POST['username'];
    echo $username;
    // $email=$_POST["email"];
    // $password=$_POST["password"];
    // $phone=$_POST["phone"];

    // create a query that will save data to database
    $update = "UPDATE users SET username='$username' WHERE id = '$userid')";
    if($update){
        echo "User updating starting....";
    }
    

    //  link the query with the database
    $result = mysqli_query($connection, $update);

    //  check if user created or not
    if($result) {
        echo "user updated successfully";
    } else {
        echo "user updating failed";
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
                        <input type="text" class="form-control" placeholder="enter username" id="fname" name="username" value="<?php echo $row['username'] ?>"><br>

                    </div>
                    <button class="btn btn-primary d-flex mx-auto" type="submit" name="update_user">update</button>
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