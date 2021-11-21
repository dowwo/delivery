<?php
include('functions.php');
//$tipo = $_GET['txtTi'];
$array = array();
if($resultset=getSQLResultSet("SELECT p.id_pedido, p.usuario_id_usuario, t.nombre_tienda, pr.nombre_producto, p.cantidad, p.direccion_destino,
       p.fecha_pedido, p.valor_total, p.estado_id_estado, p.fecha_modificacion
FROM pedido p, tienda t, producto pr")){

    while ($row = $resultset->fetch_array(MYSQLI_NUM)){
        $e = array();
        $e['p.id_pedido'] = $row[0];
        $e['usuario_id_usuario'] = $row[1];
        $e['nombre_tienda'] = $row[2];
        $e['nombre_producto'] = $row[3];
        $e['cantidad'] = $row[4];
        $e['direccion_destino'] = $row[5];
        $e['fecha_pedido'] = $row[6];
        $e['valor_total'] = $row[7];
        $e['estado_id_estado'] = $row[8];
        $e['fecha_modificacion'] = $row[9];
        array_push($array,$e);
    }
    echo json_encode($array);
}
?>


