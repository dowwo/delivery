<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <title>Registro</title>
    <style type="text/css">
        body {
            background-color: rgba(0, 50, 100, 0.5);
        }
    </style>
</head>
<body id="navbar_distance">
<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Bienvenido <?php echo $_SESSION['nombre'] ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="dashboard1">INICIO <span class="sr-only">(current)</span></a>
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
            <h1>Sign Up</h1>
            <?php if(isset($validation)):?>
                <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
            <?php endif;?>
            <form action="/register/save" method="post">

                <div class="mb-3">
                    <label for="InputForName" class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="InputForNombre" value="<?= set_value('nombre') ?>">
                </div>
                <div class="mb-3">
                    <label for="InputForName" class="form-label">Apellido Paterno</label>
                    <input type="text" name="apellido_p" class="form-control" id="InputForApellidoPaterno" value="<?= set_value('apellido_p') ?>">
                </div>
                <div class="mb-3">
                    <label for="InputForName" class="form-label">Apellido Materno</label>
                    <input type="text" name="apellido_m" class="form-control" id="InputForApellidoMaterno" value="<?= set_value('apellido_m') ?>">
                </div>
                <div class="mb-3">
                    <label for="InputFechaRegistro" class="form-label" name="fecha_registro">Fecha de registro: <?php echo @date('d-m-Y'); ?></label>
                </div>
                <div class="mb-3">
                    <label for="InputForEmail" class="form-label">Correo electrónico</label>
                    <input type="email" name="email" class="form-control" id="InputForEmail" value="<?= set_value('email') ?>">
                </div>
                <div class="mb-3">
                    <label for="InputForPassword" class="form-label">Contraseña</label>
                    <input type="password" name="password" class="form-control" id="InputForPassword">
                </div>
                <div class="mb-3">
                    <label for="InputForConfPassword" class="form-label">Confirmar Contraseña</label>
                    <input type="password" name="confpassword" class="form-control" id="InputForConfPassword">
                </div>
                <div class="mb-3">
                    <label for="InputForTipo" class="form-label">Seleccionar tipo de usuario</label>
                    <select id="rol_id_rol" class="form-select" aria-label="Default select example">
                        <option value="47474">Usuario</option>
                        <option value="47274">Vendedor</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</div>

<!-- Popper.js first, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>