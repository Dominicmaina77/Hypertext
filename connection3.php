<?php

$connection =mysqli_connect("localhost","root","","practice");

if(!$connection){
    echo "error connecting";

}else{
    echo "connection successful";
}
?>