<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Este es el que usaremos con bootstrap 3.3.0-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.25/gmaps.js"></script>
    <!-- Maps API KEY con callback a la funcion myMap -->
    <script async="async" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBp3qUeUUevPEBWY1v-3dJJs8yEgtNrP7I&libraries=places&callback=myMap&callback=initAutocomplete" >
    </script>

    <title>Modificar Pedido</title>

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

</head>
<body>
<?php
if(isset($_SESSION['msg'])){
    echo $_SESSION['id_usuario'];
    echo $_SESSION['nombre'];
}
?>
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
                        <a href="dashboard3" class="card-link">Administrador</a>
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


            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-6">

                        <h1>Modificar Pedido</h1>
                        <?php if(isset($validation)):?>
                            <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                        <?php endif;?>
                        <form method="post" action="<?= site_url('/PedidoController/update') ?>">
                            <div class="form-group">
                                <label for="InputForID" class="form-label">ID</label>
                                <input type="text" name="id_pedido" class="form-control" value="<?php echo $pedido_obj['id_pedido']; ?>">
                            </div>
                            <div class="form-group">
                                <!--<label for="InputForUsuario" class="form-label">ID</label>-->
                                <input type="hidden" name="id_usuario" class="form-control" value="<?php echo $pedido_obj['usuario_id_usuario']; ?>">
                            </div>
                            <div class="form-group">
                                <!--<label for="InputForID" class="form-label">ID</label>-->
                                <input type="hidden" name="id_pedido" class="form-control" value="<?php echo $pedido_obj['tienda_id_tienda']; ?>">
                            </div>
                            <!--
                            <div class="mb-3">
                                <label for="InputForProducto" class="form-label">Producto</label>
                                <select name="producto" id="producto" class="form-select" aria-label="Default select example">
                                    <?php
                            /*
                                    foreach($productos as $producto)
                                    {
                                        ?>
                                        <option value="<?=$producto['id_producto']?>"><?=$producto['nombre']?>, Valor= <?=$producto['valor']?>, Stock= <?=$producto['cantidad']?> </option>
                                        <?php
                                    }*/
                                    ?>
                                </select>
                            </div>-->
                            <!--
                            <div class="mb-3">
                                <label for="InputForCantidad" class="form-label">Cantidad</label>
                                <input type="number" name="cantidad" class="form-control" id="InputForCantidad" onkeyup="calcularTotal()" value="<?php echo $pedido_obj['cantidad']; ?>" ">
                            </div>-->
                            <div class="mb-3">
                                <label for="InputForDireccion" class="form-label">Dirección destino</label>
                                <input type="text" name="direccion" class="form-control" id="InputForDireccion" value="<?php echo $pedido_obj['direccion_destino']; ?>" required="required">
                            </div>
                            <div>
                                <!--<label for="InputForLatitud" class="form-label">Latitud</label>-->
                                <input type="hidden" name="latitud" class="form-control" id="InputForLatitud" value="<?php echo $pedido_obj['latitud']; ?>>
                                <!--<label for="InputForLongitud" class="form-label">Longitud</label>-->
                                <input type="hidden" name="longitud" class="form-control" id="InputForLongitud" value="<?php echo $pedido_obj['longitud']; ?>>
                            </div>
                            <div class="mb-3">
                                <label for="InputForFecha" class="form-label" name="fecha">Fecha pedido: <?php echo $pedido_obj['fecha_pedido']; ?></label>
                                <input type="text" class="form-control" id="InputForFecha" value="<?php echo @date('d-m-Y'); ?>" disabled="true" >
                            </div>
                            <div class="mb-3">
                                <label for="InputForTotal" class="form-label">Valor total</label>
                                <input type="number" name="total" class="form-control" id="InputForTotal" value="<?php echo $pedido_obj['valor_total']; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Estado pedido actual <?php echo $pedido_obj['estado_id_estado']; ?></label>
                                <label for="InputForEstado" class="form-label">Nuevo Estado</label>
                                <select name="estado" id="InputForEstado" class="form-select" aria-label="Default select example">
                                    <option value="1">En espera</option>
                                    <option value="2">En reparto</option>
                                    <option value="3">Entregado</option>
                                    <option value="4">Cancelado</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<script>
    let autocomplete;
    function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete(
            document.getElementById('InputForDireccion'),
            {
                types: ['address'],
                //types: ['establishment'],
                componentRestrictions: {'country': ['CL']},
                fields: ['place_id', 'geometry','name']
            });

        autocomplete.addListener('place_changed', onPlaceChanged);
    }
    function onPlaceChanged(){
        var place = autocomplete.getPlace();

        if (!place.geometry) {
            document.getElementById('InputForDireccion').placeholder =
                'Ingrese una dirección';
        } else {
            document.getElementById('InputForDireccion').value = place.name;
            var location = place.geometry.location;
            var lat = location.lat();
            var lng = location.lng();
            document.getElementById('InputForLatitud').value = lat;
            document.getElementById('InputForLongitud').value = lng;
        }
    }
</script>




    </body>
</html>