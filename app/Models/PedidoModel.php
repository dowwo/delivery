<?php


namespace App\Models;


use CodeIgniter\Model;

class PedidoModel extends Model
{
    protected $table = 'producto';
    protected $allowedFields = ['codigo_barra','nombre','cantidad','fecha_agregado','valor'];
}