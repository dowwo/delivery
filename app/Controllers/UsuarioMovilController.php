<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class UsuarioMovilController extends ResourceController
{
    function __construct(){
        
        $this->load->model('UserModel');
    }

    public function register_post(){
        $nombre=$this->post('nombre');
        $apellido_p=$this->post('apellido_p');
        $apellido_m=$this->post('apellido_m');
        $email=$this->post('email');
        $pass=$this->post('pass');

        $registration = $this->UserModel->register($email,$pass);

        //Esto esta incompleto por ahora
        //Ya que el registro se hace desde la pagina
    }

    public function login_post(){
        $email=$this->post('email');
        $pass=$this->post('pass');

        $login = $this->UserModel->logins($email, $pass);
        if (!$login){
            $this->response(array('status'=>false, 'message'=>'Wrong Email or Password'));
        }
        else{
            $this->response(array('status'=>true, 'message'=>'Login Success','response'=>$login));
        }
    }
}