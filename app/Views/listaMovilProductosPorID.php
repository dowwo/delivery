<?php
//include('functions.php');
//$tipo = $_GET['txtTi'];
//$array = array();
//if($resultset=getSQLResultSet("SELECT * FROM producto, tienda, categoria WHERE tienda_id_tienda = tienda.id_tienda AND categoria_id_categoria= categoria.id_categoria")){
//if($resultset=getSQLResultSet("
//SELECT p.id_producto, p.nombre, p.cantidad, p.fecha_agregado, p.valor, t.nombre, c.categoria
//FROM producto p, tienda t, categoria c
//WHERE t.id_tienda = p.tienda_id_tienda
//  AND c.id_categoria= p.categoria_id_categoria")){
//    while ($row = $resultset->fetch_array(MYSQLI_NUM)){
//        $e = array();
//        $e['id_producto'] = $row[0];
//        $e['nombre_producto'] = $row[1];
//        $e['cantidad'] = $row[2];
//        $e['fecha_agregado'] = $row[3];
//        $e['valor'] = $row[4];
//        $e['tienda'] = $row[5];
//        $e['categoria'] = $row[6];
//        /*$e['tienda_id_tienda'] = $row[7];
//        $e['nombre_tienda'] = $row[8];
//        $e['categoria_id_categoria'] = $row[9];
//        $e['nombre_categoria'] = $row[10];*/
//        array_push($array,$e);
        // HAY QUE ORDENAR LOS DATOS 
//    }
//    echo json_encode($array);
//}

include 'conexion.php';

$array = array();
//$usuario_id_usuario=$_POST['usuario_id_usuario'];

$usuario_id_usuario="4";

$sentencia=$conexion->prepare("SELECT * FROM pedido WHERE usuario_id_usuario=?");
$sentencia->bind_param('ss', $usuario_id_usuario);
$sentencia->execute();

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


