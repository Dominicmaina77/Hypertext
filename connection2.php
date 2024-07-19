<?php
$connection = mysqli_connect("localhost","root","","register");

if($connection){
    echo "connection successful";
}else{
    echo "connection failed";
}