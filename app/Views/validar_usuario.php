<?php
use CodeIgniter\Controller;
use App\Models\UserModel;

include 'conexion.php';
include 'functions.php';

$email = 'cristofer.sepulveda02@gmail.com';
$data = $model->where('email', $email)->first();
$pass = password_verify('Animexdotaku15', $data);

echo $email;
echo $pass;



$usu_email=$_GET['cristofer.sepulveda02@gmail.com'];
$usu_password=$_GET[password_hash('Animexdotaku15', PASSWORD_DEFAULT)];

$array = array();
// Esta linea ingresa directamente lo que obtiene por POST, pero en esta caso estan directamente puestos
/*if($resultset=getSQLResultSet("SELECT * FROM usuario WHERE email=? AND password=?")){*/
//if($resultset=getSQLResultSet("SELECT * FROM usuario WHERE email='repartidor@gmail.com' AND password='asd123'")){
//$query = "SELECT * FROM usuario WHERE email="+ $usu_email +" AND password="+ $usu_password;
if($resultset=ejecutarSQLCommand("SELECT * FROM usuario WHERE email=".$email." AND password=".$pass)){



    while ($row = $resultset->fetch_array(MYSQLI_NUM)){
        $e = array();
        $e['id_usuario'] = $row[0];
        $e['nombre'] = $row[1];
        $e['email'] = $row[2];
        $e['password'] = $row[3];
        array_push($array,$e);
    }
    echo json_encode($array);
}else{
    echo "Ocurrio un problema";
    echo $usu_email;
    echo $usu_password;
    echo json_encode($array);
}

?>