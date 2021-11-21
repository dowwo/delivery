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
        $e['p.usuario_id_usuario'] = $row[1];
        $e['t.nombre_tienda'] = $row[2];
        $e['pr.nombre_producto'] = $row[3];
        $e['p.cantidad'] = $row[4];
        $e['p.direccion_destino'] = $row[5];
        $e['p.fecha_pedido'] = $row[6];
        $e['p.valor_total'] = $row[7];
        $e['p.estado_id_estado'] = $row[8];
        $e['p.fecha_modificacion'] = $row[9];
        array_push($array,$e);
    }
    echo json_encode($array);
}
?>


