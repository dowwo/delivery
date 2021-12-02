<?php
use CodeIgniter\Controller;
use App\Models\UserModel;

include 'conexion.php';
include 'functions.php';
/*
$email = 'cristofer.sepulveda02@gmail.com';
$data = $model->where('email', $email)->first();
$pass = password_verify('Animexdotaku15', $data);

echo $email , $pass;
*/


$usu_email=$_POST['email'];
$usu_password=$_POST['password'];

$array = array();
// Esta linea ingresa directamente lo que obtiene por POST, pero en esta caso estan directamente puestos
/*if($resultset=getSQLResultSet("SELECT * FROM usuario WHERE email=? AND password=?")){*/
//if($resultset=getSQLResultSet("SELECT * FROM usuario WHERE email='repartidor@gmail.com' AND password='asd123'")){
//$query = "SELECT * FROM usuario WHERE email="+ $usu_email +" AND password="+ $usu_password;
//if($resultset=getSQLResultSet("SELECT id_usuario, email, password, rol_id_rol FROM usuario WHERE email='dowwo@gmail.com' AND password='123456'")){

if($resultset=getSQLResultSet("SELECT id_usuario, email, password, rol_id_rol FROM usuario WHERE email=? AND password=?")){



    while ($row = $resultset->fetch_array(MYSQLI_NUM)){
        $e = array();
        $e['id_usuario'] = $row[0];
        $e['email'] = $row[1];
        $e['password'] = $row[2];
        $e['rol_id_rol'] = $row[3];

        array_push($array,$e);
    }
    echo json_encode($array);
}

/*
$sentencia = $conexion->prepare("SELECT * FROM usuario WHERE email=? AND password=?");
$sentencia->bind_param('ss',$usu_email, $usu_password);
$sentencia->execute();

$resultado = $sentencia->get_result();
if ($fila = $resultado->fetch_assoc()){
    echo json_encode($fila, JSON_UNESCAPED_UNICODE);
}
$sentencia->close();
$conexion->close();
*/
?>