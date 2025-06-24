<?php namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        log_message('debug', 'AuthFilter: Iniciando verificación');
        $session = session();
        
        // Debug: Mostrar datos de sesión
        log_message('debug', 'Datos de sesión: '.print_r($session->get(), true));
        
        if (!$session->get('user_id')) {
            log_message('debug', 'AuthFilter: Usuario no logueado, redirigiendo a login');
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión');
        }
        
        // Verificar rol si se especificó
        if (!empty($arguments) && $arguments[0] === 'admin' && !$session->get('is_admin')) {
            log_message('debug', 'AuthFilter: Usuario no es admin, redirigiendo a home');
            return redirect()->to('/')->with('error', 'Acceso no autorizado');
        }
        
        log_message('debug', 'AuthFilter: Verificación exitosa');
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No necesario
    }
}