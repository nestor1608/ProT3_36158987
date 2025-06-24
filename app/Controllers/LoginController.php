<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class LoginController extends BaseController
{
    public function index()
    {
        return view('templates/header')
            . view('pages/login')
            . view('templates/footer');
    }

    public function auth()
    {
        $model = new UsuarioModel();
        $email = $this->request->getPost('loginEmail');
        $password = $this->request->getPost('loginPassword');
        $user = $model->where('email', $email)->first();

        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Credenciales inválidas');
        }

        $session = session();
        $session->set([
            'user_id' => $user['id'],
            'is_admin' => $user['is_admin'] ?? false
        ]);
        log_message('debug', 'Login exitoso: '.print_r($session->get(), true));

        // Redirigir según el tipo de usuario
        if ($user['is_admin'] ?? false) {
            return redirect()->to('/admin/dashboard')->with('message', 'Bienvenido administrador ' . $user['nombre']);
        }

        return redirect()->to('/')->with('message', 'Bienvenido ' . $user['nombre']);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
