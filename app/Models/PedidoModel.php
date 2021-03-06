<?php


namespace App\Models;


use CodeIgniter\Model;

class PedidoModel extends Model
{
    protected $table = 'pedido';
    protected $primaryKey = 'id_pedido';
    protected $allowedFields = ['usuario_id_usuario','tienda_id_tienda','descripcion','telefono','direccion_destino','latitud','longitud','fecha_pedido','valor_total','estado_id_estado','fecha_modificacion'];
}