<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Doctors</title>
</head>

<body>
    <?php
    @include("../include/connection.php");
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
                    <h5 class="text-center">Edit Doctor</h5>
                    <?php
                    if(isset($_GET)){
                        $id =$_GET['id'];

                        $select= "SELECT * FROM doctors WHERE id='$id'";
                        $result= mysqli_query($connection,$select);

                        $row = mysqli_fetch_array($result);
                    }
                    
                    ?>
                    <div class="row">
                        <div class="col-lg-8">
                            <h5 class="text-center">Doctor Details</h5>
                            <h5 class="my-3">ID: <?php echo $row['id']; ?></h5>
                            <h5 class="my-3">Firstname: <?php echo $row['firstname']; ?></h5>
                            <h5 class="my-3">Surname: <?php echo $row['surname']; ?></h5>
                            <h5 class="my-3">Username: <?php echo $row['username']; ?></h5>
                            <h5 class="my-3">Email: <?php echo $row['email']; ?></h5>
                            <h5 class="my-3">Phone: <?php echo $row['phone']; ?></h5>
                            <h5 class="my-3">Gender: <?php echo $row['gender']; ?></h5>
                            <h5 class="my-3">Country: <?php echo $row['country']; ?></h5>
                            <h5 class="my-3">Date Registered: <?php echo $row['data_reg']; ?></h5>
                            <h5 class="my-3">Salary: <?php echo $row['salary']; ?></h5>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="text-center">Update Salary</h5>
                            <?php 
                            if(isset($_POST['update'])){
                                $salary = $_POST['salary'];

                                $update ="UPDATE doctors SET salary='$salary' WHERE id ='$id'";
                                $res = mysqli_query($connection,$update);
                            }
                            ?>
                            <form action="" method="post">
                                <label class="form-label">Enter Doctor's Salary</label>
                                <input type="text" class="form-control" name="salary" placeholder="enter salary" value="<?php echo $row['salary'];?>">
                                <button class="btn btn-info d-block mx-auto" name="update" type="submit">Update salary</button>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>