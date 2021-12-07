
<?php

include 'conexion.php';
$usu_email=$_POST['email'];
$usu_password=$_POST['password'];


$sentencia=$conexion->prepare("SELECT id_usuario, nombre, email, password, rol_id_rol  FROM usuario WHERE email=? AND password=?");
$sentencia->bind_param('ss', $usu_email, $usu_password);
$sentencia->execute();

$resultado = $sentencia->get_result();
if ($fila = $resultado->fetch_assoc()) {
    echo json_encode($fila);
}
$sentencia->close();
$conexion->close();
?>
