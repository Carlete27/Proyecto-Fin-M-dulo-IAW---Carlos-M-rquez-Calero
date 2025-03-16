<?php

// Incluye la conexión a la base de datos
include_once('./DB/database.php');

class UsuariosDAO {
    
    // Método para verificar si un usuario existe con el nombre y la contraseña proporcionados
    public function verificarUsuario($nombre, $password) {
        try {
            // Abrir una conexión a la base de datos
            $dbh = Database::open_connection();
            
            // Preparar la consulta SQL para buscar un usuario con el nombre y contraseña proporcionados
            $stmt = $dbh->prepare('SELECT * FROM usuarios_tienda WHERE nombre_usu = :usuario AND password_usu = :password');
            
            // Vincular los valores del nombre y la contraseña a la consulta
            $stmt->bindParam(':usuario', $nombre);
            $stmt->bindParam(':password', $password);
            
            // Establecer el modo de recuperación de resultados como objeto
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            
            // Ejecutar la consulta
            $stmt->execute();
            
            // Obtener el primer usuario que coincida con los datos
            $usuario = $stmt->fetch();
            
            // Si se encuentra un usuario, devolverlo; si no, devolver falso
            return $usuario ? $usuario : false;
        } catch (PDOException $e) {
            // Si hay un error, mostrar el mensaje de error y devolver falso
            echo $e->getMessage();
            return false;
        }
    }
    
    // Método para obtener un usuario por su ID
    public function getUsuarioPorId($id) {
        try {
            // Abrir una conexión a la base de datos
            $dbh = Database::open_connection();
            
            // Preparar la consulta SQL para obtener un usuario con el ID proporcionado
            $stmt = $dbh->prepare('SELECT * FROM usuarios_tienda WHERE id_usuario = :id');
            
            // Vincular el ID del usuario a la consulta
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            
            // Establecer el modo de recuperación de resultados como objeto
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            
            // Ejecutar la consulta
            $stmt->execute();
            
            // Devolver todos los resultados encontrados
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            // Si hay un error, mostrar el mensaje de error y devolver falso
            echo $e->getMessage();
            return false;
        }
    }
}
?>