<!DOCTYPE html>
<html>

<head>
    <title>Codeigniter 4 Add User With Validation Demo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
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
<div class="container mt-5">
    <form method="post" id="add_create" name="add_create" action="<?= site_url('/ProductController/update') ?>">
        <div class="form-group">
            <label>ID</label>
            <input type="text" name="id_producto" class="form-control" value="<?php echo $producto_obj['id_producto']; ?>">
        </div>
        <div>
            <label>Nombre actual</label>
            <input type="text" class="form-control" value="<?php echo $producto_obj['nombre']; ?>">
        </div>
        <div>
            <label>Nuevo nombre de producto</label>
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
                <?php
                foreach($tiendas as $tienda)
                {
                    ?>
                    <option value="<?=$tienda['id_tienda']?>"><?=$tienda['nombre']?></option>
                    <?php
                }
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