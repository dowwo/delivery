<?php


include 'functions.php';

$usu_email=$_POST['repartidor@gmail.com'];
$usu_password=$_POST['asd123'];

$array = array();

$sentencia= "SELECT * FROM usuario WHERE email=? AND password=?";
$sentencia->bind_param('ss', $usu_email, $usu_password);
if($resultset=getSQLResultSet($sentencia)){

    while ($row = $resultset->fetch_array(MYSQLI_NUM)){
        $e = array();
        $e['id_usuario'] = $row[0];
        $e['nombre'] = $row[1];
        $e['email'] = $row[2];
        $e['password'] = $row[3];
        array_push($array,$e);
    }
    echo json_encode($array);
}






?>