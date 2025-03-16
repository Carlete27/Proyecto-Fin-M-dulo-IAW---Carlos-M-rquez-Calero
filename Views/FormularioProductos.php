<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0">
                <div class="card-header bg-warning text-dark py-3">
                    <h4 class="mb-0">Añadir Nuevo Producto</h4>
                </div>
                <div class="card-body p-4">
                    <form action="index.php?controller=ProductosController&action=guardarProducto" method="POST">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del Producto</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="categoria" class="form-label">Categoría</label>
                            <input type="text" class="form-control" id="categoria" name="categoria" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio (€)</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="precio" name="precio" step="0.01" min="0" required>
                                <span class="input-group-text">€</span>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                        </div>
                        
                        <div class="mb-4">
                            <label for="foto" class="form-label">URL de la Imagen</label>
                            <input type="text" class="form-control" id="foto" name="foto" required>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="index.php?controller=ProductosController&action=adminListarProductos" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-1"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-warning text-dark">
                                <i class="fas fa-save me-1"></i> Guardar Producto
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
