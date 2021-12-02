<?php

include 'conexion.php';
include 'functions.php';


$usu_email = $_POST['cristofer.sepulveda02@gmail.com'];
$usu_password = $_POST['Animexdotaku15'];

//$usu_email = "cristofer.sepulveda02@gmail.com";
//$usu_password = "Animexdotaku15";

$sentencia =  $conexion->prepare("
    SELECT * FROM usuario WHERE email=? AND password=?");
$sentencia->bind_param('ss', $usu_email, $usu_password);
$sentencia->execute();

$resultado = $sentencia->get_result();
if ($fila = $resultado->fetch_assoc()){
    echo json_encode($fila, JSON_UNESCAPED_UNICODE);
}
$sentencia->close();
$conexion->close();

//$array = array();
// Esta linea ingresa directamente lo que obtiene por POST, pero en esta caso estan directamente puestos
/*if($resultset=getSQLResultSet("SELECT * FROM usuario WHERE email=? AND password=?")){*/
//if($resultset=getSQLResultSet("SELECT * FROM usuario WHERE email='repartidor@gmail.com' AND password='asd123'")){
//$query = "SELECT * FROM usuario WHERE email="+ $usu_email +" AND password="+ $usu_password;
/*
if($resultset=getSQLResultSet("SELECT * FROM usuario WHERE email=".$email." AND password=".$pass)){



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
    echo $usu_email;
    echo $usu_password;
    echo json_encode($array);
}*/

?>