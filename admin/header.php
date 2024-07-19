<?php
@include("../include/connection.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="navbar navbar-expand-lg navbar-info bg-info ">
        <div class="container-fluid bg-info">
            <div>
                <h5 class="text-white">Hospital Management</h5>
            </div>



            <div>

                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#mynav">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <ul class="navbar-collapse collapse navbar-nav" id="mynav">

                
                    <?php
                    if(isset($_SESSION['admin'])){
                        $user = $_SESSION['admin'];
                        echo '
                        <li class="nav-item"><a href="#" class="nav-link">User</a></li>
                        <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
                        ';
                    }else{
                       echo '
                       <li class="nav-item"><a href="adminlog.php" class="nav-link">Admin</a></li>
                       <li class="nav-item"><a href="" class="nav-link">Patient</a></li>
                       <li class="nav-item"><a href="" class="nav-link">Doctor</a></li>';
                    }
                    
                    ?>
                    
                </ul>
            </div>
        </div>


    </div>



    </div>

</body>
<style></style>

</html>