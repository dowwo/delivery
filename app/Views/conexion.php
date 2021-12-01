<?php
$hostname='';
$database='deliver2_bddeliverycl';
$username='deliver2_dcla';
$password='/-791348265-/';

$conexion= new mysqli($hostname, $username, $password, $database);
if ($conexion->connect_errno){
    echo "El sitio web esta experimentando problemas";
}


?>

