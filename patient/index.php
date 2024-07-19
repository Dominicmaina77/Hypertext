<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <?php
    @include("../include/header.php");
    @include("../include/connection.php");
    ?>
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-2" style="margin-left: -30px;">
                    <?php
                    @include("sidenav.php");
                    ?>
                </div>
                <div class="col-lg-10">
                    <h5 class="my-3">Patient Dashboard</h5>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="row">
                                <div class="col-lg-3 bg-info mx-2" style="height: 150px;">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <h5 class="text-white my-4">My Profile</h5>
                                            </div>
                                            <div class="col-lg-4">
                                                <a href="profile.php">
                                                <i class=" fa-sharp fa-solid fa-user fa-beat-fade my-5 fa-2xl" style="color: white;"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                                <div class="col-lg-3 bg-warning mx-2" style="height: 150px;">
                                   <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <h5 class="text-white my-4">Book Appointment</h5>
                                            </div>
                                            <div class="col-lg-4">
                                                <a href="">
                                                <i class=" fa-sharp fa-solid fa-calendar-days fa-beat-fade my-5 fa-2xl" style="color: white;"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                                <div class="col-lg-3 bg-success mx-2" style="height: 150px;">
                                 <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <h5 class="text-white my-4">My Invoice</h5>
                                            </div>
                                            <div class="col-lg-4">
                                                <a href="">
                                                <i class=" fa-sharp fa-solid fa-file-invoice-dollar fa-beat-fade my-5 fa-2xl" style="color: white;"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if(isset($_POST['send'])){
                        $title = $_POST['title'];
                        $message = $_POST['message'];

                        if(empty($title)){

                        }else if(empty($message)){

                        }else{
                            $username = $_SESSION['patient'];
                            $insert = "INSERT INTO report(title,message,username,data_send) VALUES('$title','$message','$username',NOW())";
                            $result = mysqli_query($connection,$insert);
                            
                            if($result){
                                echo "<script>alert('You have sent your report')</script>";
                            }else{
                                echo "<script>alert('failed')</script>";
                            }
                        }

                        
                    }
                    ?>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6 bg-info my-5">
                                <h5 class="text-center my-2">Send a report</h5>
                            <form action="" method="post">
                                <label for="" class="form-label">Title</label>
                                <br>
                                <input type="title" class="form-control" placeholder="enter report title" name="title">
                                <br>
                                <label for="" class="form-label">Message</label>
                                <br>
                                <input type="message" class="form-control" placeholder="enter message" name="message">
                                <br>

                                <button class="btn btn-success" type="submit" name="send">Send Report</button>

                            </form>                                                                    
                            </div>
                            <div class="col-lg-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>