<div class="row justify-content-center">
  <div class="col-lg-8">
    <div class="card">
      <div class="card-header bg-primary text-white">
        <h3 class="mb-0">Registro de Usuario</h3>
      </div>
      <div class="card-body">
        <form class="row g-3">
          <div class="col-md-6">
            <label for="firstName" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="firstName" required>
          </div>
          <div class="col-md-6">
            <label for="lastName" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="lastName" required>
          </div>
          <div class="col-12">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" required>
          </div>
          <div class="col-md-6">
            <label for="username" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="username" required>
          </div>
          <div class="col-md-6">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" minlength="5" required>
            <div class="form-text">Mínimo 5 caracteres</div>
          </div>
          <div class="col-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="terms" required>
              <label class="form-check-label" for="terms">
                Acepto los términos y condiciones
              </label>
            </div>
          </div>
          <div class="col-12 text-end">
            <button type="button" class="btn btn-secondary me-2">Cancelar</button>
            <button type="submit" class="btn btn-primary">Registrarse</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>