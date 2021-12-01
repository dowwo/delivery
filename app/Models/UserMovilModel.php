<?php

namespace App\Models;

use CodeIgniter\Model;

class UserMovilModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    //Esta funcion recibe los datos $email y $pass que se ingresaran en el formulario
    public function logins($email,$pass){
        $this->db->where('email', $email);
        $this->db->limit(1);
        $query= $this->db->get('usuario');
        if ($query->num_rows()>0){
            $row= $query->row();
            if (password_verify($pass, $row->password)){
                $data[]= array('email' => $row->email, 'nombre' => $row->nombre );
                return $data;
            }else{
                return false;
            }
        }else{
            return false;
        }

    }
}