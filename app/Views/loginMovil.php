<?php
include('functions.php');

$email = filter_input(INPUT_POST, "email");
$password = filter_input(INPUT_POST, "password");
$rol = "47374";

$sql = "SELECT email, password, rol FROM usuario WHERE (email='$email' and password='$password' and rol_id_rol='$rol')";

$result = ejecutarSQLCommand($sql);
$count = mysqli_num_rows($result);

if($count == 1){
    echo '1';
}else{
    echo '0';
}
?>