<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View patient's details</title>
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
                    <h5 class="text-center my-3">View Patients Details</h5>
                    <?php
                    if(isset($_GET['id'])){
                        $id =$_GET['id'];
                        $query = "SELECT * FROM patient WHERE id ='$id'";
                        $res = mysqli_query($connection,$query);
                        $row = mysqli_fetch_array($res);
                    }
                    
                    ?>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <?php
                                 echo"<img src='../patient/img".$row['profile']."' class='col-lg-12 my-2' height='250px'>";
                                ?>
                                
                                <table class="table table-bordered">
                                    <tr>
                                        <th class="text-center">Details</th>
                                    </tr>
                                    <tr>
                                        <td>Firstname</td>
                                        <td><?php echo $row['firstname'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Surname</td>
                                        <td><?php echo $row['surname'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td><?php echo $row['username'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><?php echo $row['email'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td><?php echo $row['number'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td><?php echo $row['gender'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Country</td>
                                        <td><?php echo $row['country'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Date Registered</td>
                                        <td><?php echo $row['data_reg'];?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>