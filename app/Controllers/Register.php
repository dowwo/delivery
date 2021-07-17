<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Register extends Controller
{
    public function index()
    {
        //include helper form
        helper(['form']);
        $data = [];
        echo view('register', $data);
    }

    public function save()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'nombre'        => 'required|min_length[3]|max_length[20]',
            'apellido_p'    => 'required|min_length[3]|max_length[20]',
            'apellido_m'    => 'required|min_length[3]|max_length[20]',
            'email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[usuario.email]',
            'password'      => 'required|min_length[6]|max_length[200]',
            'confpassword'  => 'matches[password]'

        ];

        if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'nombre'            => $this->request->getVar('nombre'),
                'apellido_p'        => $this->request->getVar('apellido_p'),
                'apellido_m'        => $this->request->getVar('apellido_m'),
                'fecha_registro'    =>  $this->request->getVar('fecha_registro'),
                'email'             => $this->request->getVar('email'),
                'password'          => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
                //'rol_id_rol'        => $this->request->getVar('rol_id_rol')
            ];
            $model->save($data);
            return redirect()->to('/login');
        }else{
            $data['validation'] = $this->validator;
            echo view('register', $data);
        }

    }

}