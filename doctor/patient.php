<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Patient</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
                <h5 class="text-center my-3">Total Patients</h5>
                <?php
                
                $select ="SELECT * FROM patients";
                $result = mysqli_query($connection,$select);
                if($result){
                    echo "connected";
                }else{
                    echo "not connected";
                }               
                ?>
                <table class="table table-bordered">
                    
                    <tr>
                        <td>ID</td>
                        <td>Firstname</td>
                        <td>Surname</td>
                        <td>Username</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Gender</td>
                        <td>Country</td>
                        <td>Data Reg.</td>
                    </tr>
                    <?php while($row = mysqli_fetch_array($result)){ 
                        if(mysqli_num_rows($result)<1);
                        ?>
                      <tr>
                        <td><?php echo $row['id'] ;?></td>
                        <td><?php echo $row['firstname'] ;?></td>
                        <td><?php echo $row['surname'] ;?></td>
                        <td><?php echo $row['username'] ;?></td>
                        <td><?php echo $row['email'] ;?></td>
                        <td><?php echo $row['phone'] ;?></td>
                        <td><?php echo $row['gender'] ;?></td>
                        <td><?php echo $row['country'] ;?></td>
                        <td><?php echo $row['data_reg'] ;?></td>
                        <td>
                            <a href="view.php?id='.$row['id'].'">
                                <button class="btn btn-info d-block mx-auto">View</button>
                            </a>
                        </td>
                       
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
   </div>
    
</body>
</html>