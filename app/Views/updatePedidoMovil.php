<?php

include 'conexion.php';

$id_pedido=$_POST['id_pedido'];

$sentencia=$conexion->prepare("UPDATE `pedido` SET `estado_id_estado` = '3' WHERE `pedido`.`id_pedido` = ?");
$sentencia->bind_param('s', $id_pedido);
$sentencia->execute();

$resultado=$sentencia->get_result();
if ($fila = $resultado->fetch_assoc()){
    echo json_encode($fila);
}

$sentencia->close();
$conexion->close();

?>