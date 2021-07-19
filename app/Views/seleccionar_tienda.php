<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <title>Agregar Producto</title>
    <style type="text/css">
        body {
            background-color: #AB3E5B;
        }
    </style>

</head>
<body>
<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Bienvenido <?php echo $_SESSION['nombre'] ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="dashboard1">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <!--Botón para cerrar sesión, aplicable en cualquier parte-->
                <a class="btn btn-outline-danger my-2 my-sm-0" href="login/logout">Cerrar sesión</a>
            </form>
        </div>
    </nav>
</div>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-6">
            <h1>Seleccione Tienda</h1>
            <?php if(isset($validation)):?>
                <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
            <?php endif;?>
            <form method="get">
                <select id="list" onchange="getSelectValue();">
                    <?php
                    foreach($tiendas as $tienda)
                    {
                        ?>
                        <option value="<?=$tienda['id_tienda']?>"><?=$tienda['nombre']?></option>
                        <?php
                    } ?>

                </select>
                <input name="tienda" id="tienda" type="text" value="">
                <input type="text" name="subject" id="subject" value="Car Loan">

                <script>

                    function getSelectValue()
                    {
                        var selectedValue = document.getElementById("list").value;
                        console.log(selectedValue);
                        document.getElementById("tienda").value = selectedValue;



                    }
                    getSelectValue();



                </script>

            </form>


        </div>

    </div>

</div>
<?php $_SESSION['id_tienda']=
    '<script>
    function getSelectValue(){
        var selectedValue = document.getElementById("list").value;
        document.write(document.getElementById("list").value;);
        
    print(getSelectValue();)
    </script>'?>
<?php
session_start();

if( isset( $_SESSION['counter'] ) ) {
    $_SESSION['counter'] += 1;
}else {
    $_SESSION['counter'] = 1;
}


$msg = "Visitas ".  $_SESSION['counter'];
$msg .= " ";
?>
<?php  echo ( $msg ); ?>

<?php

if (!isset($_SESSION['id_tienda'])){
    $_SESSION['id_tienda']= 'tienda';
}


?>

<?php echo 'ID Usuario: ',$_SESSION['id_usuario'] ?>
<?php echo 'Nombre usuario: ', $_SESSION['nombre'] ?>
<?php echo 'ID Tienda: ', $_SESSION['id_tienda'] ?>



<!-- Popper.js first, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>