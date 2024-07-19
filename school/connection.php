<?php
$connection= mysqli_connect("localhost","root","","school");
if($connection){
    echo "connected";
}else{
    echo "not connected";
}

?>