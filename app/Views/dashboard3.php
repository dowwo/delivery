<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ingresar usuario</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Con esta versión de bootstrap funcionan bien las tarjetas, pero la barra de navegacion pierde la configuración-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#users-list').DataTable( {
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "Lo sentimos, no se ha encontrado el registro",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros",

                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "Buscar",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            } )

            ;
        } );
    </script>
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
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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
    echo $_SESSION['msg'];
}
?>
<br>
<div class="container">
    <div class="row">
        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?php echo base_url('images/user_card.jpg') ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Administrar usuarios</h5>
                    <p class="card-text">Visualice las opciones para la administración de los usuarios.</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <!--Redireccionar al módulo de modificación de usuarios-->
                        <a href="lista_usuarios" class="card-link">Ver Usuarios</a>
                    </li>
                    <li class="list-group-item">
                        <!--Redireccionar al registro de usuario-->
                        <a href="registro" class="card-link">Nuevo usuario</a>
                    </li>
                </ul>
                <div class="card-body">


                </div>
            </div>


        </div>
        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?php echo base_url('images/tarjeta_solicitudes.jpg') ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Solicitudes</h5>
                    <p class="card-text">Visualice las opciones para la administración de las solicitudes.</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="agregar_registro" class="card-link">Agregar solicitud</a>
                    </li>
                    <li class="list-group-item">
                        <a href="lista_registros" class="card-link">Ver solicitudes</a>
                    </li>

                </ul>
                <div class="card-body">


                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?php echo base_url('images/tarjeta_registros.jpg') ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Administrar registros</h5>
                    <p class="card-text">Visualice las opciones para la administración de los registros.</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="#" class="card-link">Realizar Seguimiento</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="card-link"></a>
                    </li>
                </ul>
                <div class="card-body">


                </div>
            </div>
        </div>
    </div>
</div>



</body>
</html>
