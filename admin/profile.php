<?php
@include("../include/connection.php");
@include("header.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
</head>
<body>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                    @include("sidenav.php");

                    $ad=$_SESSION['admin'];
                    $query ="SELECT * FROM admin WHERE username='$ad'";
                    $result=mysqli_query($connection,$query);
                    while($row = mysqli_fetch_array($result)){
                        $username=$row['username'];
                        $profiles=$row['profile'];
                    }
                   ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h4><?php echo $username ?> Profile</h4>
                                <?php
                                if(isset($_POST['update'])){
                                    $profile = $_FILES['profile']['name'];
                                    if(empty($profile)){
                                    }else{
                                        $query ="UPDATE admin SET profile='$profile' WHERE username= '$ad'";
                                        $result = mysqli_query($connection,$query);
                                        if($result){
                                            move_uploaded_file($_FILES['profile']['tmp_name'],"img/$profile");
                                        }
                                    }


                                }
                                ?>
                                
                                <form action="" method="post" enctype="multipart/form-data">
                                   <?php 
                                     echo "<img src='../hmimages/$profiles' alt='' class='col-md-12' style='height: 250px; width: ;''>";
                                   ?>
                                   <br><br>
                                   <label for="" class="form-label">UPDATE PROFILE</label>
                                   <br>
                                   <input type="file" class="form-control" name="profile">
                                   <br>
                                   <input type="submit" class=" btn btn-success" name="update" value="UPDATE">   
                                </form>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>