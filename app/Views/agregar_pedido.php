<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <title>Agregar Pedido</title>
    <style type="text/css">
        body {
            /*background-color: #AB3E5B;*/
            background-color: white;
        }
        .navbar.navbar-light.navbar-expand-lg.bg-white.page-navbar {
            box-shadow:0 4px 10px rgba(0, 0, 0, 0.1);
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
                    <a class="nav-link" href="/dashboard1">Home <span class="sr-only">(current)</span></a>
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

            <h1>Agregar Pedido</h1>
            <?php if(isset($validation)):?>
                <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
            <?php endif;?>

            <form action="/PedidoController/guardar" method="post">
                <div>
                    <label for="InputUsuario" class="form-label">Usuario</label>
                    <input type="text" name="usuario" class="form-control" id="InputUsuario" value="<?php echo $_SESSION['id_usuario'] ?>">
                </div>
                <div class="mb-3">
                    <label for="InputForNombre" class="form-label">Tienda</label>
                    <input type="text" name="id_tienda" class="form-control" id="id_tienda" value="<?php
                    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    echo basename($actual_link);
                    ?>">
                </div>
                <div class="mb-3">
                    <label for="InputForProducto" class="form-label">Producto</label>
                    <select name="producto" id="producto" class="form-select" aria-label="Default select example">
                        <?php
                        foreach($productos as $producto)
                        {
                            ?>
                            <option value="<?=$producto['id_producto']?>"><?=$producto['nombre']?>, Valor= <?=$producto['valor']?>, Stock= <?=$producto['cantidad']?> </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="InputForCantidad" class="form-label">Cantidad</label>
                    <input type="number" name="cantidad" class="form-control" id="InputForCantidad">
                </div>
                <div class="mb-3">
                    <label for="InputForDireccion" class="form-label">Dirección destino</label>
                    <input type="text" name="direccion" class="form-control" id="InputForDireccion">
                </div>
                <!-- No lo recordaba pero tenia comentado los campos latitud y longitud para utilizarlos luego xd -->


                <div class="col-md-4">
                    <input type="text" id="txtDireccion" class="form-control" placeholder="direccion">
                </div>
                <div class="col-md-4">
                    <input type="text" id="txtCiudad" class="form-control" placeholder="ciudad">
                </div>
                <div class="col-md-4">
                    <input type="text" id="txtEstado" class="form-control" placeholder="estado">
                </div>
                <div id="googleMap" style="width:100%;height:400px;"></div>
                <h3>My Google Maps Demo</h3>



                <div>
                    <label for="InputForLatitud" class="form-label">Latitud</label>
                    <input id="autocomplete" placeholder="Enter a place" type="text">
                    <input type="text" name="latitud" class="form-control" id="InputForLatitud">
                    <label for="InputForLongitud" class="form-label">Longitud</label>
                    <input type="text" name="longitud" class="form-control" id="InputForLongitud">
                </div>
                <div class="mb-3">
                    <label for="InputForFecha" class="form-label" name="fecha_pedido">Fecha pedido: <?php echo @date('d-m-Y'); ?></label>
                    <input type="text" class="form-control" id="InputForFecha" value="<?php echo @date('d-m-Y'); ?>" disabled="true" >
                </div>
                <div class="mb-3">
                    <label for="InputForTotal" class="form-label">Valor total</label>
                    <input type="number" name="total" class="form-control" id="InputForTotal">
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

<!-- Popper.js first, then Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script>
    let autocomplete;
    function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete(
            document.getElementById('autocomplete'),
            {
                types: ['establishment'],
                componentRestrictions: {'country': ['CL']},
                fields: ['place_id', 'geometry','name']
            });

        autocomplete.addListener('place_changed', onPlaceChanged);
    }
    function onPlaceChanged(){
        var place = autocomplete.getPlace();

        if (!place.geometry) {
            document.getElementById('autocomplete').placeholder =
                'Enter a place';
        } else {
            document.getElementById('details').innerHTML = place.name;
        }
    }


</script>
<!--Este script es para utilizar el autocompletado y validacion de direcciones de google maps-->
<!--AIzaSyBp3qUeUUevPEBWY1v-3dJJs8yEgtNrP7ILa api que utiliza el sitio web es la de Places, por lo que debe habilitarse aparte en la cuenta de google-->
<script src="https://maps.googleapis.com/maps/api/js?
key=AIzaSyBp3qUeUUevPEBWY1v-3dJJs8yEgtNrP7I&libraries=places&callback=myMap" async defer>
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.25/gmaps.js"></script>
<script>



    function myMap() {
        var curacautin ={lat:-38.4396458, lng:-71.888786};

        var mapProp= {
            zoom:15,
            center: curacautin
        };


        var map = new google.maps.Map(document.getElementById("googleMap"),{
            zoom: 14,
            center: new google.maps.LatLng(-38.4396458, -71.888786),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var vMarker = new google.maps.Marker({
            position: new google.maps.LatLng(-38.4396458, -71.888786),
            draggable: true
        });
        google.maps.event.addListener(vMarker, 'dragend', function (evt){
            $("#InputForLatitud").val(evt.latLng.lat().fixed(6));
            $("#InputForLongitud").val(evt.latLng.lng().fixed(6));

            map.panTo(evt.latLng);
        })
        map.setCenter(vMarker.position);
        vMarker.setMap(map);

        $("#txtCiudad, #txtEstado, #txtDireccion").change(function () {
            movePin();
        });

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

        //var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);


        /*new google.maps.Marker({
            position: curacautin,
            map,
            title: "Hello World!",
        });*/



    }
</script>





</body>
</html>