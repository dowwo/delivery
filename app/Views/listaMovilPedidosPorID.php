<?php
include('functions.php');
//$tipo = $_GET['txtTi'];
$array = array();
//if($resultset=getSQLResultSet("SELECT * FROM producto, tienda, categoria WHERE tienda_id_tienda = tienda.id_tienda AND categoria_id_categoria= categoria.id_categoria")){
if($resultset=getSQLResultSet("
SELECT  id_producto, nombre_producto, cantidad, fecha_agregado, valor, nombre_tienda, nombre_categoria
FROM producto p, tienda t, categoria c 
WHERE p.tienda_id_tienda = t.id_tienda 
  AND p.categoria_id_categoria= c.id_categoria")){
    while ($row = $resultset->fetch_array(MYSQLI_NUM)){
        $e = array();
        $e['id_producto'] = $row[0];
        $e['nombre_producto'] = $row[1];
        $e['cantidad'] = $row[2];
        $e['fecha_agregado'] = $row[3];
        $e['valor'] = $row[4];
        $e['tienda_id_tienda'] = $row[5];
        $e['categoria_id_categoria'] = $row[6];
        $e['tienda_id_tienda'] = $row[7];
        $e['nombre_tienda'] = $row[8];
        $e['categoria_id_categoria'] = $row[9];
        $e['nombre_categoria'] = $row[10];
        array_push($array,$e);
        // HAY QUE ORDENAR LOS DATOS 
    }
    echo json_encode($array);
}
?>


