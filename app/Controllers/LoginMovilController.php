<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\Controller;


class LoginMovilController extends ResourceController
{
    public function index()
    {
        helper(['form']);
        echo view('loginMovil');
    }

    public function loginapp(){
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        //$password = $this->request->getVar('password');
    }

    //Yo probare por aca - Dowwo
    //ESTO NO FUNCIONA, POR AHORA??

    protected $modelName = 'app\Models\UserModel';
    protected $format    = 'json';

    public function mLogin()
    {
        echo $this->respond($this->model->findAll());
    }

    // ...



    //Hasta aca
}