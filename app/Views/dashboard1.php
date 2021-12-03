<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../extras/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../extras/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Delivery Chile</title>
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
            background-color: #AB3E5B;
        }
    </style>
</head>
<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="orange">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
      -->
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                CT
            </a>
            <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                Creative Tim
            </a>
        </div>
        <div class="sidebar-wrapper" id="sidebar-wrapper">
            <ul class="nav">
                <li class="active ">
                    <a href="dashboard1.php">
                        <i class="now-ui-icons design_app"></i>
                        <p>Administracion</p>
                    </a>
                </li>
                <li>
                    <a href="icons.html">
                        <i class="now-ui-icons education_atom"></i>
                        <p>Icons</p>
                    </a>
                </li>
                <li>
                    <a href="./map.html">
                        <i class="now-ui-icons location_map-big"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li>
                    <a href="./notifications.html">
                        <i class="now-ui-icons ui-1_bell-53"></i>
                        <p>Notifications</p>
                    </a>
                </li>
                <li>
                    <a href="./user.html">
                        <i class="now-ui-icons users_single-02"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li>
                    <a href="./tables.html">
                        <i class="now-ui-icons design_bullet-list-67"></i>
                        <p>Table List</p>
                    </a>
                </li>
                <li>
                    <a href="./typography.html">
                        <i class="now-ui-icons text_caps-small"></i>
                        <p>Typography</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel" id="main-panel">


<body id="navbar_distance">
<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Bienvenido <?php echo $_SESSION['nombre'] ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <!--
                <li class="nav-item active">
                    <a class="nav-link" href="#">INICIO <span class="sr-only">(current)</span></a>
                </li>
                -->
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
                <a href="dashboard3">
                    <img class="card-img-top" src="<?php echo base_url('images/user_card.jpg') ?>" alt="Card image cap">
                </a>
                <div class="card-body">
                    <h5 class="card-title">Administrador</h5>
                    <p class="card-text">Visualice las opciones para la administración.</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <!--Redireccionar al registro de usuario-->
                        <a href="dashboard3" class="card-link">Dashboard Admin</a>
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
                    <h5 class="card-title">Vendedor</h5>
                    <p class="card-text">Visualice las opciones para vendedor.</p>
                </div>

                <!--AGREGADO SOLO PARA REVISAR EL LISTAR TIENDA-->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <!--Redireccionar al agregar tienda-->
                        <a href="agregar_tienda" class="card-link">Agregar tienda</a>
                    </li>
                    <li class="list-group-item">
                        <!--Redireccionar al listar_tienda-->
                        <a href="lista_tienda" class="card-link">Listar Tienda</a>
                    </li>
                    <!--Redireccionar al agregar producto-->
                    <li class="list-group-item">
                        <a href="agregar_producto" class="card-link">Agregar Producto</a>
                    </li>
                    <li class="list-group-item">
                        <!--Redireccionar al listar_producto-->
                        <a href="lista_productos" class="card-link">Listar Producto</a>
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
                    <h5 class="card-title">Repartidor</h5>
                    <p class="card-text">Visualice las opciones para el repartidor.</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="seleccionar_tienda" class="card-link">Agregar pedidos</a>
                    </li>
                    <li class="list-group-item">
                        <a href="lista_pedidos" class="card-link">Ver todos los pedidos</a>
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
