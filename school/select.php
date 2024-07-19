


<?php
@include("connection.php");

$select= "SELECT * FROM students";

$result= mysqli_query($connection,$select);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <table border=" coral solid 1px">
  <tr >
    <th>Name</th>
    <th>email</th>
    <th>password</th>
    <th>number</th>
    <th>action</th>
  </tr>
  <?php while($row = mysqli_fetch_array($result)){?>
  <tr >
    <td><?php echo $row['username'];?></td>
    <td><?php echo $row['email'];?></td>
    <td><?php echo $row['password'];?></td>
    <td><?php echo $row['phonenumber'];?></td>
    <td>
      <?php 
      echo '<a href="update.php?id='.$row['id'].'">Update</a>';
      echo '<a href="delete.php?id='.$row['id'].'">Delete</a>';
      
      ?>
    </td>
  </tr>
  <?php } ?>
        
   </table>
    
</body>
<style>
    table{
        width: 20vh;
    }
    #tr1{
        background-color: chartreuse;
        font-size: 20px;
        font-weight: bold;
        color: black;
    }
</style>
</html>