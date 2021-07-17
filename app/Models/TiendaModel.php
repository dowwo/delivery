<?php


namespace App\Models;


use CodeIgniter\Model;

class TiendaModel extends Model
{
    protected $table = 'tienda';
    protected $primaryKey = 'id_tienda';
    protected $allowedFields = ['nombre','fecha_registro','usuario_id_usuario','tipo_tienda_id_tipo_tienda','comuna_id_comuna','verificacion'];
}