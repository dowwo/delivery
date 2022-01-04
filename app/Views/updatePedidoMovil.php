<?php

include 'conexion.php';

$id_pedido=$_POST['id_pedido'];
$id_estado=$_POST['estado_id_estado'];


$sentencia=$conexion->prepare("UPDATE `pedido` SET `estado_id_estado` = ? WHERE `pedido`.`id_pedido` = ?");
$sentencia->bind_param('ss', $id_estado,$id_pedido);
$sentencia->execute();
$sentencia=$conexion->prepare("SELECT * FROM pedido WHERE id_pedido = ?");
$sentencia->bind_param('s', $id_pedido);
$sentencia->execute();

$resultado=$sentencia->get_result();
if ($fila = $resultado->fetch_assoc()){
    echo json_encode($fila);
}

$sentencia->close();
$conexion->close();

?>