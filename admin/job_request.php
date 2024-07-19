<?php
session_start();
if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = $_GET['type'];
    if ($type == 'status') {
      $operation = $_GET['operation'];
      $id = $_GET['id'];
      if ($operation == 'active') {
        $status = '1';
      } else {
        $status = '0';
      }
      $update_status_sql = "update transactions set status='$status' where id='$id'";
      mysqli_query($conn, $update_status_sql);
      header('location:transactions.php');
    }
  
    if ($type == 'delete') {
      $id = $_GET['id'];
      $delete_sql = "delete from transactions where id='$id'";
      mysqli_query($conn, $delete_sql);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Request</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <?php
    @include("../include/header.php");
    @include("connection.php");
    
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                   <?php
                   @include("sidenav.php");
                   ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-center">Job Request</h5>
                    <div id="show"></div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $show();
            function show(){
               $.ajax({
                url:"ajax_job_request.php",
                method:"POST",
                success:function(data){
                    $("#show").html(data);
                    
                }
               });
            }
            $(document) .on('click', '.approve', function(){
                var id = $(this).attr('id');
                $.ajax({
                    url:"ajax_approve.php",
                    method:"POST",
                    data:{id:id},
                    success:function(data){
                        $("#show").html(data);
                    }
                });
            });
            $(document) .on('click', '.reject', function(){
                var id = $(this).attr('id');
                $.ajax({
                    url:"ajax_reject.php",
                    method:"POST",
                    data:{id:id},
                    success:function(data){
                        $("#show").html(data);
                    }
                });
            });
        });
    </script>
    
</body>
<style>
   
</style>
</html>