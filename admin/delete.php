<?php
@include("../include/connection.php");
$id=$_GET['id'];
echo $id;

$delete= "DELETE FROM admin WHERE id = '$id'";
$query = mysqli_query($connection,$delete);
if($query){
     header("location:admin.php");
 }else{
    echo "deletion failed";
    echo $id;
    
 }
     
?>