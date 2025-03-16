<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0">
                <div class="card-header bg-warning text-dark py-3">
                    <h4 class="mb-0">Iniciar Sesión</h4>
                </div>
                <div class="card-body p-4">
                    <?php if (isset($_SESSION['error_login'])): ?>
                        <div class="alert alert-danger bg-danger-subtle border-danger">
                            <?php 
                                echo $_SESSION['error_login']; 
                                unset($_SESSION['error_login']);
                            ?>
                        </div>
                    <?php endif; ?>
                    
                    <form action="index.php?controller=UsuariosController&action=ProcesarLogin" method="POST">
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuario</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark text-light"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" id="usuario" name="usuario" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Contraseña</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark text-light"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-warning text-dark py-2">Iniciar Sesión</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center bg-white py-3">
                    <a href="index.php" class="btn btn-link text-warning">Volver a la tienda</a>
                </div>
            </div>
        </div>
    </div>
</div>
