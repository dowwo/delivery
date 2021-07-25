<?php


namespace App\Models;


use CodeIgniter\Model;

class UserModel extends Model
{
    // Nunca debe faltar el $primaryKey
    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = ['nombre','apellido_p','apellido_m','fecha_registro','email','password','rol_id_rol'];
}