<?php
@include("connection.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
                        <li class="nav-item"><a href="#" class="nav-link">' .$user. '</a></li>
                        <li class="nav-item"><a href="logout" class="nav-link">Logout</a></li>
                        ';
                    }else if(isset($_SESSION['doctor'])){
                        $user = $_SESSION['doctor'];
                        echo '<li class="nav-item"><a href="doctorlogin.php" class="nav-link">' .$user.'</a></li>
                         <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>'
                                            ;
                    }else if(isset($_SESSION['patient'])){
                        $user = $_SESSION['patient'];
                        echo '<li class="nav-item"><a href="doctorlogin.php" class="nav-link">' .$user.'</a></li>
                         <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>';
                    }else{
                      echo '
                      <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                      <li class="nav-item"><a href="../admin/adminlog.php" class="nav-link">Admin</a></li>
                      <li class="nav-item"><a href="doctorlogin.php" class="nav-link">Doctor</a></li>
                      <li class="nav-item"><a href="patlogin.php" class="nav-link">Patient</a></li>
                      ';
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