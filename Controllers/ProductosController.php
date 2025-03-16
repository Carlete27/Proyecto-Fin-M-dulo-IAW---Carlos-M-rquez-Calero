<?php 
// Primero iniciamos la Sesión de PHP para guardos los datos entre diferents solicitudes HTTP
// Se inicia lo primero para que las variables "$_SESSION" esten disponibles en todos los controladores
session_start();

// Incluimos los ficheros necesarios para las funciones del controlador
// Con el de productosDAO.php conseguimos poder invocar la clase de ProductosDAO y sus metodos
include_once('./Models/productosDAO.php');
// COn el de View.php logramos aplicar el header y el footer a los fichero .php de lo controladores pasandole los datos de cada uno
include_once('./Views/View.php');


// Creamos una clase en la cual alojaremos todas las funciones que se encargaran de procesar los datos y montar las vistas
class ProductosController {

    // Esta funcion se encarga de procesar los datos de todos los productos
    // Invoca la Clase de ProductosDAO y utiliza el metodo de esta llamado getAllProducts
    // Porcesando los datos que este metodo le devuelve, entregandodelos a la vista llamada ListaProductos.php
    public function getProducts() {
        $prdDAO = new ProductosDAO();
        $array_productos = $prdDAO->getAllProducts();
        View::show('ListaProductos.php', $array_productos);
    }

    // Esta funcion se encarga de procesar los datos de el producto que se escoja por su ID
    // El funcionamiento es parecido al del la anterior funcion, con la unica difrencia de que
    // Este solo le pasa la información de aquel producto que nosotros escojamos para ver
    // Filtrándolo por su ID
    public function getProductsInfo($id) {
        $prdiDAO = new ProductosDAO();
        $array_productos_info = $prdiDAO->getProductsPlusInfo($id);
        View::show('InformacionProductos.php', $array_productos_info);
    }

    // Esta funcion se encarga de guardar en el carrito aquel producto que nosotros escojamos.
    // Para ello comprueba que existe el array de 'carrito' en la sesion, si no existe lo crea
    // Luego invoca el mismo metodo de selección de productos por ID que utiliza el anterior
    public function addProtuctsToCarrito($id) {
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }
    
        $prdcDAO = new ProductosDAO();
        $producto_carrito = $prdcDAO->getProductsPlusInfo($id);
    
        // Comprueba que el carrito no esta vacio
        if (!empty($producto_carrito)) {
            // Almacenamos el prodcuto que se encuentre el la primer posición del array de carrito
            $producto = $producto_carrito[0];
            // Inicamos una variable con valor buleano para comprobar si el bjeto existe en el carrito
            $productoExistente = false;
            // Recorre cada objeto que se encuentra en el carrito de la sesion
            foreach ($_SESSION['carrito'] as $objeto) {
                // Si este objeto que queremos añadir coincidiese con el id de otro dentro del carrito este no se añadiria porque ya existe dentro
                if ($objeto->id_producto == $producto->id_producto) {
                    $productoExistente = true;
                    break;
                }
            }
            
            // Si no existe el producto en el carrito se añade a este ultimo
            if (!$productoExistente) {
                $_SESSION['carrito'][] = $producto;
            }
        }
        
        // Cada vez que le demos al boton de añadir al carrito este nos redirigirá a la pagina principal
        header('Location: index.php');
        exit();
    }


    // Esta funcion se encarga de mostrar el carrito, y si hay o no productos dentro de este
    public function showCarrito() {
        // Inicia una varaible que es una array para los productos dentro del carrito
        $productosEnCarrito = [];
        // Si la sesion del carrito existe y no esta vacio, despues asigna a la nueva array los productos que se encuentren en la sesion de carrito
        if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
            $productosEnCarrito = $_SESSION['carrito'];
        }
        // Carga estos porductos en la vista del carrito y la muestra
        View::show('verCarrito.php', $productosEnCarrito);
    }
    

    // Esta funcion se encarga de mostrar la vista del administrador
    public function adminListarProductos() {
        // Verificar si el usuarios es administrador, si no le redirige al index
        if (!isset($_SESSION['usuario']) || $_SESSION['usuario']->perfil_usu != 0) {
            header('Location: index.php');
            exit();
        }
       
        // Si es administrador el usuario, muestra la vista con los productos que hay en la base de datos
        $prdDAO = new ProductosDAO();
        $array_productos = $prdDAO->getAllProducts();
        View::show('adminListaProductos.php', $array_productos);
    }
    

    // Funcion para añadir nuevos productos a la base de datos de la tienda si el usuario es administrador
    public function formNuevoProducto() {
        // Verificar si el usuarios es administrador, si no le redirige al index
        if (!isset($_SESSION['usuario']) || $_SESSION['usuario']->perfil_usu != 0) {
            header('Location: index.php');
            exit();
        }
        // Muestra la vista de el formulario
        View::show('FormularioProductos.php');
    }
    

    // Funcion para guardar nuevos porductos en la base de datos de la tienda si eres administrador
    public function guardarProducto() {
        // Verificar si el usuarios es administrador, si no le redirige al index
        if (!isset($_SESSION['usuario']) || $_SESSION['usuario']->perfil_usu != 0) {
            header('Location: index.php');
            exit();
        }
        
        // Asegura que el metodo de envio sea tipo POST, para que solo se envien los datos cuando se halla pulsado el boton de añadir producto
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recupera del formulario todos los datos que se han insertado en este y los almacena en variables
            $nombre = $_POST['nombre'];
            $categoria = $_POST['categoria'];
            $precio = $_POST['precio'];
            $descripcion = $_POST['descripcion'];
            $foto = $_POST['foto'];
            
            // Invoca la clase de ProductosDAO y le pasa las variables con los datos del formulario al metodo 'insertarproducto'
            // Este metodo hará luego una insercción en la base de datos guardando el producto en esta
            $prdDAO = new ProductosDAO();
            $resultado = $prdDAO->insertarProducto($nombre, $categoria, $precio, $descripcion, $foto);
            
            // Si la insercion se ha realizado de manera correcta, se procederá a escribir un mensaje de aprobación y si no uno de negación
            if ($resultado) {
                $_SESSION['mensaje'] = 'Producto añadido correctamente';
            } else {
                $_SESSION['mensaje'] = 'Error al añadir el producto';
            }
            
            // Una vez insertado el producto, nos redirigirá a el listado de productos en la pagina principal del administrador
            header('Location: index.php?controller=ProductosController&action=adminListarProductos');
            exit();
        }
    }
}
?>
