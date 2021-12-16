<?php
include('functions.php');
//$tipo = $_GET['txtTi'];
$array = array();
if($resultset=getSQLResultSet("SELECT * FROM pedido")){

    while ($row = $resultset->fetch_array(MYSQLI_NUM)){
        $e = array();
        $e['id_pedido'] = $row[0];
        $e['usuario_id_usuario'] = $row[1];
        $e['tienda_id_tienda'] = $row[2];
        $e['descripcion'] = $row[3];
        $e['telefono'] = $row[4];
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
?>


