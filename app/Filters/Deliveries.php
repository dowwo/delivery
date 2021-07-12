<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Deliveries implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Si el usuario no es igual a 47374
        if(session()->get('user_id')!=47374){
            // redirige al dashboard de repartidor //
            return redirect()->to('/dashboard2');

        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}