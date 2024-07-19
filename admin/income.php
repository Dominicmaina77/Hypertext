<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Icnome</title>
</head>

<body>
    <?php
    @include("connection.php");
    @include("header.php");
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
                    <h5 class="text-center my-2">Total Income</h5>
                    <?php
                    $select = "SELECT * FROM income";
                    $result = mysqli_query($connection, $select);
                    ?>
                    <table class="table table-bordered">
                        <tr>
                            <td>ID</td>
                            <td>Doctor</td>
                            <td>Patient</td>
                            <td>Date discharge </td>
                            <td>Amount Paid</td>
                        </tr>
                        <?php while ($row = mysqli_fetch_array($result)) {
                            
                       ?>
                       <tr>
                        <tr><?php
                        if (mysqli_num_rows($result) < 1){
                            echo "No Patient discharge";
                        };
                        ?></tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['doctor']; ?></td>
                        <td><?php echo $row['patient']; ?></td>
                        <td><?php echo $row['date_discharge']; ?></td>
                        <td><?php echo $row['amount_paid']; ?></td>
                       </tr>
                       <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>