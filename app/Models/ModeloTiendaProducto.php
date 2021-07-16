<?php


namespace App\Models;


use CodeIgniter\Controller;

class ModeloTiendaProducto extends Controller
{
    protected $table = 'tienda_producto';
    protected $allowedFields = ['tienda_id_tienda','productos_id_productos','productos_codigo_barra'];
}