<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModeloUsuario;

class LoginController extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('login');
    }

    public function auth()
    {
        $session = session();
        $model = new ModeloUsuario();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email_usuario', $email)->first();
        if ($data) {
            $pass = $data['password_usuario'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'user_id' => $data['id_usuario'],
                    'user_name' => $data['nombre_usuario'],
                    'user_email' => $data['email_usuario'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('msg', 'Contraseña Incorrecta');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'El email no está registrado');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}