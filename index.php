<?php

include_once ("Controllers/ProductosController.php");
include_once ("Controllers/UsuariosController.php");



if (isset($_REQUEST['action']) && isset($_REQUEST['controller']) ){
    $act=$_REQUEST['action'];
    $cont=$_REQUEST['controller'];

    $controller=new $cont();
    // Si la acción es getProductsInfo y se pasa un idproducto
    if ($cont == "ProductosController" && $act == "getProductsInfo" && isset($_REQUEST['idproducto'])) {
        $id = $_REQUEST['idproducto']; // Capturar el ID del producto
        $controller->getProductsInfo($id); // Pasarlo correctamente al controlador
        // Si la acción es addProtuctsToCarrito y se pasa un idproducto
    } elseif ($cont == "ProductosController" && $act == "addProtuctsToCarrito" && isset($_REQUEST['idproducto'])) {
        $id = $_REQUEST['idproducto']; // Capturar el ID del producto
        $controller->addProtuctsToCarrito($id);  // Pasarlo correctamente al controlador
       // Si la acción es getProductsInfo y se pasa un idproducto
    }  elseif ($cont == "ProductosController" && $act == "eliminarProducto" && isset($_REQUEST['idproducto'])) {
        $id = $_REQUEST['idproducto']; // Capturar el ID del producto
        $controller->eliminarProducto($id);  // Pasarlo correctamente al controlador
    }else {
        $controller->$act();
    }
} else{
        $controller = New ProductosController;
        $controller->getProducts();
    }

?>