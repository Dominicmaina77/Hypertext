<?php
@include("header.php");
@include("../include/connection.php");
error_reporting(E_ALL);
// @include("delete.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                  <?php
                  @include("sidenav.php");
                  ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-centre">All Admin</h5>
                                <?php
                                $ad =$_SESSION['admin'];
                                $query = "SELECT * FROM admin WHERE username !='$ad'";
                                $result = mysqli_query($connection,$query);
                                if(mysqli_num_rows($result)<1){
                                    echo "No admin found";
                                }
                               
                                 
                               
                                ?>
                               

                                <table class="table-bordered" style="width: 20px;">
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php while($row=mysqli_fetch_array($result)){?>
                                    <tr >
                                        <td ><?php echo $row['id'];?></td>
                                        <td ><?php echo $row['username'];?></td>
                                        <td>
                                            <?php 
                                        echo '<a href="delete.php?id='.$row['id'].'" class="btn btn-danger mx-5">remove</a>';
                                        ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </table>
                               
                               
                                    
                                  
                            </div>
                            <div class="col-md-6">
                                <?php
                                if(isset($_POST['add'])){
                                    $username=$_POST['uname'];
                                    $password=$_POST['pass'];
                                    $image=$_FILES['img']['name'];

                                    $error =array();
                                    if(empty($username)){
                                        $error['u'] = "Enter Admin username";
                                    }else if(empty($password)){
                                        $error['u'] = "Enter Admin password";
                                    }else if(empty($image)){
                                        $error['u'] = "Enter Admin image";
                                    }

                                    if(count($error)==0){
                                        $insert="INSERT INTO admin(username,password,profile) VALUES('$username','$password','$image')";
                                        $result = mysqli_query($connection, $insert);

                                        if($result){
                                            move_uploaded_file($_FILES['img']['tmp_name'],"img/$image");
                                        }

                                    }
                                }
                                if(isset($error['u'])){
                                $er =  $error['u']; 
                                $show = "<h5 class='text-centre alert alert-danger'>$er</h5>";                                 
                                }else{
                                    $show ="";
                                }
                                
                                ?>
                                <h5 class="text-centre">Add Admin</h5>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div>
                                        <?php
                                        echo $show;
                                        ?>
                                    </div>
                                    <label for="" class="form-label" >Username</label>
                                    <br>
                                    <input type="text" class="form-control" name="uname">
                                    <br>
                                    <label for="" class="form-label">Password</label>
                                    <br>
                                    <input type="password" class="form-control" name="pass">
                                    <br>
                                    <label for="" class="form-label">Add Admin Picture</label>
                                    <input type="file" class="form-control" name="img">
                                    <br>
                                    <button class="btn btn-info d-block mx-auto text-white" type="submit" name="add" >Add New Admin</button>

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