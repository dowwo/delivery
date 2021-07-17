<?php


namespace App\Models;


use CodeIgniter\Model;

class ComunaModel extends Model
{
    protected $table = 'comuna';

    protected $primaryKey = 'id_comuna';

    protected $allowedFields = ['comuna', 'fecha_registro'];
}