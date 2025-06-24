<div class="row justify-content-center">
  <div class="col-lg-6">
    <div class="card">
      <div class="card-header bg-primary text-white">
        <h3 class="mb-0">Iniciar Sesión</h3>
      </div>
      <div class="card-body">
        <form action="<?= base_url('login/auth') ?>" method="post">
          <?= csrf_field() ?>
          <div class="mb-3">
            <label for="loginEmail" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="loginEmail" name="loginEmail" required>
          </div>
          <div class="mb-3">
            <label for="loginPassword" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="loginPassword" name="loginPassword"required>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="rememberMe">
            <label class="form-check-label" for="rememberMe">Recordarme</label>
          </div>
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-secondary me-md-2">Cancelar</button>
            <button type="submit" class="btn btn-primary">Ingresar</button>
          </div>
          <div class="mt-3 text-center">
            <a href="register">¿No tienes cuenta? Regístrate aquí</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>