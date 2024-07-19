<?php
@include("dbconnection.php");
error_reporting(E_ALL);
$select = "SELECT * FROM users";
$result = mysqli_query($connection,$select);

if ($result){
    echo "user created";
}else{
    echo "user creating failed";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</head>
<body>
    <table>
        <tr class="head">
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Phonenumber</th>
            <th>action</th>
        </tr>
        <?php while($row =mysqli_fetch_array($result)){?>
        <tr>
            <td><?php echo $row['username'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['password'];?></td>
            <td><?php echo $row['phonenumber'];?></td>
            <td>
                <?php
                echo '<a href="update.php?id='.$row['id'].'" >Update</a>';
                echo '<a href="delete.php?id='.$row['id'].'" >Delete</a>';
                
                ?>
            </td>
           
        </tr>
        <?php }?>
    </table>
    
</body>
<style>
    table{
        width: 20vh;
        background-color: burlywood;
        color: gray;
        border: 3px solid gray;
        
    }
    .head{
        font-size: 20px;
        color: chocolate;
    }
</style>
</html>