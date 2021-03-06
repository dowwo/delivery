<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!--
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    -->

    <title>Agregar Pedido</title>
    <!--
    <style type="text/css">
        body {
            /*background-color: #AB3E5B;*/
            background-color: white;
        }

        .navbar-light .navbar-nav .active > .nav-link, .navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav .nav-link.show, .navbar-light .navbar-nav .show > .nav-link {
            font-weight:bold;
        }

        .nav-item.item {
            padding-right:2rem;
        }

        .navbar-nav:last-child .item:last-child, .navbar-nav:last-child .item:last-child a {
            padding-right:0;
        }

        .map-example .heading .icon {
            color:#ffb526;
        }

        .map-example {
            margin-top:50px;
            padding-bottom:100px;
        }

        .map-example .heading {
            margin-bottom:20px;
            border-bottom:1px solid #e4e4e4;
            padding-bottom:30px;
        }

        .map-example .info {
            margin-bottom:20px;
            border-bottom:1px solid #e4e4e4;
            padding-bottom:20px;
            color:#636363;
        }

        .map-example .gallery h4 {
            margin-bottom:30px;
        }

        .map-example .gallery .image {
            margin-bottom:15px;
            box-shadow:0px 2px 10px rgba(0, 0, 0, 0.15);
        }

        .map-example #map {
            height: 300px;
            margin-bottom: 20px;
        }

        .page-footer {
            padding-top:32px;
            border-top:1px solid #ddd;
            text-align:center;
            padding-bottom:20px;
        }

        .page-footer a {
            margin:0px 10px;
            display:inline-block;
            color:#282b2d;
            font-size:18px;
        }

        .page-footer .links {
            display:inline-block;
        }

        @media(min-width: 992px){
            .map-example #map{
                height: 500px;
            }
        }
    </style>
    -->

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



    <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.25/gmaps.js"></script>
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

    <!-- Maps API KEY con callback a la funcion myMap -->
    <script async="async" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBp3qUeUUevPEBWY1v-3dJJs8yEgtNrP7I&libraries=places&callback=myMap&callback=initAutocomplete" >
    </script>




    <!-- Script con las funciones para google maps (especificamente el mapa) -->
    <script>

        function myMap() {
            // Esta latitud y longitud son por defecto para que el mapa aparezca en Curacaut??n.
            const myLatlng = {lat: -38.4396458, lng: -71.888786};
            // Se definen las variables para los marcadores
            var vMarker
            let markers = [];
            // variables para el mapa
            var map
            // variables para vincular con los input latitud y longitud
            var inputLatitud = document.getElementById("InputForLatitud");
            var inputLongitud = document.getElementById("InputForLongitud");
            // se vincula la varible map con el id googleMap en el formulario
            map = new google.maps.Map(document.getElementById("googleMap"), {
                zoom: 14,
                center: new google.maps.LatLng(-38.4396458, -71.888786),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            // Se crea una ventana de informaci??n en el mapa.
            let infoWindow = new google.maps.InfoWindow({
                content: "Haz click en el mapa para agregar latitud y longitud",
                position: myLatlng,

            });

            infoWindow.open(map);
            // Se configura el listener con su evento "click".
            map.addListener("click", (mapsMouseEvent) => {
                // Cierra la ventana de informaci??n.
                infoWindow.close();
                // Crea una nueva ventana de informaci??n.
                infoWindow = new google.maps.InfoWindow({
                    position: mapsMouseEvent.latLng,
                });
                // Se pasan los valores de latitud y longitud a los input
                inputLatitud.value = mapsMouseEvent.latLng.lat();
                inputLongitud.value = mapsMouseEvent.latLng.lng();

                infoWindow.setContent(
                    JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
                );
                infoWindow.open(map);
            });
            // Este listener funciona solo con event
            map.addListener("click", (event) => {
                addMarker(event.latLng);
            });
            // Se agrega un listener al boton delete-markers
            document.getElementById("delete-markers").addEventListener("click", deleteMarkers);

            map.addListener("dblclick", (event) => {
                // Llama a la funci??n deleteMarkers()
                deleteMarkers();
            })

            function addMarker(position) {
                const marker = new google.maps.Marker({
                    position,
                    map,
                });

                markers.push(marker);
            }

            function hideMarkers() {
                // Cambia todos los marcadores del mapa en null (osea dejan de existir)
                setMapOnAll(null);
            }

            function deleteMarkers() {
                // Llama a la funci??n hideMarkers()
                hideMarkers();
                markers = [];
            }

            // Esta funci??n cambia todos los markers en el array del mapa.
            function setMapOnAll(map) {
                for (let i = 0; i < markers.length; i++) {
                    markers[i].setMap(map);
                }
            }

            function placeMarkerAndPanTo(latLng, map) {
                vMarker = new google.maps.Marker({
                    position: latLng,
                    draggable: true,
                    map: map,
                });
                map.panTo(latLng);

            }
        }
/*
            function movePin() {
                var geocoder = new google.maps.Geocoder();
                var textSelectM = $("#txtCiudad").text();
                var textSelectE = $("#txtEstado").val();
                var inputAddress = $("#txtDireccion").val() + ' ' + textSelectM + ' ' + textSelectE;
                geocoder.geocode({
                    "address": inputAddress
                }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        vMarker.setPosition(new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng()));
                        map.panTo(new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng()));
                        $("#InputForLatitud").val(results[0].geometry.location.lat());
                        $("#InputForLongitud").val(results[0].geometry.location.lng());
                    }

                });
            }
*/
    </script>

</head>
<body>


<?php
if(isset($_SESSION['msg'])){
    echo $_SESSION['id_usuario'];
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
                        <a href="#pageSubmenuAdmin" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Administrador</a>
                        <ul class="collapse list-unstyled" id="pageSubmenuAdmin">
                            <li>
                                <!--Redireccionar al agregar_tienda-->
                                <a href="../registro" class="card-link">Agregar Usuario</a>
                            </li>
                            <li>
                                <!--Redireccionar al listar_tienda-->
                                <a href="../lista_usuarios" class="card-link">Listar Usuarios</a>
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
                            <a href="../agregar_tienda" class="card-link">Agregar tienda</a>
                        </li>
                        <li>
                            <!--Redireccionar al listar_tienda-->
                            <a href="../lista_tienda" class="card-link">Listar Tienda</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pedidos</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu2">
                        <li>
                            <!--Redireccionar al agregar_tienda-->
                            <a href="../seleccionar_tienda" class="card-link">Agregar Pedido</a>
                        </li>
                        <li>
                            <!--Redireccionar al listar_tienda-->
                            <a href="../lista_pedidos" class="card-link">Ver Pedidos</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="btn btn-outline-danger my-2 my-sm-0" href="../login/logout">Cerrar sesi??n</a>
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

            <!-- Aqu?? ya puede ir el formulario para que se vea ordenado-->
            <h1>Agregar Pedido</h1>
            <?php if(isset($validation)):?>
                <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
            <?php endif;?>

            <form action="/PedidoController/guardar" method="post">
                <div>
                    <!--<label for="InputUsuario" class="form-label">Usuario</label>-->
                    <input type="hidden" name="usuario" class="form-control" id="InputUsuario" value="<?php echo $_SESSION['id_usuario'] ?>">
                </div>
                <div class="mb-3">
                    <!--<label for="InputForNombre" class="form-label">Tienda</label>-->
                    <input type="hidden" name="id_tienda" class="form-control" id="id_tienda" value="<?php
                    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    echo basename($actual_link);
                    ?>">
                </div>
                <!-- Este div se utilizaba para listar los productos disponibles
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
                </div>
                -->
                <div class="mb-3">
                    <label for="InputForDescripcion" class="form-label">Descripcion</label>
                    <input type="text" name="descripcion" class="form-control" id="InputForDescripcion" required="required">
                </div>
                <div class="mb-3">
                    <label for="InputForTelefono" class="form-label">Telefono</label>
                    <input type="number" name="telefono" class="form-control" id="InputForTelefono" required="required" placeholder="987654321">
                </div>

                <div class="mb-3">
                    <label for="InputForDireccion" class="form-label">Direcci??n destino</label>
                    <input name="direccion" class="form-control" id="InputForDireccion" placeholder="Ingrese los campos: Calle, N??mero, Ciudad" type="text" required="required">
                </div>
                <div>
                    <!--
                    <label for="InputForLatitud" class="form-label">Latitud</label>-->
                    <input type="hidden" name="latitud" class="form-control" id="InputForLatitud" required="required">
                    <!--
                    <label for="InputForLongitud" class="form-label">Longitud</label>-->
                    <input type="hidden" name="longitud" class="form-control" id="InputForLongitud" required="required">
                    <!--
                    <input id="delete-markers" type="button" value="Limpiar direcci??n" class="btn btn-danger"/>
                    <br>-->
                </div>


                <!-- Aqu?? va el div para el mapa-->
                <!-- Comentado hasta que encuentre como hacerlo funcionar junto a la searchbox
                <div id="googleMap" style="width:100%;height:400px;">
                </div>
                -->

                <div class="mb-3">
                    <label type="hidden" for="InputForFecha" class="form-label" name="fecha_pedido">Fecha pedido: <?php echo @date('d-m-Y'); ?></label>
                    <input type="text" class="form-control" id="InputForFecha" value="<?php echo @date('d-m-Y'); ?>" disabled="true" >

                </div>
                <div class="mb-3">
                    <label for="InputForTotal" class="form-label">Valor total</label>
                    <input type="number" name="total" class="form-control" id="InputForTotal" required="required">
                </div>
                <div class="mb-3">
                    <label for="InputForTienda" class="form-label">Estado</label>
                    <select name="estado" id="InputForTienda" class="form-select" aria-label="Default select example">
                        <option value="1">En espera</option>
                        <option value="2">En reparto</option>
                        <option value="3">Entregado</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Registrar pedido</button>
            </form>


        </div>
    </div>
</div>






<!--AIzaSyBp3qUeUUevPEBWY1v-3dJJs8yEgtNrP7ILa api que utiliza el sitio web es la de Places, por lo que debe habilitarse aparte en la cuenta de google-->


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
                'Enter a place';
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
<!--Este script es para utilizar el autocompletado y validacion de direcciones de google maps-->

<!-- Start of HubSpot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js-eu1.hs-scripts.com/25266980.js"></script>
<!-- End of HubSpot Embed Code -->




<!-- Start of HubSpot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js-eu1.hs-scripts.com/25266980.js"></script>
<!-- End of HubSpot Embed Code -->
</body>
</html>