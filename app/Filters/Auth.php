<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Si el usuario no está logeado
        // Este filtro no sirve en conjunto con otros filtros, por lo que es necesario solo para el login
        // Para revisar el control por rol vea el filtro Admin.php
        if(! session()->get('logged_in')){
            // entonces se devuelve al login
            return redirect()->to('/login');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}