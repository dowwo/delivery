<?php


namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'producto';
    protected $primaryKey = 'id_producto';
    protected $allowedFields = ['nombre','cantidad','fecha_agregado','valor','tienda_id_tienda','categoria_id_categoria'];
}