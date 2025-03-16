<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <title>Carlete's Shop</title>
</head>

<body class="d-flex flex-column min-vh-100 bg-light">

    <header class="bg-warning text-dark py-3">
        <div class="container d-flex align-items-center justify-content-between">
            
        <?php if (!isset($_SESSION['usuario'])): ?>
            <!--Usuario no logeado-->
            <a href="index.php" class="text-dark fw-bold fs-4 text-decoration-none">Carlete's Shop</a>
        <?php elseif ($_SESSION['usuario']->perfil_usu == 0): ?>
            <!--Administrador-->
            <a href="index.php?controller=ProductosController&action=adminListarProductos" class="text-dark fw-bold fs-4 text-decoration-none">Carlete's Shop</a>
        <?php else: ?>
            <!--Usuario Normal-->
            <a href="index.php" class="text-dark fw-bold fs-4 text-decoration-none">Carlete's Shop</a>
        <?php endif; ?>

            <div>
                <?php if (!isset($_SESSION['usuario'])): ?>
                    <!-- Usuario no logueado -->
                    <a class="btn btn-dark me-2" href="index.php?controller=UsuariosController&action=IniciarSesion">Iniciar Sesión</a>
                    <a class="btn btn-outline-dark" href="index.php?controller=ProductosController&action=showCarrito">
                        <i class="fas fa-shopping-cart"></i> Carrito
                    </a>
                <?php elseif ($_SESSION['usuario']->perfil_usu == 0): ?>
                    <!-- Administrador -->
                    <a class="btn btn-dark me-2" href="index.php?controller=UsuariosController&action=CerrarSesion">
                        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                    </a>
                <?php else: ?>
                    <!-- Usuario normal -->
                    <a class="btn btn-dark me-2" href="index.php?controller=UsuariosController&action=CerrarSesion">
                        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                    </a>
                    <a class="btn btn-outline-dark" href="index.php?controller=ProductosController&action=showCarrito">
                        <i class="fas fa-shopping-cart"></i> Carrito
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>