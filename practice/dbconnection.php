<?php
$connection= mysqli_connect ("localhost","root","","practice");
if ($connection){
    echo "connection successful";
}else{
    echo "connection failed";
}


?>