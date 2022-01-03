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
    <h1>Modificar Categoría</h1>
    <form method="post" id="add_create" name="add_create" action="<?= site_url('/CategoriaController/update') ?>">
        <div class="form-group">
            <label>ID</label>
            <input type="text" name="id_categoria" class="form-control" value="<?php echo $categoria_obj['id_categoria']; ?>">
            <label>Nombre actual</label>
            <input type="text" class="form-control" value="<?php echo $categoria_obj['categoria']; ?>">
            <label>Nuevo nombre de la categoría</label>
            <input type="text" name="categoria" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Update Data</button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>

<!-- Start of HubSpot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js-eu1.hs-scripts.com/25266980.js"></script>
<!-- End of HubSpot Embed Code -->
</body>

</html>