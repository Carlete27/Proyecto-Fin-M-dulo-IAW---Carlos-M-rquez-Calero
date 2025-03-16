<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h2 class="text-warning mb-4">Nuestros Productos</h2>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
        <?php foreach ($data as $producto) : ?>
            <div class="col">
                <div class="card h-100 shadow-sm border-0">
                    <img src="<?= htmlspecialchars($producto->foto) ?>" 
                         alt="Imagen de <?= htmlspecialchars($producto->nombre) ?>"
                         class="card-img-top" style="height: 200px; object-fit: cover;">
                    
                    <div class="card-body">
                        <h5 class="card-title text-dark"><?= htmlspecialchars($producto->nombre) ?></h5>
                        <span class="badge bg-warning text-dark mb-2"><?= htmlspecialchars($producto->categoria) ?></span>
                        <p class="card-text text-warning fw-bold fs-5"><?= number_format($producto->precio, 2) ?>€</p>
                    </div>
                    
                    <div class="card-footer bg-white border-top-0">
                        <div class="d-grid gap-2">
                            <a href="index.php?controller=ProductosController&action=getProductsInfo&idproducto=<?= $producto->id_producto ?>"
                               class="btn btn-outline-dark btn-sm">ℹ️ Información</a>
                            <a href="index.php?controller=ProductosController&action=addProtuctsToCarrito&idproducto=<?= $producto->id_producto ?>"
                               class="btn btn-warning text-dark btn-sm">🛒 Añadir al Carrito</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>