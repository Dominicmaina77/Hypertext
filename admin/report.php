<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    @include("connection.php");
    @include("header.php");
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
                <h5 class="text-center my-2">Total Report</h5>
                <?php
                $query ="SELECT * FROM report";
                $result = mysqli_query($connection,$query);
                
                ?>
                <table class="table table-bordered">
                    <tr>
                        <td>ID</td>
                        <td>Title</td>
                        <td>Message</td>
                        <td>Username</td>
                        <td>Data send</td>
                    </tr>
                    <?php while($row = mysqli_fetch_array($result)){
                     if(mysqli_num_rows($result) <1){
                        echo "No report found";
                     };
                    ?>
                    <tr>
                        <td><?php echo $row['id'];?></td>
                        <td><?php echo $row['title'];?></td>
                        <td><?php echo $row['message'];?></td>
                        <td><?php echo $row['username'];?></td>
                        <td><?php echo $row['data_send'];?></td>
                    </tr>
                        <?php } ?>
                </table>
            </div>
        </div>
    </div>
   </div>
    
</body>
</html>