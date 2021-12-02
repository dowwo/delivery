<?php

include 'conexion.php';

$usu_email=$_POST['email'];
$usu_password=$_POST['password'];

$array = array();
/*
if($resultset=getSQLResultSet("SELECT id_usuario, email, password, rol_id_rol FROM usuario WHERE email=? AND password=?")){



    while ($row = $resultset->fetch_array(MYSQLI_NUM)){
        $e = array();
        $e['id_usuario'] = $row[0];
        $e['email'] = $row[1];
        $e['password'] = $row[2];
        $e['rol_id_rol'] = $row[3];

        array_push($array,$e);
    }
    echo json_encode($array);
}

*/
$sentencia = $conexion->prepare("SELECT * FROM usuario WHERE email=? AND password=?");
$sentencia->bind_param('ss',$usu_email, $usu_password);
$sentencia->execute();

$resultado = $sentencia->get_result();
if ($fila = $resultado->fetch_assoc()){
    echo json_encode($fila, JSON_UNESCAPED_UNICODE);
}
$sentencia->close();
$conexion->close();

?>