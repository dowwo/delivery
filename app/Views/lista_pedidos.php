<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lista de Pedidos</title>
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
        #lista-pedido {
            background-color: rgba(255, 255, 255, 1);

        }
    </style>
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
<!-- Esto no hace nada, solo un echo, si quieres lo quitamos - Dowwo -->
<?php
if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
}
?>
<!---->
<div class="container mt-4">
    <div class="mt-3">
        <table class="table table-bordered" id="lista-pedido">
            <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Tienda</th>
                <th>Descripcion</th>
                <th>Telefono</th>
                <th>Destino</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php if($pedidos): ?>
                <?php foreach($pedidos as $pedido): ?>
                    <tr>
                        <td><?php echo $pedido['id_pedido']; ?></td>
                        <td><?php echo $pedido['usuario_id_usuario']; ?></td>
                        <td><?php echo $pedido['tienda_id_tienda']; ?></td>
                        <td><?php echo $pedido['descripcion']; ?></td>
                        <td><?php echo $pedido['telefono']; ?></td>
                        <td><?php echo $pedido['direccion_destino']; ?></td>
                        <td><?php echo $pedido['latitud']; ?></td>
                        <td><?php echo $pedido['longitud']; ?></td>
                        <td><?php echo $pedido['fecha_pedido']; ?></td>
                        <td><?php echo $pedido['valor_total']; ?></td>
                        <td><?php echo $pedido['estado_id_estado']; ?></td>
                        <td>
                            <a href="<?php echo base_url('modificar_pedido/'.$pedido['id_pedido']);?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="<?php echo base_url('eliminar_pedido/'.$pedido['id_pedido']);?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>



</body>
</html>