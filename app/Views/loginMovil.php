<?php
include('functions.php');

$email = filter_input(INPUT_POST, "email");
$password = filter_input(INPUT_POST, "password");
$rol = "47174";

$sql = "SELECT email, password, rol FROM usuario WHERE (email='.$email.' and password='.$password.' and rol_id_rol='.$rol.')";
//$sql2 = "SELECT * FROM `usuario` WHERE 1";

$result = ejecutarSQLCommand($sql);
echo $result;

//if ($data = mysqli_fetch_array($result)){
  //  echo "1";
//}

?>