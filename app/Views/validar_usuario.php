<?php

include 'conexion.php';
include 'functions.php';

$usu_email=$_POST['repartidor@gmail.com'];
$usu_password=$_POST['asd123'];

$array = array();
// Esta linea ingresa directamente lo que obtiene por POST, pero en esta caso estan directamente puestos
/*if($resultset=getSQLResultSet("SELECT * FROM usuario WHERE email=? AND password=?")){*/
//if($resultset=getSQLResultSet("SELECT * FROM usuario WHERE email='repartidor@gmail.com' AND password='asd123'")){
if($resultset=getSQLResultSet("SELECT * FROM usuario WHERE email="+$usu_email+" AND password="+$usu_password+"")){
    }

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