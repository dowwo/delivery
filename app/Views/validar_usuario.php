
<?php

include 'conexion.php';
$usu_email=$_POST['email'];
$usu_password=$_POST['password'];



$sentencia=$conexion->prepare("SELECT * FROM usuario WHERE email=? AND password=?");
$sentencia->bind_param('ss', $usu_usuario, $usu_password);
$sentencia->execute();

$resultado = $sentencia->get_result();
if ($fila = $resultado->fetch_assoc()) {
    echo json_encode($fila,JSON_UNESCAPED_UNICODE);
}
$sentencia->close();
$conexion->close();
?>
