<?php

// Incluye los ficheros que necesita las funciones del controlador para su correcto funcionamiento
// Como lo son el usuariosDAO.php 
include_once('./Models/usuariosDAO.php');
include_once('./Views/View.php');

class UsuariosController {
    
    // Esta funcion se encarga de mostrar la vista del formulario de inicio de sesión
    public function IniciarSesion() {
        View::show('inicioSesion.php');
    }
    
    // Esta funcion se encarga de mostrar la vista del formulario de inicio de sesión
    public function ProcesarLogin() {
        // Asegura que el metodo de envio sea tipo POST, para que solo se envien los datos cuando se halla pulsado el boton de iniciar sesion
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recupera del formulario todos los datos que se han insertado en este y los almacena en variables
            $nombre = $_POST['usuario'];
            $password = $_POST['password'];
            
            // Invoca la clase de ProductosDAO y le pasa las variables con los datos del formulario al metodo 'verificarUsuario'
            // Este metodo hará luego una consulta para verificar la existencia del usuario en la base de datos
            $usuariosDAO = new UsuariosDAO();
            $usuario = $usuariosDAO->verificarUsuario($nombre, $password);
            
            if ($usuario) {
                // Guardamos los datos del usuario en la sesión
                $_SESSION['usuario'] = $usuario;
                
                // Redirigimos según el tipo de usuario según su perfil
                if ($usuario->perfil_usu == 0) {
                    // Usuario Administrador
                    header('Location: index.php?controller=ProductosController&action=adminListarProductos');
                } elseif ($usuario->perfil_usu == 1) {
                    // Usuario normal
                    header('Location: index.php');
                }
                exit();
            } else {
                // Si las credenciales son incorrectas
                $_SESSION['error_login'] = "Usuario o contraseña incorrectos";
                header('Location: index.php?controller=UsuariosController&action=IniciarSesion');
                exit();
            }
        }
    }
    
    // Esta funcion se encarga de cerrar la sesion en cuanto se pulse el boton
    public function CerrarSesion() {
        // Preservamos el carrito si existe
        $carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : [];
        
        // Destruimos la sesión
        session_unset();
        session_destroy();
        
        // Iniciamos una nueva sesión y restauramos el carrito
        session_start();
        $_SESSION['carrito'] = $carrito;
        
        header('Location: index.php');
        exit();
    }
    
    // Esta funcion se encarga de limpiar el carrito cuando se pulse el boton de finalizar compra
    public function FinalizarCompra() {
        // Verificamos si el usuario está logueado
        if (!isset($_SESSION['usuario'])) {
            // Guardamos la acción para redireccionar después del inicio de sesion
            $_SESSION['redirect_after_login'] = 'FinalizarCompra';
            header('Location: index.php?controller=UsuariosController&action=IniciarSesion');
            exit();
        }
        
        // Si el usuario está logueado, procesamos la compra
        
        // Limpiamos el carrito y lanzamos mensaje de existo de compra
        $_SESSION['carrito'] = [];
        $_SESSION['mensaje'] = 'Compra realizada con éxito';
        
        header('Location: index.php');
        exit();
    }
}
?>
