<?php
@include("header.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">

                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                    @include("sidenav.php");
                    @include("connection.php"); 
                    ?>


                </div>
                <div class="col-md-10 ">
                    <h4 class="my-2">Admin Dashboard</h4>
                    <div class="col-md-12 my-1">
                        <div class="row">
                            <div class="col-md-3 bg-success mx-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row d-flex">
                                        <div class="col-md-8 ">
                                            <?php
                                            $select = "SELECT * FROM admin";
                                            $ad = mysqli_query($connection,$select);
                                            $num=mysqli_num_rows($ad);
                                            
                                            
                                            ?>
                                            <h5 class="text-white  d-flex" style="font-size: 30px;"><?php
                                            echo $num;
                                            ?></h5>
                                            <h5 class="text-white d-flex">Total</h5>
                                            <h5 class="text-white d-flex">Admin</h5>
                                            <div class="col-md-4 d-flex float-end ">
                                                <a href="admin.php"><i class="fa fa-users-cog fa-1x fa-fade" style="color: white;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-info mx-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row d-flex">
                                        <div class="col-md-8 ">
                                            <?php
                                            $select = "SELECT * FROM doctors WHERE status='Approved'";
                                            $doctor = mysqli_query($connection,$select);

                                            $num2 = mysqli_num_rows($doctor);
                                            
                                            ?>
                                            <h5 class="text-white  d-flex" style="font-size: 30px;"><?php echo $num2;?></h5>
                                            <h5 class="text-white d-flex">Total</h5>
                                            <h5 class="text-white d-flex">Doctors</h5>
                                            <div class="col-md-4 d-flex float-end ">
                                                <a href="doctor.php"><i class="fa-solid fa-user-doctor fa-1x fa-fade" style="color: white;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-warning mx-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row d-flex">
                                        <div class="col-md-8 ">
                                            <?php
                                            $select= "SELECT * FROM patient";
                                            $result = mysqli_query($connection,$select);
                                            $num= mysqli_num_rows($result);


                                            
                                            ?>
                                            <h5 class="text-white  d-flex" style="font-size: 30px;"><?php echo $num?></h5>
                                            <h5 class="text-white d-flex">Total</h5>
                                            <h5 class="text-white d-flex">Patient</h5>
                                            <div class="col-md-4 d-flex float-end ">
                                                <a href="patient.php"><i class="fa-solid fa-bed-pulse fa-fade" style="color: white;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 bg-danger mx-2 my-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row d-flex">
                                        <div class="col-md-8 ">
                                            <?php
                                            $select ="SELECT * FROM report";
                                            $result= mysqli_query($connection,$select);
                                            $res = mysqli_num_rows($result);
                                            ?>
                                            <h5 class="text-white  d-flex" style="font-size: 30px;"><?php echo $res;?></h5>
                                            <h5 class="text-white d-flex">Total</h5>
                                            <h5 class="text-white d-flex">Report</h5>
                                            <div class="col-md-4 d-flex float-end ">
                                                <a href="report.php"><i class="fa-solid fa-flag fa-fade" style="color: white;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-warning mx-2 my-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row d-flex">
                                        <div class="col-md-8 ">
                                            <?php
                                            $select = "SELECT * FROM doctors WHERE status = 'Pendding'";
                                            $job = mysqli_query($connection, $select);
                                            $num = mysqli_num_rows($job);
                                            ?>
                                            <h5 class="text-white  d-flex" style="font-size: 30px;">
                                            <?php
                                            echo $num;
                                            ?>
                                            </h5>
                                            <h5 class="text-white d-flex">Total</h5>
                                            <h5 class="text-white d-flex">Job Request</h5>
                                            <div class="col-md-4 d-flex float-end ">
                                                <a href="job_request.php"><i class="fa-solid fa-flag fa-fade" style="color: white;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-success mx-2 my-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row d-flex">
                                        <div class="col-md-8 ">
                                            <?php
                                            $select = "SELECT sum(amount_paid) as profit FROM income";
                                            $result = mysqli_query($connection,$select);
                                            $row = mysqli_fetch_array($result);
                                            $inc = $row['profit'];
                                            
                                            ?>
                                            <h5 class="text-white  d-flex" style="font-size: 30px;"><?php echo $inc;?></h5>
                                            <h5 class="text-white d-flex">Total</h5>
                                            <h5 class="text-white d-flex">Income</h5>
                                            <div class="col-md-4 d-flex float-end ">
                                                <a href="income.php"><i class="fa-solid fa-money-check-dollar fa-fade" style="color: white;"></i></a>
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
    </div>

</body>

</html>