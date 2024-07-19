<?php
@include("connection.php");
$id=$_GET['id'];

$delete= "DELETE FROM students WHERE id = '$id'";
$result =mysqli_query($connection,$delete);
if($result){
    header('location:select.php');
}else{
    echo "deleting failed";
}
?>