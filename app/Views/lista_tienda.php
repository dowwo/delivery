<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Listar Tiendas</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Con esta versión de bootstrap funcionan bien las tarjetas, pero la barra de navegacion pierde la configuración-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <style type="text/css">
        body {
            background-color: #AB3E5B;
        }
        #lista-tienda {
            background-color: rgba(255, 255, 255, 1);

        }
    </style>
    <!--Este script es para traducir el Datatable -->
    <script>
        $(document).ready( function () {
            $('#lista_tienda').DataTable( {
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
    <!--NO ENTIENDO EL SCRIPT ANTERIOR :( -->
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
    <div class="container mt-4">
        <div class="mt-3">
            <table class="table table-bordered" id="lista-tienda">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fecha registro</th>
                    <th>Usuario (Dueño)</th>
                    <th>Tipo tienda</th>
                    <th>Comuna</th>
                    <th>Verificacion</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php if($tiendas): ?>
                    <?php foreach($tiendas as $tienda): ?>
                        <tr>
                            <td><?php echo $tienda['id_tienda']; ?></td>
                            <td><?php echo $tienda['nombre']; ?></td>
                            <td><?php echo $tienda['fecha_registro']; ?></td>
                            <td><?php echo $tienda['usuario_id_usuario']; ?></td>
                            <td><?php echo $tienda['tipo_tienda_id_tipo_tienda']; ?></td>
                            <td><?php echo $tienda['comuna_id_comuna']; ?></td>
                            <td><?php echo $tienda['verificacion']; ?></td>
                            <td>
                                <a href="<?php echo base_url('modificar_tienda/'.$tienda['id_tienda']);?>" class="btn btn-primary btn-sm">Editar</a>
                                <a href="<?php echo base_url('delete/'.$tienda['id_tienda']);?>" class="btn btn-danger btn-sm">Deshabilitar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#lista_tienda').DataTable( {
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
</body>
</html>