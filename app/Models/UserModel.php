<?php


namespace App\Models;


use CodeIgniter\Model;

class UserModel extends Model
{
    /* Lo comento por si hay errores, luego deberiamos quitar estas lineas comentadas
    protected $table = 'user';
    protected $allowedFields = ['user_name','user_email','user_password','user_created_at'];
    */
    //Con la base de datos real, debería ir así
    protected $table = 'usuario';
    protected $allowedFields = ['nombre','apellido_p','apellido_m','email','password'];
}