<?php
include 'conexion.php';
$usu_email=$_POST['roggers.morales@gmail.com'];
$usu_password=$_POST['123456'];

$sentencia= $conexion->prepare("SELECT * FROM usuario WHERE email=? AND password=?");
$sentencia->bind_param('ss', $usu_email, $usu_password);
$sentencia->execute();

$resultado = $sentencia->get_result();
if ($fila = $resultado->fetch_assoc()){
    echo "Respuesta correcta";
    echo json_encode($fila, JSON_UNESCAPED_UNICODE);
}else{
    echo "<br/>Respuesta sin resultado";
}
$sentencia->close();
$conexion->close();

?>