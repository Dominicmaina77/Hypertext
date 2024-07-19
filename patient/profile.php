<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Profile</title>
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
            $patient= $_SESSION['patient'];
            $select = "SELECT * FROM patient WHERE username='$patient'";
            $result = mysqli_query($connection,$select);
            $row = mysqli_fetch_array($result);
            ?>
            </div>
            <div class="col-lg-10">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php
                                if(isset($_POST['upload'])){
                                    $img =$_FILES['img']['name'];
                                    if(isset($img)){

                                    }else{
                                        $query = "UPDATE patient SET profile='$img' WHERE username='$patient'";
                                        $result = mysqli_query($connection,$query);
                                        if($result){
                                            move_uploaded_file($_FILES['img']['tmp_name'],"img/$img");
                                        }
                                    }
                                }
                            ?>
                            <h5>My Profile</h5>
                            <form action="" method="post" enctype="multipart/form-data">
                                <?php
                                echo "<img src='hmimages/".$row['profile']. "alt='' class='col-lg-12' style='height: 250px;'>";
                                ?>
                                <input type="file" class="form-control my-2" name="img">
                                <button class="btn btn-info" type="submit" name="upload">Update Profile</button>
                            </form>
                            <table class="table-bordered">
                                <tr>
                                    <th class="text-center">My details</th>
                                </tr>
                                <tr>
                                    <td>firstname</td>
                                    <td><?php echo $row['firstname']; ?></td>
                                </tr>
                                <tr>
                                    <td>surname</td>
                                    <td><?php echo $row['surname']; ?></td>
                                </tr>
                                <tr>
                                    <td>username</td>
                                    <td><?php echo $row['username']; ?></td>
                                </tr>
                                <tr>
                                    <td>email</td>
                                    <td><?php echo $row['email']; ?></td>
                                </tr>
                                <tr>
                                    <td>phone number</td>
                                    <td><?php echo $row['phonenumber']; ?></td>
                                </tr>
                                <tr>
                                    <td>gender</td>
                                    <td><?php echo $row['gender']; ?></td>
                                </tr>
                                <tr>
                                    <td>country</td>
                                    <td><?php echo $row['country']; ?></td>
                                </tr>
                                

                            </table>
                        </div>
                        <div class="col-lg-6">
                            <h5 class="text-center">Change username</h5>
                            <?php
                              if(isset($_POST['update'])){
                                $username = $_POST['uname'];

                                if(empty($username)){

                              }else{
                                $update = "UPDATE patient SET username='$username' WHERE username='$patient'";
                                $result = mysqli_query($connection,$update);
                                if($result){
                                    $_SESSION['patient'] = $username;
                                }
                              } 
                            }
                            ?>
                            <form action="" method="post">
                                <label for="" class="formlabel">Enter username</label>
                                <br>
                                <input type="text" class="form-control" name="uname" placeholder="enter username">
                                <br>
                                <button class="btn btn-info my-2" type="submit" name="update">Update username</button>

                            </form>
                            <?php
                             if(isset($_POST['change'])){
                                $old = $_POST['old_pass'];
                                $new = $_POST['new_pass'];
                                $confirm = $_POST['con_pass'];
                                $select= "SELECT * FROM patient WHERE username ='$patient'";
                                $query = mysqli_query($connection,$select);
                                $row = mysqli_fetch_array($query);

                                if(empty($old)){
                                    echo "<script>alert('Enter new password ')</script>";
                                }else if(empty($new)){
                                    echo "<script>alert('Enter old password ')</script>";
                                }else if($confirm != $new){
                                    echo "<script>alert('Both passwords don't match ')</script>";    
                                }else if($old != $row['password']){
                                    echo "<script>alert('Check the password')</script>";
                                }else{
                                    $update ="UPDATE patient SET password='$new' WHERE username='$patient'";
                                     $result = mysqli_query($connection,$update);
                                }


                             }
                           ?>
                            
                            <h5 class="text-center my-4">Change password</h5>
                            <form action="" method="post">
                                <label for="" class="form-label">Old password</label>
                                <br>
                                <input type="password" class="form-control" name="old_pass" placeholder="enter old password">
                                <br>
                                <label for="" class="form-label">New password</label>
                                <br>
                                <input type="password" class="form-control" name="new_pass" placeholder="enter new password">
                                <br>
                                <label for="" class="form-label">Confirm password</label>
                                <br>
                                <input type="password" class="form-control" name="con_pass" placeholder="enter confirm password">
                                <br>
                                <button class="btn btn-info" type="submit" name="change">Change password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </div>
    
</body>
</html>