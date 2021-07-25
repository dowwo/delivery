<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->

    <title>Modificar Producto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">-->
    <style type="text/css">
        body {
            background-color: #AB3E5B;
        }
        .container {
            max-width: 500px;
        }

        .error {
            display: block;
            padding-top: 5px;
            font-size: 14px;
            color: red;
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
<div class="container mt-5">
    <form method="post" id="add_create" name="add_create" action="<?= site_url('/ProductController/update') ?>">
        <div class="form-group">
            <label for="InputForID" class="form-label">ID</label>
            <input type="text" name="id_producto" class="form-control" value="<?php echo $producto_obj['id_producto']; ?>">
        </div>
        <div>
            <label for="InputForNombre" class="form-label">Nombre actual</label>
            <input type="text" class="form-control" value="<?php echo $producto_obj['nombre']; ?>">
        </div>
        <div>
            <label for="InputForNuevoNombre" class="form-label">Nuevo nombre de producto</label>
            <input type="text" name="nombre" class="form-control">
        </div>
        <div class="mb-3">
            <label for="InputForCantidad" class="form-label">Cantidad</label>
            <input type="text" name="cantidad" class="form-control" id="InputForCantidad">
        </div>
        <div class="mb-3">
            <label for="InputForValor" class="form-label">Valor</label>
            <input type="number" name="valor" class="form-control" id="InputForValor">
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
        </div><!--
        <div class="mb-3">
            <label for="InputForTienda" class="form-label">Tienda</label>
            <select name="tienda" id="tienda" class="form-select" aria-label="Default select example">
                <?php /*
                foreach($tiendas as $tienda)
                {
                    ?>
                    <option value="<?=$tienda['id_tienda']?>"><?=$tienda['nombre']?></option>
                    <?php
                }*/
                ?>
            </select>
        </div>-->
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Guardar</button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
</body>

</html>