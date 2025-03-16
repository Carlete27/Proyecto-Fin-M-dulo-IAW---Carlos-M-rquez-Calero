# Proyecto-Fin-Módulo-IAW---Carlos-Márquez-Calero

# Introducción

Este proyecto es una tienda en línea desarrollada con PHP y MySQL, utilizando contenedores Docker para facilitar su despliegue. Su objetivo es ofrecer una plataforma básica donde los usuarios puedan navegar por productos, ver detalles, registrarse e iniciar sesión, añadir productos al carrito y realizar compras.

## Objetivos de la Práctica

El desarrollo de esta tienda tiene los siguientes objetivos:

- Listar productos disponibles.
- Mostrar la descripción detallada de un producto.
- Implementar un sistema de inicio de sesión para administradores y usuarios.
- Permitir que el administrador dé de alta nuevos productos en la tienda.
- Implementar un carrito de compras donde los usuarios puedan añadir productos y visualizarlos.

## Desarrollo del Proyecto

El proyecto está estructurado en el Modelo Vista Controlador (MVC):

### Estructura de Archivos

- `Controllers/`: Contiene los controladores encargados de manejar la lógica de negocio, como `ProductosController.php` y `UsuariosController.php`.
- `DB/`: Contiene `database.php`, responsable de la conexión con la base de datos MySQL.
- `Models/`: Contiene los archivos `productosDAO.php` y `usuariosDAO.php`, que gestionan las operaciones en la base de datos.
- `Views/`: Contiene las vistas de la tienda, como `index.php`, `ListaProductos.php` y `verCarrito.php`.

## Tecnologías Utilizadas

- **PHP**: Lenguaje de programación backend principal.
- **MySQL**: Base de datos para almacenar productos y usuarios.
- **Docker**: Contenedores para levantar la aplicación.
- **Redis**: Caché para mejorar el rendimiento.
- **HTML/CSS/JS**: Para la interfaz de usuario.
- **Instancia AWS**: Para la interfaz de usuario.

## Levantamiento del Contenedor

El proyecto se ejecuta mediante Docker dentro de una instancia de AWS que servirá para desplegar nuestro proyecto de tienda en la web, al que se accede mediante esta dirección de red: `http://100.24.190.60`. Incluye servicios como MySQL y Redis. Para iniciar el entorno, se ejecuta:

```sh
docker-compose up -d
```

Esto inicia la base de datos, el servidor web y otros servicios necesarios.

## Conclusión

Este proyecto proporciona una base funcional para una tienda en línea, permitiendo a los usuarios navegar por productos y realizar compras. La utilización de contenedores Docker facilita su despliegue y mantenimiento. Se han implementado las funcionalidades más básicas, pero el sistema es escalable y se puede mejorar en futuras versiones.

