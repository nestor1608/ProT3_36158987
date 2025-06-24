<?php namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        log_message('debug', 'AdminFilter: Verificando permisos de admin');
        
        $isAdmin = session()->get('is_admin');
        log_message('debug', 'Valor de is_admin: '.($isAdmin ? 'TRUE' : 'FALSE'));
        
        if (!$isAdmin) {
            log_message('debug', 'AdminFilter: Redirigiendo a home - No es admin');
            return redirect()->to('/')->with('error', 'Acceso restringido a administradores');
        }
        
        log_message('debug', 'AdminFilter: Usuario es administrador');
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No necesario
    }
}