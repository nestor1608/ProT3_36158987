<h1>Gestión de Usuarios</h1>
<a href="/admin/usuarios/editar/0" class="btn btn-primary mb-3">Nuevo Usuario</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Username</th>
            <th>Admin</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= $usuario['id'] ?></td>
                <td><?= $usuario['nombre'] . ' ' . $usuario['apellido'] ?></td>
                <td><?= $usuario['email'] ?></td>
                <td><?= $usuario['username'] ?></td>
                <td><?= $usuario['is_admin'] ? 'Sí' : 'No' ?></td>
                <td>
                    <!-- Enlace para Editar -->
                    <a href="<?= site_url('admin/usuarios/editar/' . $usuario['id']) ?>" class="btn btn-sm btn-warning">Editar</a>

                    <!-- Enlace para Eliminar -->
                    <a href="<?= site_url('admin/usuarios/eliminar/' . $usuario['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>