<?php

@include("connection.php");
$select = "SELECT * FROM doctors WHERE status ='Pendding' ORDER BY data_reg ASC";
$result = mysqli_query($connection,$select);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <table class="table-bordered">
        <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Surname</th>
            <th>Username</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>Country</th>
            <th>Date Registered</th>
            <th>Action</th>
        </tr>

        <?php while($row = mysqli_fetch_array($result)){?>
           
            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['firstname'];?></td>
                <td><?php echo $row['surname'];?></td>
                <td><?php echo $row['username'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['gender'];?></td>
                <td><?php echo $row['phone'];?></td>
                <td><?php echo $row['country'];?></td>
                <td><?php echo $row['data_reg'];?></td>
                <td>
                    <div class="row">
                        <div class="col-md-6">
                        <button class="btn btn-success approve"><?php echo  "Approve" .$row['id']?></button>
                        </div>
                        <div class="col-md-6">
                        <button class="btn btn-danger reject"><?php echo $row['id']?>Reject</button>
                        </div>

                    </div>
                  
                </td>
            </tr>
         
        <?php } ?>
    </table>
</body>
</html>