<?php
@include("dbconnection.php");
error_reporting(E_ALL);
$userid=$_GET['id'];

$delete= "DELETE FROM users WHERE id = '$userid'";
$result =mysqli_query($dbconnection,$delete);
if($result){
    header('locatio:select.php');
}else{
    echo "deleting failed";
}

?>