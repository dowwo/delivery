<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Admin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Si el usuario no es igual a 47174
        // Este filtro pregunta si existe el dato rol_id_rol, luego lo compara para decidir si retorna la vista del controlador o redirige al dashboard
        if(session()->get('rol_id_rol')!=47174){
            // redirige al dashboard de administrador //
            return redirect()->to('/dashboard1');

        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}