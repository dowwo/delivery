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
            <h1>Agregar producto</h1>
            <?php if(isset($validation)):?>
                <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
            <?php endif;?>
            <form action="/ProductController/guardar" method="post">
                <div class="mb-3">
                    <label for="InputForNombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="InputForNombre">
                </div>
                <div class="mb-3">
                    <label for="InputForCantidad" class="form-label">Cantidad</label>
                    <input type="text" name="cantidad" class="form-control" id="InputForCantidad">
                </div>
                <div class="mb-3">
                    <label for="InputForFecha" class="form-label" name="fecha_agregado">Fecha agregado: <?php echo @date('d-m-Y'); ?></label>
                    <input type="text" class="form-control" id="InputForFecha" value="<?php echo @date('d-m-Y'); ?>" disabled="true" >
                </div>
                <div class="mb-3">
                    <label for="InputForValor" class="form-label">Valor</label>
                    <input type="number" name="valor" class="form-control" id="InputForValor">
                </div>
                <div class="mb-3">
                    <label for="InputForTienda" class="form-label">Tienda</label>
                    <select name="tienda" id="tienda" class="form-select" aria-label="Default select example">
                        <?php
                        foreach($tiendas as $tienda)
                        {
                            ?>
                            <option value="<?=$tienda['id_tienda']?>"><?=$tienda['nombre']?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="InputForCategoria" class="form-label">Categoría</label>
                    <select name="categoria" id="categoria" class="form-select" aria-label="Default select example">
                        <?php
                        foreach($categorias as $categoria)
                        {
                            ?>
                            <option value="<?=$categoria['id_categoria']?>"><?=$categoria['categoria']?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Guardar producto</button>
            </form>
        </div>

    </div>

</div>

<?php
if(isset($_SESSION['msg'])){
    echo $_SESSION['id_usuario'];
}
?>

<!-- Popper.js first, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

<!-- Start of HubSpot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js-eu1.hs-scripts.com/25266980.js"></script>
<!-- End of HubSpot Embed Code -->
</body>
</html>