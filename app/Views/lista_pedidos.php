<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lista de Pedidos</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Con esta versión de bootstrap funcionan bien las tarjetas, pero la barra de navegacion pierde la configuración
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
    <!-- Este es el que usaremos con bootstrap 3.3.0-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <!--
    <style type="text/css">
        body {
            background-color: #acacac;
        }
        #lista-pedido {
            background-color: rgba(255, 255, 255, 1);

        }
    </style>-->
    <style>
        body {
            background-color: #AB3E5B;
        }
        @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";
        body {
            font-family: 'Poppins', sans-serif;
            background: #fafafa;
        }

        p {
            font-family: 'Poppins', sans-serif;
            font-size: 1.1em;
            font-weight: 300;
            line-height: 1.7em;
            color: #999;
        }

        a,
        a:hover,
        a:focus {
            color: inherit;
            text-decoration: none;
            transition: all 0.3s;
        }

        .navbar {
            padding: 15px 10px;
            background: #fff;
            border: none;
            border-radius: 0;
            margin-bottom: 40px;
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }

        .navbar-btn {
            box-shadow: none;
            outline: none !important;
            border: none;
        }

        .line {
            width: 100%;
            height: 1px;
            border-bottom: 1px dashed #ddd;
            margin: 40px 0;
        }

        /* ---------------------------------------------------
            SIDEBAR STYLE
        ----------------------------------------------------- */

        .wrapper {
            display: flex;
            width: 100%;
            align-items: stretch;
        }

        #sidebar {
            min-width: 250px;
            max-width: 250px;
            background: #7386D5;
            color: #fff;
            transition: all 0.3s;
        }

        #sidebar.active {
            margin-left: -250px;
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background: #6d7fcc;
        }

        #sidebar ul.components {
            padding: 20px 0;
            border-bottom: 1px solid #47748b;
        }

        #sidebar ul p {
            color: #fff;
            padding: 10px;
        }

        #sidebar ul li a {
            padding: 10px;
            font-size: 1.1em;
            display: block;
        }

        #sidebar ul li a:hover {
            color: #7386D5;
            background: #fff;
        }

        #sidebar ul li.active>a,
        a[aria-expanded="true"] {
            color: #fff;
            background: #6d7fcc;
        }

        a[data-toggle="collapse"] {
            position: relative;
        }

        .dropdown-toggle::after {
            display: block;
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        }

        ul ul a {
            font-size: 0.9em !important;
            padding-left: 30px !important;
            background: #6d7fcc;
        }

        ul.CTAs {
            padding: 20px;
        }

        ul.CTAs a {
            text-align: center;
            font-size: 0.9em !important;
            display: block;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        a.download {
            background: #fff;
            color: #7386D5;
        }

        a.article,
        a.article:hover {
            background: #6d7fcc !important;
            color: #fff !important;
        }

        /* ---------------------------------------------------
            CONTENT STYLE
        ----------------------------------------------------- */

        #content {
            width: 100%;
            padding: 20px;
            min-height: 100vh;
            transition: all 0.3s;
        }

        /* ---------------------------------------------------
            MEDIAQUERIES
        ----------------------------------------------------- */

        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }
            #sidebar.active {
                margin-left: 0;
            }
            #sidebarCollapse span {
                display: none;
            }
        }
    </style>
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

    <script>
        $(document).ready( function () {
            $('#lista-pedido').DataTable( {
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
            } );
        } );
    </script>

    <!--Este script es para traducir el Datatable -->

    <script>
        /* Custom filtering function which will search data in column four between two values */
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var min = parseInt( $('#min').val(), 10 );
                var max = parseInt( $('#max').val(), 10 );
                var age = parseFloat( data[3] ) || 0; // use data for the age column

                if ( ( isNaN( min ) && isNaN( max ) ) ||
                    ( isNaN( min ) && age <= max ) ||
                    ( min <= age   && isNaN( max ) ) ||
                    ( min <= age   && age <= max ) )
                {
                    return true;
                }
                return false;
            }
        );

        $(document).ready(function() {
            var table = $('#lista-pedido').DataTable();

            // Event listener to the two range filtering inputs to redraw on input
            $('#min, #max').keyup( function() {
                table.draw();
            } );
        } );
    </script>


    <!--NO ENTIENDO EL SCRIPT ANTERIOR :( -->
</head>
<body>

<div>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Bienvenido <?php echo $_SESSION['nombre'] ?>
                </h3>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <?php if($_SESSION['rol_id_rol'] == 47174): ?>
                        <a href="#pageSubmenuAdmin" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Administrador</a>
                        <ul class="collapse list-unstyled" id="pageSubmenuAdmin">
                            <li>
                                <!--Redireccionar al agregar_tienda-->
                                <a href="registro" class="card-link">Agregar Usuario</a>
                            </li>
                            <li>
                                <!--Redireccionar al listar_tienda-->
                                <a href="lista_usuarios" class="card-link">Listar Usuarios</a>
                            </li>
                        </ul>
                    <?php else: ?>
                        <!-- Admin link goes here -->
                    <?php endif; ?>
                </li>
                <li>
                    <a href="/dashboard1">Inicio</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Tienda</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <!--Redireccionar al agregar_tienda-->
                            <a href="agregar_tienda" class="card-link">Agregar tienda</a>
                        </li>
                        <li>
                            <!--Redireccionar al listar_tienda-->
                            <a href="lista_tienda" class="card-link">Listar Tienda</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pedidos</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu2">
                        <li>
                            <!--Redireccionar al agregar_tienda-->
                            <a href="seleccionar_tienda" class="card-link">Agregar Pedido</a>
                        </li>
                        <li>
                            <!--Redireccionar al listar_tienda-->
                            <a href="lista_pedidos" class="card-link">Ver Pedidos</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="btn btn-outline-danger my-2 my-sm-0" href="../login/logout">Cerrar sesión</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Ver/Ocultar Menu</span>
                    </button>

                </div>
            </nav>

            <div class="container mt-4">
                <div class="mt-3 table-responsive">
                    <table class="table table-bordered" id="lista-pedido">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <!--<th>Usuario</th>-->
                            <th>Descripción</th>
                            <th>Teléfono</th>
                            <th>Destino</th><!--
                            <th>Latitud</th>
                            <th>Longitud</th>-->
                            <th>Fecha</th>
                            <th>Total</th>
                            <th>Estado</th>
                            <th>F. Modif.</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if($pedidos): ?>
                            <?php foreach($pedidos as $pedido): ?>
                                <tr>
                                    <td><?php echo $pedido['id_pedido']; ?></td>
                                    <!--<td><?php echo $pedido['usuario_id_usuario']; ?></td>-->
                                    <td><?php echo $pedido['descripcion']; ?></td>
                                    <td><?php echo $pedido['telefono']; ?></td>
                                    <td><?php echo $pedido['direccion_destino']; ?></td><!--
                                    <td><?php echo $pedido['latitud']; ?></td>
                                    <td><?php echo $pedido['longitud']; ?></td>-->
                                    <td><?php echo $pedido['fecha_pedido']; ?></td>
                                    <td><?php echo $pedido['valor_total']; ?></td>
                                    <td><?php

                                        switch ($pedido['estado_id_estado']) {
                                            case 1:
                                                echo "En espera";
                                                break;
                                            case 2:
                                                echo "En reparto";
                                                break;
                                            case 3:
                                                echo "Entregado";
                                                break;
                                            case 4:
                                                echo "Cancelado";
                                                break;
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $pedido['fecha_modificacion']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url('modificar_pedido/'.$pedido['id_pedido']);?>" class="btn btn-primary btn-sm">Editar</a>
                                        <a href="<?php echo base_url('eliminar_pedido/'.$pedido['id_pedido']);?>" class="btn btn-danger btn-sm">Eliminar</a>
                                        <a></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
      </div>
</div>



<!-- Esto no hace nada, solo un echo, si quieres lo quitamos - Dowwo -->
<?php
if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
}
?>
<!---->



<!-- Start of HubSpot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js-eu1.hs-scripts.com/25266980.js"></script>
<!-- End of HubSpot Embed Code -->
</body>
</html>