<?php
include('functions.php');
//$tipo = $_GET['txtTi'];
$array = array();
if($resultset=getSQLResultSet(
    "SELECT MONTHNAME(fecha_pedido), SUM(valor_total) 
                FROM pedido
                GROUP BY YEAR(fecha_pedido), 
                MONTH(fecha_pedido)")){

    while ($row = $resultset->fetch_array(MYSQLI_NUM)){
        $e = array();
        $e['MONTHNAME(fecha_pedido)'] = $row[0];
        $e['SUM(valor_total)'] = $row[1];
        array_push($array,$e);
    }
    echo json_encode($array);
}
?>