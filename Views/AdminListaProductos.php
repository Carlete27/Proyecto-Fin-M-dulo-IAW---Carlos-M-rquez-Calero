<div class="container mt-4">
    <div class="card shadow border-0 mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="text-warning mb-0">Administración de Productos</h2>
                <a href="index.php?controller=ProductosController&action=formNuevoProducto" class="btn btn-warning text-dark">
                    <i class="fas fa-plus me-1"></i> Añadir Nuevo Producto
                </a>
            </div>
        </div>
    </div>

    <?php if (isset($_SESSION['mensaje'])): ?>
        <div class="alert alert-success alert-dismissible fade show border-left border-success border-3" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            <?php 
                echo $_SESSION['mensaje']; 
                unset($_SESSION['mensaje']);
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card shadow border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="bg-dark text-light">
                        <tr>
                            <th class="py-3">ID</th>
                            <th class="py-3">Foto</th>
                            <th class="py-3">Nombre</th>
                            <th class="py-3">Categoría</th>
                            <th class="py-3">Descripción</th>
                            <th class="py-3">Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $producto) : ?>
                            <tr>
                                <td class="align-middle"><?= $producto->id_producto ?></td>
                                <td class="align-middle">
                                    <img src="<?= htmlspecialchars($producto->foto) ?>" alt="Imagen de <?= htmlspecialchars($producto->nombre) ?>" 
                                         class="img-fluid rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                </td>
                                <td class="align-middle fw-medium"><?= htmlspecialchars($producto->nombre) ?></td>
                                <td class="align-middle"><span class="badge bg-warning text-dark"><?= htmlspecialchars($producto->categoria) ?></span></td>
                                <td class="align-middle fw-medium"><?= htmlspecialchars($producto->descripcion) ?></td>
                                <td class="align-middle text-warning fw-bold"><?= number_format($producto->precio, 2) ?>€</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
