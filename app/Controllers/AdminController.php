<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class AdminController extends BaseController
{
    public function __construct()
    {
        // Verificar si es administrador en cada método
        if (!session()->get('is_admin')) {
            // Agrega exit después de la redirección
            return redirect()->to('/')->with('error', 'Acceso no autorizado')->send();
        }
    }

    public function dashboard()
    {
        return view('templates/admin/admin_header')
            . view('templates/admin/dashboard')
            . view('templates/admin/admin_footer');
    }

    public function usuarios()
    {
        $model = new UsuarioModel();
        $data['usuarios'] = $model->findAll();

        return view('templates/admin/admin_header')
            . view('admin/pages/usuarios', $data)
            . view('templates/admin/admin_footer');
    }

    public function editarUsuario($id)
    {
        $model = new UsuarioModel();
        $data['usuario'] = $model->find($id);

        return view('templates/admin/admin_header')
            . view('admin/pages/editar_usuario', $data)
            . view('templates/admin/admin_footer');
    }

    public function actualizarUsuario($id)
    {
        $model = new UsuarioModel();
        $rules = [
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => "required|valid_email|is_unique[usuarios.email,id,$id]",
            'username' => "required|is_unique[usuarios.username,id,$id]",
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'is_admin' => $this->request->getPost('is_admin') ? 1 : 0
        ];

        $model->update($id, $data);
        return redirect()->to('/admin/usuarios')->with('message', 'Usuario actualizado correctamente');
    }

    public function eliminarUsuario($id)
    {
        $model = new UsuarioModel();
        $model->delete($id);
        return redirect()->to('/admin/usuarios')->with('message', 'Usuario eliminado correctamente');
    }
}
