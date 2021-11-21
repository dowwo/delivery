<?php
include('functions.php');
//$tipo = $_GET['txtTi'];
$array = array();
if($resultset=getSQLResultSet("SELECT p.id_producto, p.nombre_producto, p.cantidad, p.fecha_agregado, p.valor, t.id_tienda, t.nombre_tienda , c.id_categoria, c.nombre_Categoria FROM producto AS p, tienda AS t, categoria AS c")){

    while ($row = $resultset->fetch_array(MYSQLI_NUM)){
        $e = array();
        $e['id_producto'] = $row[0];
        $e['nombre_producto'] = $row[1];
        $e['cantidad'] = $row[2];
        $e['fecha_agregado'] = $row[3];
        $e['valor'] = $row[4];
        $e['tienda_id_tienda'] = $row[5];
        $e['categoria_id_categoria'] = $row[6];
        array_push($array,$e);
    }
    echo json_encode($array);
}
?>


