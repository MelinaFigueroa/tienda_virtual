<?php

class Database {
    private $host = "127.0.0.1";      // Cambia esto por la IP de tu servidor MySQL si es necesario
    private $db_name = "tienda_online"; // Nombre de la base de datos
    private $username = "root";        // Nombre de usuario de MySQL
    private $password = "";            // Contraseña de MySQL
    private $conn;

    // Obtener la conexión a la base de datos
    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("SET NAMES 'utf8'"); // Opcional para manejo de caracteres especiales
        } catch (PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
