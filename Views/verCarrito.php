<div class="container mt-4">
    <h2 class="text-warning mb-4">Tu Carrito</h2>
    
    <?php if (empty($data)): ?>
        <div class="alert alert-warning bg-light border border-warning" role="alert">
            <i class="fas fa-shopping-cart me-2"></i> Tu carrito está vacío. ¡Añade productos para empezar a comprar!
        </div>
        <a href="index.php" class="btn btn-warning text-dark">Ver Productos</a>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="bg-dark text-light">
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $producto): ?>
                        <tr>
                            <td class="align-middle"><?= htmlspecialchars($producto->nombre) ?></td>
                            <td class="align-middle text-warning fw-bold"><?= number_format($producto->precio, 2) ?>€</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <div class="card mt-4 border-0 shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <a href="index.php" class="btn btn-outline-dark me-2">
                            <i class="fas fa-arrow-left me-2"></i>Seguir comprando
                        </a>
                        <a href="index.php?controller=UsuariosController&action=FinalizarCompra" class="btn btn-warning text-dark">
                            <i class="fas fa-check me-2"></i>Finalizar Compra
                        </a>
                    </div>
                    
                    <div class="fw-bold fs-4">
                        <span class="me-2">Total:</span>
                        <span class="text-warning">
                            <?php
                                $total = 0;
                                foreach ($data as $producto) {
                                    $total += $producto->precio;
                                }
                                echo number_format($total, 2) . "€";
                            ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <?php if (isset($_SESSION['mensaje'])): ?>
            <div class="alert alert-success mt-3">
                <?php echo $_SESSION['mensaje']; ?>
                <?php unset($_SESSION['mensaje']); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>