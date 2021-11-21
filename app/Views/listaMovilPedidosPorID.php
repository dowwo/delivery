<?php
include('functions.php');
//$tipo = $_GET['txtTi'];
$array = array();
if($resultset=getSQLResultSet("SELECT * FROM producto, tienda, categoria WHERE tienda_id_tienda = tienda.id_tienda, categoria_id_categoria= categoria.id_categoria")){

    while ($row = $resultset->fetch_array(MYSQLI_NUM)){
        $e = array();
        $e['id_producto'] = $row[0];
        $e['nombre_producto'] = $row[1];
        $e['cantidad'] = $row[2];
        $e['fecha_agregado'] = $row[3];
        $e['valor'] = $row[4];
        $e['tienda_id_tienda'] = $row[5];
        $e['categoria_id_categoria'] = $row[6];
        $e['nombre_tienda'] = $row[7];
        $e['nombre_categoria'] = $row[8];
        array_push($array,$e);
    }
    echo json_encode($array);
}
?>


