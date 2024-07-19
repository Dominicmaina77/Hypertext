<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
    @include("../include/header.php");
    @include("connection.php");

    ?>
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-2" style="margin-left:-30px;">
                    <?php
                    @include("sidenav.php");
                    ?>

                </div>
                <div class="col-lg-10">
                    <div class="container-fluid">
                        <h5>Doctor's Dashboard</h5>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-3 my-2 bg-info mx-2" style="height: 150px;">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <h5 class="text-center my-4 text-white">My Profile</h5>
                                            </div>
                                            <div class="col-lg-4">
                                                <a href="profile.php"><i class="fa-solid fa-user-circle fa-3x my-4 fa-fade" style="color: white;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 my-2 bg-warning mx-2" style="height: 150px;">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-8">
                                            <?php
                                            $select= "SELECT * FROM patient";
                                            $result = mysqli_query($connection,$select);
                                            $num= mysqli_num_rows($result);


                                            
                                            ?>
                                                <h5 class=" my-2 text-white" style="font-size: 30px;"><?php echo $num;?></h5>
                                                <h5 class=" text-white">Total</h5>
                                                <h5 class=" text-white">Patient</h5>
                                            </div>
                                            <div class="col-lg-4">
                                                <a href="patient.php"><i class="fa-solid fa-bed-pulse fa-3x my-4 fa-fade" style="color: white;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 my-2 bg-success mx-2" style="height: 150px;">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <h5 class=" my-2 text-white" style="font-size: 30px;">0</h5>
                                                <h5 class=" text-white">Total</h5>
                                                <h5 class=" text-white">Appointment</h5>
                                            </div>
                                            <div class="col-lg-4">
                                                <a href="#"><i class="fa-solid fa-calendar-days fa-3x my-4 fa-fade" style="color: white;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>