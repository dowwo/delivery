<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <title>Agregar tienda</title>
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

<?php
if(isset($_SESSION['msg'])){
    echo $_SESSION['id_usuario'];
}
?>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-6">
            <h1>Agregar tienda</h1>
            <?php if(isset($validation)):?>
                <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
            <?php endif;?>
            <form action="/TiendaController/guardar" method="post">
                <div class="mb-3">
                    <label for="InputForName" class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="InputForNombre">
                </div>
                <div class="mb-3">
                    <label for="InputFechaRegistro" class="form-label" name="fecha_registro">Fecha registro: <?php echo @date('d-m-Y'); ?></label>
                </div>
                <div>
                    <label for="InputUsuario" class="form-label">Usuario</label>
                    <input type="text" name="usuario" class="form-control" id="InputUsuario" value="<?php echo $_SESSION['id_usuario'] ?>">
                </div>
                <!--
                <div class="mb-3">
                    <label for="InputForTipo" class="form-label">Tipo de tienda</label>
                    <select id="tipo" class="form-select" aria-label="Default select example">
                        <option value="99999">prueba</option>
                        <option value="100000">prueba2</option>
                    </select>
                </div>-->
                <div class="mb-3">
                    <label for="InputForComuna" class="form-label">Comuna</label>
                    <select id="id_comuna" name="comuna" class="form-select" aria-label="Default select example">
                        <?php
                            foreach($comunas as $comuna) {
                            echo '<option value="' . $comuna->id_comuna . '">' . $comuna->nombre . '</option>';
                            }
                        ?>
                    </select>
                    <select name="comuna">
                        <?php
                        foreach($comunas as $comuna)
                        {
                            ?>
                            <option value="<?=$comuna['id_comuna']?>"><?=$comuna['nombre']?></option>
                            <?php
                        }
                        ?>
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