<?php

// Incluye la conexión a la base de datos
include_once('./DB/database.php');

class ProductosDAO {

    // Obtiene todos los productos de la base de datos
    public function getAllProducts() {
        try {
            $dbh = Database::open_connection(); // Abre la conexión con la base de datos
            $stmt = $dbh->prepare('SELECT * FROM productos'); // Prepara la consulta
            $stmt->setFetchMode(PDO::FETCH_OBJ); // Formato de los resultados como objetos
            $stmt->execute(); // Ejecuta la consulta
            return $stmt->fetchAll(); // Devuelve la lista de productos
        } catch (PDOException $e) {
            echo $e->getMessage(); // Muestra el error si ocurre
            return []; // Devuelve un array vacío si hay error
        }
    }

    // Obtiene la información de un producto específico por su ID
    public function getProductsPlusInfo($id) {
        try {
            $dbh = Database::open_connection();
            $stmt = $dbh->prepare('SELECT * FROM productos WHERE id_producto = :id'); // Consulta con filtro por ID
            $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Asigna el ID al parámetro de la consulta
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute();
            return $stmt->fetchAll(); // Devuelve la información del producto
        } catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }

    // Inserta un nuevo producto en la base de datos
    public function insertarProducto($nombre, $categoria, $precio, $descripcion, $foto) {
        try {
            $dbh = Database::open_connection();
            $stmt = $dbh->prepare('INSERT INTO productos (nombre, categoria, precio, descripcion, foto) VALUES (:nombre, :categoria, :precio, :descripcion, :foto)');
            $stmt->bindParam(':nombre', $nombre); // Asigna los valores a los parámetros de la consulta
            $stmt->bindParam(':categoria', $categoria);
            $stmt->bindParam(':precio', $precio);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':foto', $foto);
            return $stmt->execute(); // Ejecuta la consulta y devuelve si fue exitosa
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Elimina un producto de la base de datos por su ID
    public function eliminarProducto($id) {
        try {
            $dbh = Database::open_connection();
            $stmt = $dbh->prepare('DELETE FROM productos WHERE id_producto = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute(); // Devuelve si la eliminación fue exitosa
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}

?>
