<div class="container mt-4">
    <div class="row justify-content-center">
        <?php foreach ($data as $producto) : ?>
            <div class="col-md-4 col-sm-6 col-10 mb-4 d-flex justify-content-center">
                <div class="card h-100 shadow border-0" style="width: 100%; max-width: 350px;">
                    
                    <img src="<?= htmlspecialchars($producto->foto) ?>" alt="<?= htmlspecialchars($producto->nombre) ?>" class="card-img-top">

                    <div class="card-body text-center">
                        
                        <h5 class="card-title text-dark"><?= htmlspecialchars($producto->nombre) ?></h5>
                        <span class="badge bg-warning text-dark"><?= htmlspecialchars($producto->categoria) ?></span>

                        
                        <p class="card-text text-warning fw-bold mt-2 fs-4"><?= number_format($producto->precio, 2) ?>€</p>
                        <p class="card-text"><?= htmlspecialchars($producto->descripcion) ?></p>

                        
                        <a href="index.php?controller=ProductosController&action=addProtuctsToCarrito&idproducto=<?= $producto->id_producto ?>" class="btn btn-warning text-dark w-100 mb-2">
                            🛒 Añadir al Carrito
                        </a>
                        <a href="index.php" class="btn btn-outline-dark w-100">Ver Productos</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>