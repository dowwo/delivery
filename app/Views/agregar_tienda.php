<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <title>Agregar tienda</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-6">
            <h1>Agregar tienda</h1>
            <?php if(isset($validation)):?>
                <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
            <?php endif;?>
            <form action="/TiendaController/guardar_tienda" method="post">
                <div class="mb-3">
                    <label for="InputForName" class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="InputForNombre" value="2222">
                </div>
                <div class="mb-3">
                    <label for="InputFechaRegistro" class="form-label" name="fecha_registro">Fecha registro: <?php echo @date('d-m-Y'); ?></label>
                </div>
                <div class="mb-3">
                    <label for="InputForTipo" class="form-label">Tipo de tienda</label>
                    <select id="rol" class="form-select" aria-label="Default select example" name="tipo_tienda">
                        <option selected>Seleccionar tipo de tienda</option>
                        <option value="99999">prueba</option>
                        <option value="100000">prueba2</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="InputForComuna" class="form-label">Comuna</label>
                    <select id="rol" class="form-select" aria-label="Default select example" name="comuna">
                        <option selected>Seleccionar comuna</option>
                        <option value="99999">prueba</option>
                        <option value="0">prueba1</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Guardar tienda</button>
            </form>
        </div>
    </div>
</div>

<!-- Popper.js first, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>