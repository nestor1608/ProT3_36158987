<h1><?= $usuario['id'] ? 'Editar Usuario' : 'Nuevo Usuario' ?></h1>

<form method="post" action="/admin/usuarios/actualizar/<?= $usuario['id'] ?? '' ?>">
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="<?= $usuario['nombre'] ?? '' ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Apellido</label>
        <input type="text" class="form-control" name="apellido" value="<?= $usuario['apellido'] ?? '' ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" value="<?= $usuario['email'] ?? '' ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" class="form-control" name="username" value="<?= $usuario['username'] ?? '' ?>" required>
    </div>
    <?php if (isset($usuario['id'])): ?>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" name="is_admin" id="is_admin" <?= ($usuario['is_admin'] ?? false) ? 'checked' : '' ?>>
        <label class="form-check-label" for="is_admin">Es administrador</label>
    </div>
    <?php endif; ?>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="usuarios" class="btn btn-secondary">Cancelar</a>
</form>