<?php namespace App\Controllers;

use App\Models\UsuarioModel;

class UsuarioController extends BaseController {
    public function index() {
        $model = new UsuarioModel();
        $data['usuarios'] = $model->findAll();
        return view('lista_usuarios', $data);
    }

    public function create()
    {
        return view('templates/header')
            . view('pages/register')
            . view('templates/footer');
    }

    public function store() {
        $model = new UsuarioModel();
        $rules = [
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|valid_email|is_unique[usuarios.email]',
            'username' => 'required|is_unique[usuarios.username]',
            'password' => 'required|min_length[5]',
            'terms' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password')
        ];

        $model->save($data);
        return redirect()->to('/login')->with('message', 'Registro exitoso!');
    }
}