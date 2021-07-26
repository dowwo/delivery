<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <title>Agregar Producto</title>
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
                            <option value="<?=$producto['id_producto']?>"><?=$producto['nombre']?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="InputForCantidad" class="form-label">Cantidad</label>
                    <input type="number" name="cantidad" class="form-control" id="InputForCantidad" onkeyup="calcularTotal()" ">
                </div>
                <div>
                    <label for="InputForValor" class="form-label">Valor producto</label>
                    <input type="number" name="valor" class="form-control" id="InputForValor" onkeyup="calcularTotal()" ">
                </div>
                <div class="mb-3">
                    <label for="InputForDireccion" class="form-label">Dirección destino</label>
                    <input type="text" name="direccion" class="form-control" id="InputForDireccion">
                </div>
                <div>
                    <label for="InputForLatitud" class="form-label">Latitud</label>
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
<script type="text/javascript">
    function calcularTotal{
        $cantidad = document.getElementById('InputForCantidad');
        $valor = document.getElementById('InputForValor');
        $total = $cantidad * $valor;
        document.getElementById('InputForTotal').value = $total;
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>