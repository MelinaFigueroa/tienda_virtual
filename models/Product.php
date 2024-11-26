<?php
class Product
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Método para crear un producto
    public function create($nombre, $precio, $descripcion, $imagen)
    {
        $query = "INSERT INTO productos (nombre, precio, descripcion, imagen) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([$nombre, $precio, $descripcion, $imagen]);
    }

    // Método para obtener un producto por ID
    public function getById($id)
    {
        $query = "SELECT * FROM productos WHERE id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para actualizar un producto
    public function update($id, $nombre, $precio, $descripcion, $imagen = null)
    {
        $query = "UPDATE productos SET nombre = ?, precio = ?, descripcion = ?, imagen = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([$nombre, $precio, $descripcion, $imagen, $id]);
    }

    // Método para eliminar un producto
    public function delete($id)
    {
        $query = "DELETE FROM productos WHERE id = ?";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([$id]);
    }

    // Método para obtener todos los productos
    public function getAll()
    {
        $query = "SELECT * FROM productos";
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
