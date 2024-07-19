<?php
@include("connection.php");
$id = $_POST['id'];

$update ="UPDATE doctors SET status='Rejected' WHERE id='$id'";
$result = mysqli_query($connection,$update);


?>