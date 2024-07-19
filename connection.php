<?php
$connection = mysqli_connect("localhost","root","","inventory");

if(!$connection){
    echo "connection failed";
}else{
    echo "connection successful";
}
?>