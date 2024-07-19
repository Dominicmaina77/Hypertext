<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Profile Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    @include("../include/header.php");
    ?>
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-2" style="margin-left:-30px;">
                    <?php
                    @include("sidenav.php");
                    @include("../include/connection.php");
                   ?>
                </div>
                <div class="col-lg-10">
                    <div class="container-fluid">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php
                                    $doc=$_SESSION['doctor'];
                                    $select ="SELECT * FROM doctors WHERE username='$doc'";
                                    
                                    $result = mysqli_query($connection,$select);

                                    $row = mysqli_fetch_array($result);

                                    if(isset($_POST['upload'])){
                                        $img = $_FILES['img']['name'];

                                        if(empty($img)){

                                        }else{
                                            $update="UPDATE doctors SET profile='$img' WHERE username='$doc'";
                                            $query= mysqli_query($connection,$update);
                                            if($query){
                                                move_uploaded_file($_FILES['img']['tmp_name'],"img/$img");
                                            }
                                        }
                                    }
                                    
                                    ?>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <?php

                                          echo " <img src='img/". $row['profile']."' style='height: 250px;' class='col-lg-12 my-3'>";
                                        ?>
                                        <input type="file" class="form-control my-1" name="img">
                                        <button class="btn btn-success" type="submit" name="upload">Update Profile</button>
                                        
                                    </form>
                                    <div class="my-3">
                                        <table class="table-bordered p-5">
                                            <tr>
                                                <th class="text-center p-2">Details</th>
                                            </tr>
                                            <tr >
                                                <td>Fisrtname</td>
                                                <td><?php echo $row['firstname'];?></td>
                                            </tr>
                                            <tr >
                                                <td>Fisrtname</td>
                                                <td><?php echo $row['firstname'];?></td>
                                            </tr>
                                            <tr >
                                                <td>Surname</td>
                                                <td><?php echo $row['surname'];?></td>
                                            </tr>
                                            <tr >
                                                <td>Usertname</td>
                                                <td><?php echo $row['username'];?></td>
                                            </tr>
                                            <tr >
                                                <td>Email</td>
                                                <td><?php echo $row['email'];?></td>
                                            </tr>
                                            <tr >
                                                <td>Phone number</td>
                                                <td><?php echo $row['number'];?></td>
                                            </tr>
                                            <tr >
                                                <td>Gender</td>
                                                <td><?php echo $row['gender'];?></td>
                                            </tr>
                                            <tr >
                                                <td>Country</td>
                                                <td><?php echo $row['country'];?></td>
                                            </tr>
                                           
                                            <tr >
                                                <td>Salary</td>
                                                <td><?php echo $row['salary'];?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h5 class="text-center my-2">Change Username</h5>
                                    <form action="" method="post">
                                        <label for="" class="from-label">Change Username</label>
                                        <?php
                                        if(isset($_POST['change'])){

                                            $username =$_POST['username'];
                                            if(empty($username)){

                                            }else{
                                                $query ="UPDATE doctors SET username='$username' WHERE username='$doc'";
                                                $result = mysqli_query($connection,$query);

                                                if($result){
                                                    $_SESSION['doctor'] = $username;
                                                }
                                            }
                                        }
                                        ?>
                                        <input type="text" class="form-control" placeholder="enter username" name="username">
                                        <br>
                                        <button class="btn btn-info d-block mx-auto" type="submit" name="change">Change username</button>
                                    </form>
                                    <br><br>

                                    <h5 class="text-center my-2">Change Password</h5>
                                    <?php

                                    if($_POST['change_pass']){
                                        $old = $_POST['old'];
                                        $new = $_POST['new'];
                                        $con_pass = $_POST['con_pass'];
                                        $select ="SELECT * FROM doctors WHERE username ='$doc'";
                                        $result = mysqli_query($connection,$select);
                                        $row = mysqli_fetch_array($result);

                                        if($old !=$row['password']){

                                        }else if(empty($new)){

                                        }else if($con != $new){

                                        }else{
                                            $query= "UPDATE doctors SET paasword='$new' WHERE username ='$doc'";
                                            mysqli_query($connection,$query);
                                        }

                                    }
                                    ?>
                                    <label for="" class="form-label">Old Password</label>
                                    <input type="pass" class="form-control" name="old" placeholder="enter old password">
                                    <br>
                                    <label for="" class="form-label">New Password</label>
                                    <input type="pass" class="form-control" name="new" placeholder="enter new password">
                                    <br>
                                    <label for="" class="form-label">Confirm Password</label>
                                    <input type="pass" class="form-control" name="con_pass" placeholder="enter confirm password">
                                    <br>]
                                    <button class="btn btn-success d-block mx-auto" name="change_pass" type="submit">Change Password</button>
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
