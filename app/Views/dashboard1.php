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