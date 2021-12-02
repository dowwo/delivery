<?php
$hostname='valefor.servidoresph.com';
$database='deliver2_bddeliverycl';
$username='deliver2_appmovil';
$password='A7s4D1F8g5';

echo $hostname, $database, $username, $password;

$conexion= new mysqli($hostname, $username, $password, $database);
if ($conexion->connect_errno){
    echo "El sitio web esta experimentando problemas";
}else{
    //echo "Conexion correcta";
}


?>

