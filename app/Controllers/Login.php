<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Login extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('login');
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $model->where('email', $email)->first();
        /**/
        if($data){

            $pass = $data['password'];

            $verify_pass = ($pass);
            if($verify_pass){
                $ses_data = [

                    'id_usuario'    => $data['id_usuario'],
                    'nombre'        => $data['nombre'],
                    'email'         => $data['email'],
                    'rol_id_rol'    => $data['rol_id_rol'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard1');
            }else{
                $session->setFlashdata('msg', 'Contraseña incorrecta');
                return redirect()->to('/login');
            }
            /*
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [

                    'id_usuario'    => $data['id_usuario'],
                    'nombre'        => $data['nombre'],
                    'email'         => $data['email'],
                    'rol_id_rol'    => $data['rol_id_rol'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard1');
            }else{
                $session->setFlashdata('msg', 'Contraseña incorrecta');
                return redirect()->to('/login');
            }
            */
        }else{
            $session->setFlashdata('msg', 'Email no encontrado');
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