<?php


namespace App\Models;


class TiendaModel
{
    protected $table = 'tienda';
    protected $allowedFields = ['nombre','fecha_registro','usuario_id_usuario','tipo_tienda_id_tipo_tienda','comuna_id_comuna','verificacion'];
}