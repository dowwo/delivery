<?php
include('functions.php');
//$tipo = $_GET['txtTi'];
$array = array();
if($resultset=getSQLResultSet("SELECT * FROM producto")){

    while ($row = $resultset->fetch_array(MYSQLI_NUM)){
        $e = array();
        $e['id_pedido'] = $row[0];
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


