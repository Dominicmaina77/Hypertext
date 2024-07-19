<?php
@include("connection.php");
$userid =$_GET['id'];

$delete= "DELETE FROM users WHERE id = '$userid'";
$result = mysqli_query($connection,$delete);
if($result){
    header('location:user.php');
}else{
    echo "deleting failed";
}
?>