<?php 

class Database {

    // Método estático para abrir una conexión a la base de datos
    public static function open_connection() {
        try {
            // Configuración de la base de datos
            $host = 'mariadb';          // Nombre del servidor (en este caso, un contenedor de MariaDB)
            $dbname = 'database';       // Nombre de la base de datos
            $user = 'admin';            // Usuario de la base de datos
            $pass = 'changepassword';   // Contraseña del usuario

            // Construcción del DSN (Data Source Name) para la conexión con PDO
            $dsn = "mysql:host=$host;dbname=$dbname";

            // Creación de la conexión a la base de datos con PDO
            $dbh = new PDO($dsn, $user, $pass);

            // Configuración del juego de caracteres a UTF-8 para soportar caracteres especiales
            $dbh->exec("SET NAMES 'utf8mb4'");
            $dbh->exec("SET CHARACTER SET utf8mb4");

            // Devuelve la conexión establecida
            return $dbh;

        } catch (PDOException $e) {
            // Si ocurre un error, se muestra el mensaje de la excepción
            echo $e->getMessage();
        }
    }
}
?>
