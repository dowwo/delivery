<?php

include 'conexion.php';

$array = array();
$usuario_id_usuario=$_POST['usuario_id_usuario'];

//$usuario_id_usuario=18;

$sentencia=$conexion->prepare("SELECT * FROM pedido WHERE usuario_id_usuario=?");
$sentencia->bind_param('s', $usuario_id_usuario);
$sentencia->execute();

$resultado1 = $sentencia->get_result();
if ($resultado1 = $sentencia->get_result()){
    while ($row = $resultado1->fetch_array(MYSQLI_NUM)){
        $e = array();
        $e['id_pedido'] = $row[0];
        $e['usuario_id_usuario'] = $row[1];
        $e['tienda_id_tienda'] = $row[2];
        $e['producto_id_producto'] = $row[3];
        $e['cantidad'] = $row[4];
        $e['direccion_destino'] = $row[5];
        $e['latitud'] = $row[6];
        $e['longitud'] = $row[7];
        $e['fecha_pedido'] = $row[8];
        $e['valor_total'] = $row[9];
        $e['estado_id_estado'] = $row[10];
        $e['fecha_modificacion'] = $row[11];
        array_push($array,$e);
    }
    echo json_encode($array);
}
$sentencia->close();
$conexion->close();

?>


