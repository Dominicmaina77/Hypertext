<?php
@include("header.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="col-md-12">
            <div class="row my-5 ">
                <div class="col-md-4 shadow mx-1">
                    <img src="../hmimages/info.jpg" alt="" style="width: 100%;" class="my-1">
                    <h5 class="text-center">Create account so we can take care of you</h5>
                    <a href="account.php">
                        <button class="btn btn-success my-3" style="margin-left: 30%;">Create Account</button>
                    </a>
                </div>
                <div class="col-md-4 shadow mx-1">
                    <img src="../hmimages/patient.jpg" alt="" class="w-100%">
                    <h5 class="text-center">We are employing doctors</h5>
                    <a href="">
                        <button class="btn btn-success my-5" style="margin-left: 30%;">Apply now</button>
                    </a>
                </div>
                <div class="col-md-4 shadow mx-1">
                    <img src="../hmimages/doctor.jpg" alt="" class="w-50%">
                </div>
            </div>
        </div>
    </div>


</body>

</html>