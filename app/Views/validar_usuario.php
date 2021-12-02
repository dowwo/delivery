<?php

include 'conexion.php';
include 'functions.php';

$usu_email=$_POST['cristofer.sepulveda02@gmail.com'];
$usu_password=$_POST[password_verify('Animexdotaku15')];

$array = array();
// Esta linea ingresa directamente lo que obtiene por POST, pero en esta caso estan directamente puestos
/*if($resultset=getSQLResultSet("SELECT * FROM usuario WHERE email=? AND password=?")){*/
//if($resultset=getSQLResultSet("SELECT * FROM usuario WHERE email='repartidor@gmail.com' AND password='asd123'")){
$query = "SELECT * FROM usuario WHERE email="+ $usu_email +" AND password="+ $usu_password;
//if($resultset=getSQLResultSet("SELECT * FROM usuario WHERE email='repartidor@gmail.com' AND password='asd123'")){
if($resultset=getSQLResultSet($query)){


    while ($row = $resultset->fetch_array(MYSQLI_NUM)){
        $e = array();
        $e['id_usuario'] = $row[0];
        $e['nombre'] = $row[1];
        $e['email'] = $row[2];
        $e['password'] = $row[3];
        array_push($array,$e);
    }
    echo json_encode($array);
}else{
    echo "Ocurrio un problema";
}


?>