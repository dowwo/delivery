<?php
include('functions.php');
//$tipo = $_GET['txtTi'];
$array = array();
if($resultset=getSQLResultSet("SELECT id_producto, nombre_producto, cantidad, fecha_agregado, valor, tienda_id_tienda, categoria_id_categoria 
FROM producto, tienda, categoria")){

    while ($row = $resultset->fetch_array(MYSQLI_NUM)){
        $e = array();
        $e['id_producto'] = $row[0];
        $e['nombre_producto'] = $row[1];
        $e['cantidad'] = $row[2];
        $e['fecha_agregado'] = $row[3];
        $e['valor'] = $row[4];
        $e['nombre_tienda'] = $row[5];
        $e['nombre_categoria'] = $row[6];
        array_push($array,$e);
    }
    echo json_encode($array);
}
?>


